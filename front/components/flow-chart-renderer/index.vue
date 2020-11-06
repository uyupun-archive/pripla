<template>
  <div>
    <div v-if="jsonTree.length > 0">
      <!-- <div>{{ jsonTree }}</div> -->
      <div v-for="node in jsonTree" :key="node.id">
        <div>{{ node.printName }}</div>
        <button type="button">+</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    jsonTree: {
      type: Array,
      required: true,
    },
  },
}
</script>
