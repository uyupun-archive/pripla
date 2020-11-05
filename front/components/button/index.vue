<template>
  <span>
    <button
      :type="type"
      class="btn"
      :class="{
        small: size === 'small',
        middle: size === 'middle',
      }"
      :disabled="disabled"
    >
      <slot />
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
    size: {
      validator: (size) => {
        return ['small', 'middle'].includes(size)
      },
      default: 'middle',
    },
    disabled: {
      type: Boolean,
      default: false,
    },
  },
}
</script>

<style lang="scss" scoped>
.btn {
  width: 100%;
  display: inline-block;
  color: $white;
  cursor: pointer;
  font-size: 14px;
  line-height: 1;
  background: $pink;
  outline: none;
  box-sizing: border-box;
  border: none;

  &:hover {
    opacity: 0.75;
  }

  &:disabled {
    background: $gray;
    cursor: auto;

    &:hover {
      opacity: 1;
    }
  }
}

.small {
  max-width: 80px;
  padding: 8px 20px;
  border-radius: 20px;
}

.middle {
  max-width: 200px;
  padding: 13px 20px;
  border-radius: 50px;
}
</style>
