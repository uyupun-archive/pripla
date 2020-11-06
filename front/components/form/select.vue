<template>
  <div>
    <div class="select-area">
      <select class="select-box" :name="name">
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
  },
}
</script>

<style lang="scss" scoped>
.select {
  &-area {
    position: relative;
  }

  &-box {
    width: 100%;
    height: 40px;
    appearance: none;
    outline: none;
    background: $white;
    box-sizing: border-box;
    border: 1px solid $pink;
    border-radius: 10px;
    padding: 10px 15px;
  }
}

.icon {
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  height: 24px;
  color: $darkGray;
  pointer-events: none;
}
</style>
