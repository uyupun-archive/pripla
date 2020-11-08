<template>
  <div>
    <Tester
      :tree="tree"
      @setValue="setValue"
      @addProcessNode="addProcessNode"
      @addChildProcessNode="addChildProcessNode"
      @addIfNode="addIfNode"
      @addChildIfNode="addChildIfNode"
      @removeNode="removeNode"
    />
    <!-- <Renderer
      :tree="shapedTree"
      @addProcessNode="addProcessNode"
      @addChildProcessNode="addChildProcessNode"
      @addIfNode="addIfNode"
      @addChildIfNode="addChildIfNode"
      @removeNode="removeNode"
      @setValue="setValue"
    /> -->
  </div>
</template>

<script>
import TreeModel from 'tree-model'
import { TreeTypes } from '~/components/flow-chart/tree-types.js'
// import Renderer from '~/components/flow-chart/renderer.vue'
import Tester from '~/components/flow-chart/tester.vue'

export default {
  components: {
    // Renderer,
    Tester,
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
      const nodes = {
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
      }
      this.tree = this.treeModel.parse(nodes)
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
      selectedNode.drop()
    },
    makeShapedTree(nodes) {
      const shapedTree = []
      for (const node of nodes) {
        const obj = {
          id: node.id,
          name: node.name,
          value: node.value,
          type: node.type,
          children: [],
        }
        if (
          Object.prototype.hasOwnProperty.call(node, 'children') &&
          node.children.length > 0
        )
          obj.children = this.makeShapedTree(node.children)
        shapedTree.push(obj)
      }
      return shapedTree
    },
    getShapedTree() {
      const shapedTree = this.makeShapedTree(this.tree.model.children)
      return shapedTree
    },
  },
}
</script>
