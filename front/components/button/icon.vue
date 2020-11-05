<template>
  <span>
    <button :type="type" class="btn">
      <Fa :icon="icon" class="icon" aria-hidden="true" />
    </button>
  </span>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: 'button',
    },
    icon: {
      type: String,
      required: true,
    },
  },
}
</script>

<style lang="scss" scoped>
.btn {
  width: 75px;
  height: 75px;
  display: inline-block;
  cursor: pointer;
  background: $pink;
  outline: none;
  box-sizing: border-box;
  padding: 17.5px;
  border: none;
  border-radius: 50%;

  &:hover {
    opacity: 0.75;
  }
}

.icon {
  width: 40px;
  height: 40px;
  color: $white;
}
</style>
