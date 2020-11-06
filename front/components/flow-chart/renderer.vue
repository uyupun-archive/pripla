<template>
  <div>
    <div
      v-for="node in tree"
      :key="node.id"
      :class="[node.type === treeTypes.process ? 'process' : 'edge']"
    >
      <div>{{ node.name }}</div>
      <button type="button" @click="addProcessNode(node.raw)">+</button>
      <div v-if="node.children.length > 0">
        <Renderer :tree="node.children" />
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
</style>
