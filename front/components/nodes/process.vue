<template>
  <div>
    <input
      v-if="inputMode"
      class="processnode"
      type="text"
      :name="name"
      :value="defaultValue"
      placeholder="行動を入力"
      maxlength="16"
      @input="onChange"
    />
    <span v-else class="processnode">{{ value }}</span>
  </div>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      default: '',
    },
    defaultValue: {
      type: String,
      default: '',
    },
    inputMode: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      value: '',
    }
  },
  mounted() {
    this.value = this.defaultValue
  },
  methods: {
    onChange(e) {
      this.value = e.target.value
      this.$emit('input', e)
    },
  },
}
</script>

<style lang="scss" scoped>
.processnode {
  width: 200px;
  padding: 13px 20px;
  border-radius: 10px;
  display: inline-block;
  text-align: center;
  color: $white;
  font-size: 14px;
  line-height: 1;
  background: $pink;
  outline: none;
  box-sizing: border-box;
  border: none;

  &::placeholder {
    color: $lightGray;
  }
}
</style>
