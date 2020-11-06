<template>
  <div>
    <div v-for="node in tree" :key="node.id">
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
}
</script>
