<template>
  <div>
    <button
      type="button"
      @click="
        addProcessNode()
        convertTreeModelToJson()
      "
    >
      追加
    </button>
    <FlowChartRenderer :tree="jsonTree" />
  </div>
</template>

<script>
import TreeModel from 'tree-model'
import FlowChartRenderer from '~/components/flow-chart-renderer/index.vue'

export default {
  components: {
    FlowChartRenderer,
  },
  data() {
    return {
      treeModel: new TreeModel(),
      tree: null,
      treeTypes: {
        root: 1,
        begin: 2,
        end: 3,
        process: 4,
        if: 5,
      },
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
    addProcessNode() {
      const rootNode = this.tree.first((node) => node.model.id === 1)
      const childNode = this.treeModel.parse({
        id: ++this.latestId,
        name: 'process',
        printName: '行動を入力',
        type: this.treeTypes.process,
      })
      const idx = this.tree.all().length - 2
      rootNode.addChildAtIndex(childNode, idx)
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
        jsonTree.splice(ptr++, 0, node.model)
      }
      return jsonTree
    },
  },
}
</script>

<style lang="scss" scoped></style>
