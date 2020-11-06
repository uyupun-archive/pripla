<template>
  <div>
    <Renderer
      :tree="jsonTree"
      @addProcessNode="addProcessNode"
      @addIfNode="addIfNode"
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
      jsonTree: [],
      rawHtml: '',
    }
  },
  mounted() {
    this.initTree()
    this.convertTreeModelToJson()
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
          {
            id: 4,
            name: 'ほげ',
            type: this.treeTypes.process,
            children: [
              {
                id: 5,
                name: 'ぴよ',
                type: this.treeTypes.process,
              },
            ],
          },
          { id: 3, name: '解散', type: this.treeTypes.end },
        ],
      }
      this.tree = this.treeModel.parse(nodes)
      this.latestId = 5
    },
    addProcessNode(baseNode) {
      const rootNode = this.tree.first((node) => node.model.id === 1)
      const childNode = this.treeModel.parse({
        id: ++this.latestId,
        name: '行動を入力',
        type: this.treeTypes.process,
      })
      const idx = baseNode.getIndex() + 1
      rootNode.addChildAtIndex(childNode, idx)
      this.convertTreeModelToJson()
    },
    addIfNode(baseNode) {
      const rootNode = this.tree.first((node) => node.model.id === 1)
      const childNode = this.treeModel.parse({
        id: ++this.latestId,
        name: '条件を入力',
        type: this.treeTypes.if,
      })
      const idx = baseNode.getIndex() + 1
      rootNode.addChildAtIndex(childNode, idx)
      this.convertTreeModelToJson()
    },
    convertTreeModelToJson() {
      const rootNode = this.tree.first((node) => node.model.id === 1)
      this.jsonTree = this.recursiveConvertTreeModelToJson(rootNode.children)
    },
    recursiveConvertTreeModelToJson(nodes) {
      const jsonTree = []
      let ptr = 1
      for (const node of nodes) {
        if (node.children.length > 0) {
          this.recursiveConvertTreeModelToJson(node.children)
        }
        jsonTree.splice(ptr++, 0, this.shapeJson(node))
      }
      return jsonTree
    },
    shapeJson(node) {
      node.model.children = Object.prototype.hasOwnProperty.call(
        node.model,
        'children'
      )
        ? node.model.children
        : []
      return {
        ...node.model,
        raw: node,
      }
    },
  },
}
</script>

<style lang="scss" scoped></style>
