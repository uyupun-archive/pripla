<template>
  <div>
    <button
      type="button"
      @click="
        addProcessNode()
        makePivotRepresentation()
        makeRawHtml()
      "
    >
      追加
    </button>
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
      treeTypes: {
        root: 1,
        edge: 2,
        process: 3,
        if: 4,
      },
      latestId: 0,
      pivotRepresentation: null,
      pivotRepresentationTypes: {
        startTag: 1,
        endTag: 2,
        content: 3,
      },
      rawHtml: '',
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
      const pivotRepresentation = [
        { value: 'ul', type: this.pivotRepresentationTypes.startTag },
        { value: 'ul', type: this.pivotRepresentationTypes.endTag },
      ]
      let ptr = 1
      for (const node of nodes) {
        if (node.children.length > 0) {
          this.recursiveMakePivotRepresentation(node.children)
        }
        pivotRepresentation.splice(ptr++, 0, [
          { value: 'li', type: this.pivotRepresentationTypes.startTag },
          {
            value: node.model.printName,
            type: this.pivotRepresentationTypes.content,
          },
          { value: 'li', type: this.pivotRepresentationTypes.endTag },
        ])
      }
      return pivotRepresentation
    },
    makeRawHtml() {
      this.rawHtml = this.recursiveMakeRawHtml(this.pivotRepresentation)
    },
    recursiveMakeRawHtml(pivotRepresentation) {
      let rawHtml = ''
      for (const obj of pivotRepresentation) {
        if (Array.isArray(obj)) {
          rawHtml += this.recursiveMakeRawHtml(obj)
        } else if (obj.type === this.pivotRepresentationTypes.startTag) {
          rawHtml += '<' + obj.value + '>'
        } else if (obj.type === this.pivotRepresentationTypes.endTag) {
          rawHtml += '</' + obj.value + '>'
        } else {
          rawHtml += obj.value
        }
      }
      return rawHtml
    },
  },
}
</script>

<style lang="scss" scoped></style>
