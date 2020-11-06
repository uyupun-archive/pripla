<template>
  <div>
    <button
      type="button"
      @click="
        addProcessNode()
        makePivotRepresentation()
      "
    >
      追加
    </button>
    <FlowChartRenderer :pivot-representation="pivotRepresentation" />
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
        edge: 2,
        process: 3,
        if: 4,
      },
      latestId: 0,
      pivotRepresentation: [],
      rawHtml: '',
    }
  },
  mounted() {
    this.initTree()
    this.makePivotRepresentation()
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
            name: 'begin',
            printName: '集合',
            type: this.treeTypes.edge,
          },
          { id: 3, name: 'end', printName: '解散', type: this.treeTypes.edge },
        ],
      }
      this.tree = this.treeModel.parse(nodes)
      this.latestId = 3
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
    makePivotRepresentation() {
      const rootNode = this.tree.first((node) => node.model.id === 1)
      this.pivotRepresentation = this.recursiveMakePivotRepresentation(
        rootNode.children
      )
    },
    recursiveMakePivotRepresentation(nodes) {
      const pivotRepresentation = []
      let ptr = 1
      for (const node of nodes) {
        if (node.children.length > 0) {
          this.recursiveMakePivotRepresentation(node.children)
        }
        pivotRepresentation.splice(ptr++, 0, node.model.printName)
      }
      return pivotRepresentation
    },
  },
}
</script>

<style lang="scss" scoped></style>
