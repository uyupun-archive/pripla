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
      content: '';
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      width: 24px;
      height: 24px;
      box-sizing: border-box;
      border: 1px solid $pink;
      border-radius: 50%;
    }
  }

  &-button {
    display: none;

    &:checked + .radio-label::after {
      content: '';
      display: block;
      position: absolute;
      top: 50%;
      left: 3px;
      transform: translateY(-50%);
      width: 18px;
      height: 18px;
      background: $pink;
      box-sizing: border-box;
      border-radius: 50%;
    }
  }
}
</style>
