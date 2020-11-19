<template>
  <div>
    <input
      :id="id"
      type="radio"
      class="radio-button"
      :name="name"
      :value="value"
      :checked="checked"
    />
    <label :for="id" class="radio-label">{{ text }}</label>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
    value: {
      type: String,
      required: true,
    },
    text: {
      type: String,
      required: true,
    },
    checked: {
      type: Boolean,
      default: false,
    },
  },
}
</script>

<style lang="scss" scoped>
.radio {
  &-label {
    position: relative;
    display: inline-flex;
    align-items: center;
    height: 24px;
    padding-left: 29px;
    cursor: pointer;

    &::before {
      position: absolute;
      top: 0;
      left: 0;
      box-sizing: border-box;
      display: block;
      width: 24px;
      height: 24px;
      content: '';
      border: 1px solid $pink;
      border-radius: 50%;
    }
  }

  &-button {
    display: none;

    &:checked + .radio-label::after {
      position: absolute;
      top: 50%;
      left: 3px;
      box-sizing: border-box;
      display: block;
      width: 18px;
      height: 18px;
      content: '';
      background: $pink;
      border-radius: 50%;
      transform: translateY(-50%);
    }
  }
}
</style>
