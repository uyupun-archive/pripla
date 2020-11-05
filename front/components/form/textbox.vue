<template>
  <div>
    <input
      type="text"
      class="textbox"
      :name="name"
      :value="value"
      :placeholder="placeholder"
    />
  </div>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      required: true,
    },
    value: {
      type: String,
      default: '',
    },
    placeholder: {
      type: String,
      default: '',
    },
  },
}
</script>

<style lang="scss" scoped>
.textbox {
  width: 100%;
  height: 40px;
  outline: none;
  box-sizing: border-box;
  background: $white;
  border: 1px solid $pink;
  border-radius: 10px;
  padding: 10px 15px;

  &::placeholder {
    color: $darkGray;
  }
}
</style>
