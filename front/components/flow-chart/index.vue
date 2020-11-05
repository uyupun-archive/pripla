<template>
  <div>
    <button type="button" @click="addProcessNode">追加</button>
    <div v-html="rawHtml" />
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
      pivotRepresentation: null,
      rawHtml: '<div>hoge</div>',
    }
  },
  mounted() {
    this.initTree()
    this.makePivotRepresentation()
    this.makeRawHtml()
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
    makePivotRepresentation() {
      this.pivotRepresentation = ['ul', '/ul']
      let ptr = 1
      const rootNode = this.tree.first((node) => node.model.id === 1)
      for (const node of rootNode.children) {
        this.pivotRepresentation.splice(ptr++, 0, [
          'li',
          node.model.printName,
          '/li',
        ])
      }
    },
    makeRawHtml() {
      let rawHtml = ''
      for (const item of this.pivotRepresentation) {
        if (Array.isArray(item)) {
          let tmp = ''
          for (const foo of item) {
            tmp += '<' + foo + '>'
          }
          rawHtml += tmp
        } else {
          rawHtml += '<' + item + '>'
        }
      }
      this.rawHtml = rawHtml
    },
  },
}
</script>

<style lang="scss" scoped></style>
