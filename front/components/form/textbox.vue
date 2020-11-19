<template>
  <div>
    <input
      type="text"
      class="textbox"
      :name="name"
      :value="value"
      :placeholder="placeholder"
      @input="detectChangedValue($event)"
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
    validator: {
      type: Function,
      default: () => {},
    },
  },
  methods: {
    detectChangedValue(event) {
      this.validator(event.target.value)
    },
  },
}
</script>

<style lang="scss" scoped>
.textbox {
  box-sizing: border-box;
  width: 100%;
  height: 40px;
  padding: 10px 15px;
  background: $white;
  border: 1px solid $pink;
  border-radius: 10px;
  outline: none;

  &::placeholder {
    color: $darkGray;
  }
}
</style>
