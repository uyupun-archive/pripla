<template>
  <div>
    <div class="select-area">
      <select
        class="select-box"
        :name="name"
        @change="detectChangedValue($event)"
      >
        <option
          v-for="(option, index) in options"
          :key="index"
          :value="option.value"
          :selected="option.selected"
        >
          {{ option.text }}
        </option>
      </select>
      <Fa icon="chevron-down" class="icon" area-hidden="true" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      required: true,
    },
    options: {
      type: Array,
      required: true,
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
.select {
  &-area {
    position: relative;
  }

  &-box {
    box-sizing: border-box;
    width: 100%;
    height: 40px;
    padding: 10px 15px;
    background: $white;
    border: 1px solid $pink;
    border-radius: 10px;
    outline: none;
    appearance: none;
  }
}

.icon {
  position: absolute;
  top: 50%;
  right: 15px;
  height: 24px;
  color: $darkGray;
  pointer-events: none;
  transform: translateY(-50%);
}
</style>
