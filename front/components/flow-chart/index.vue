<template>
  <div>
    <button type="button" @click="addProcessNode">追加</button>
  </div>
</template>

<script>
import TreeModel from 'tree-model'

export default {
  data() {
    return {
      treeModel: new TreeModel(),
      tree: null,
      types: {
        root: 1,
        edge: 2,
        process: 3,
        if: 4,
      },
      latestId: 0,
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
        type: this.types.root,
        children: [
          { id: 2, name: 'begin', printName: '集合', type: this.types.edge },
          { id: 3, name: 'end', printName: '解散', type: this.types.edge },
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
        type: this.types.process,
      })
      const idx = this.tree.all().length - 2
      rootNode.addChildAtIndex(childNode, idx)
    },
  },
}
</script>

<style lang="scss" scoped></style>
