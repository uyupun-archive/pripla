<template>
  <div>
    <div
      v-for="node in tree"
      :key="node.id"
      :class="[node.type === treeTypes.process ? 'process' : 'edge']"
    >
      <div>{{ node.name }}</div>
      <button type="button">+</button>
      <div v-if="node.hasOwnProperty('children') && node.children.length > 0">
        <FlowChartRenderer :tree="node.children" />
      </div>
    </div>
  </div>
</template>

<script>
import FlowChartRenderer from '~/components/flow-chart-renderer/index.vue'

export default {
  name: 'FlowChartRenderer',
  components: {
    FlowChartRenderer,
  },
  props: {
    tree: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      treeTypes: {
        root: 1,
        begin: 2,
        end: 3,
        process: 4,
        if: 5,
      },
    }
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
>
