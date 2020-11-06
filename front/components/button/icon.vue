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
  width: 50px;
  height: 50px;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  background: $pink;
  outline: none;
  box-sizing: border-box;
  padding: 0;
  border: none;
  border-radius: 50%;

  @include desktop() {
    width: 80px;
    height: 80px;
  }

  &:hover {
    opacity: 0.75;
  }
}

.icon {
  width: 25px;
  height: 25px;
  color: $white;

  @include desktop() {
    width: 50px;
    height: 50px;
  }
}
</style>
