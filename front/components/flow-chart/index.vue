<template>
  <div>
    <Renderer
      :tree="shapedTree"
      @addProcessNode="addProcessNode"
      @addChildProcessNode="addChildProcessNode"
      @addIfNode="addIfNode"
      @addChildIfNode="addChildIfNode"
      @removeNode="removeNode"
      @setValue="setValue"
    />
  </div>
</template>

<script>
import TreeModel from 'tree-model'
import { TreeTypes } from '~/components/flow-chart/tree-types.js'
import Renderer from '~/components/flow-chart/renderer.vue'

export default {
  components: {
    Renderer,
  },
  data() {
    return {
      treeModel: new TreeModel(),
      tree: null,
      treeTypes: TreeTypes,
      latestId: 0,
      shapedTree: [],
    }
  },
  mounted() {
    this.initTree()
    this.makeShapedTree()
  },
  methods: {
    initTree() {
      const nodes = {
        id: 1,
        name: 'root',
        type: this.treeTypes.root,
        children: [
          {
            id: 2,
            name: '集合',
            type: this.treeTypes.begin,
          },
          { id: 3, name: '解散', type: this.treeTypes.end },
        ],
      }
      this.tree = this.treeModel.parse(nodes)
      this.latestId = 3
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
      const childNode = this.treeModel.parse({
        id: ++this.latestId,
        name,
        value: '',
        type,
      })
      const idx = selectedNode.getIndex() + 1
      baseNode.addChildAtIndex(childNode, idx)
      this.makeShapedTree()
    },
    addChildNode(selectedNode, type, name) {
      const baseNode = this.tree.first(
        (node) => node.model.id === selectedNode.model.id
      )
      const childNode = this.treeModel.parse({
        id: ++this.latestId,
        name,
        value: '',
        type,
      })
      baseNode.addChild(childNode)
      this.makeShapedTree()
    },
    removeNode(selectedNode) {
      selectedNode.drop()
      this.makeShapedTree()
    },
    setValue(node, value) {
      node.value = value
    },
    makeShapedTree() {
      const rootNode = this.tree.first((node) => node.model.id === 1)
      this.shapedTree = this.recursiveMakeShapedTree(rootNode.children)
    },
    recursiveMakeShapedTree(nodes) {
      const shapedTree = []
      for (const node of nodes) {
        shapedTree.push({
          ...node.model,
          value: '',
          raw: node,
        })
        const idx = shapedTree.length - 1
        if (node.children.length > 0)
          shapedTree[idx].children = this.recursiveMakeShapedTree(node.children)
        else shapedTree[idx].children = []
      }
      return shapedTree
    },
    recursiveMakeJsonTree(tree) {
      const jsonTree = []
      for (const node of tree) {
        delete node.raw
        jsonTree.push(node)
        const idx = jsonTree.length - 1
        if (node.children.length > 0)
          jsonTree[idx].children = this.recursiveMakeJsonTree(node.children)
        else jsonTree[idx].children = []
      }
      return jsonTree
    },
    getJsonTree() {
      const jsonTree = this.recursiveMakeJsonTree(this.shapedTree)
      return jsonTree
    },
  },
}
</script>
