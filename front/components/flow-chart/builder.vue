<template>
  <div>
    <!-- <Tester
      :tree="tree"
      @setValue="setValue"
      @addProcessNode="addProcessNode"
      @addChildProcessNode="addChildProcessNode"
      @addIfNode="addIfNode"
      @addChildIfNode="addChildIfNode"
      @removeNode="removeNode"
    /> -->
    <Renderer
      :tree="tree"
      @setValue="setValue"
      @addProcessNode="addProcessNode"
      @addChildProcessNode="addChildProcessNode"
      @addIfNode="addIfNode"
      @addChildIfNode="addChildIfNode"
      @removeNode="removeNode"
    />
  </div>
</template>

<script>
import TreeModel from 'tree-model'
import { TreeTypes } from '~/components/flow-chart/tree-types.js'
import Renderer from '~/components/flow-chart/renderer.vue'
// import Tester from '~/components/flow-chart/tester.vue'

export default {
  components: {
    Renderer,
    // Tester,
  },
  data() {
    return {
      treeModel: new TreeModel(),
      tree: {},
      treeTypes: TreeTypes,
      latestId: 0,
      shapedTree: [],
    }
  },
  mounted() {
    this.initTree()
  },
  methods: {
    initTree() {
      this.tree = this.treeModel.parse({
        id: 1,
        name: 'root',
        value: '',
        type: this.treeTypes.root,
        children: [
          {
            id: 2,
            name: '集合',
            value: '',
            type: this.treeTypes.begin,
          },
          { id: 3, name: '解散', value: '', type: this.treeTypes.end },
        ],
      })
      this.latestId = 3
    },
    setValue(args) {
      const { node, event } = args
      node.model.value = event.target.value
    },
    addProcessNode(selectedNode) {
      this.addNode(selectedNode, this.treeTypes.process, '行動を入力')
    },
    addChildProcessNode(selectedNode) {
      this.addChildNode(selectedNode, this.treeTypes.process, '行動を入力')
    },
    addIfNode(selectedNode) {
      this.addNode(selectedNode, this.treeTypes.if, '条件を入力')
    },
    addChildIfNode(selectedNode) {
      this.addChildNode(selectedNode, this.treeTypes.if, '条件を入力')
    },
    addNode(selectedNode, type, name) {
      const baseNode = this.tree.first(
        (node) => node.model.id === selectedNode.parent.model.id
      )
      const childNode = this.makeParsedNode(type, name)
      const idx = selectedNode.getIndex() + 1
      baseNode.addChildAtIndex(childNode, idx)
    },
    addChildNode(selectedNode, type, name) {
      const baseNode = this.tree.first(
        (node) => node.model.id === selectedNode.model.id
      )
      const childNode = this.makeParsedNode(type, name)
      baseNode.addChild(childNode)
      const endNode = this.makeParsedNode(this.treeTypes.end, '解散')
      baseNode.addChild(endNode)
    },
    makeParsedNode(type, name) {
      return this.treeModel.parse({
        id: ++this.latestId,
        name,
        value: '',
        type,
      })
    },
    removeNode(selectedNode) {
      if (
        selectedNode.parent.getIndex() === 2 &&
        selectedNode.parent.children[1].model.type === this.treeTypes.end
      )
        selectedNode.parent.children[1].drop()
      selectedNode.drop(selectedNode.parent.children[1])
    },
    makeShapedTree(node) {
      const shapedTree = {
        id: node.model.id,
        name: node.model.name,
        value: node.model.value,
        type: node.model.type,
        children: [],
      }
      for (const child of node.children) {
        const tmp = this.makeShapedTree(child)
        shapedTree.children.push(tmp)
      }
      return shapedTree
    },
    getShapedTree() {
      const shapedTree = this.makeShapedTree(this.tree)
      return shapedTree
    },
  },
}
</script>
