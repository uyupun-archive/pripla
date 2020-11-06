<template>
  <div>
    <div v-if="pivotRepresentation.length > 0">
      <div v-for="value in pivotRepresentation" :key="value">
        <div>{{ value }}</div>
        <button type="button">+</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    pivotRepresentation: {
      type: Array,
      required: true,
    },
  },
}
</script>
