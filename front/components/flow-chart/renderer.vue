<template>
  <div>
    <div
      v-for="node in tree"
      :key="node.id"
      :class="{
        edge: [treeTypes.begin, treeTypes.end].includes(node.type),
        process: node.type === treeTypes.process,
        if: node.type === treeTypes.if,
      }"
      :style="{ 'margin-left': (depth - 1) * 20 + 'px' }"
    >
      <div>{{ node.name }}</div>
      <button
        v-if="[treeTypes.process, treeTypes.if].includes(node.type)"
        type="button"
        @click="removeNode(node.raw)"
      >
        -
      </button>
      <button
        v-if="![treeTypes.end].includes(node.type)"
        type="button"
        @click="addProcessNode(node.raw)"
      >
        +
      </button>
      <button
        v-if="![treeTypes.end].includes(node.type)"
        type="button"
        @click="addIfNode(node.raw)"
      >
        if
      </button>
      <div v-if="node.children.length > 0">
        <Renderer
          :tree="node.children"
          :depth="depth + 1"
          @addProcessNode="addProcessNode"
          @addIfNode="addIfNode"
          @removeNode="removeNode"
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
    depth: {
      type: Number,
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
    removeNode(raw) {
      this.$emit('removeNode', raw)
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
