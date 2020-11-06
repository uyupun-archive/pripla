<template>
  <div>
    <div
      v-for="node in tree"
      :key="node.id"
      :class="{
        edge: node.type === treeTypes.begin || node.type === treeTypes.end,
        process: node.type === treeTypes.process,
        if: node.type === treeTypes.if,
      }"
    >
      <div>{{ node.name }}</div>
      <!-- <div>{{ node }}</div> -->
      <button type="button" @click="addProcessNode(node.raw)">+</button>
      <button type="button" @click="addIfNode(node.raw)">if</button>
      <div v-if="node.children.length > 0">
        <Renderer
          :tree="node.children"
          @addProcessNode="addProcessNode"
          @addIfNode="addIfNode"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Renderer from '~/components/flow-chart/renderer.vue'
import { TreeTypes } from '~/components/flow-chart/tree-types.js'

export default {
  name: 'Renderer',
  components: {
    Renderer,
  },
  props: {
    tree: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      treeTypes: TreeTypes,
    }
  },
  methods: {
    addProcessNode(raw) {
      this.$emit('addProcessNode', raw)
    },
    addIfNode(raw) {
      this.$emit('addIfNode', raw)
    },
  },
}
</script>

<style lang="scss" scoped>
.edge {
  border: 2px solid #000;
  background-color: red;
}

.process {
  border: 2px solid #000;
  background-color: blue;
}

.if {
  border: 2px solid #000;
  background-color: green;
}
</style>
