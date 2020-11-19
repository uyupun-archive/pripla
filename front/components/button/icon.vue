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
  box-sizing: border-box;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  padding: 0;
  cursor: pointer;
  background: $pink;
  border: none;
  border-radius: 50%;
  outline: none;

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
