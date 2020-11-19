<template>
  <div>
    <div class="arrow">
      <input
        v-if="inputMode"
        class="process-node"
        type="text"
        :name="name"
        :value="defaultValue"
        placeholder="行動を入力"
        maxlength="16"
        @input="onChange"
      />
      <span v-else class="process-node">{{ value }}</span>
    </div>
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
.arrow {
  position: relative;
  display: inline-block;
  width: 200px;
  max-height: 40px;
  margin-bottom: 55px;

  &::before {
    position: absolute;
    bottom: -50px;
    left: 50%;
    display: inline-block;
    width: 1px;
    height: 50px;
    content: '';
    background: $black;
    transform: translateX(-50%);
  }

  &::after {
    position: absolute;
    bottom: -60px;
    left: 50%;
    display: inline-block;
    content: '';
    border: 5px solid transparent;
    border-top: 5px solid $black;
    transform: translateX(-50%);
  }
}

.process-node {
  box-sizing: border-box;
  display: inline-block;
  width: 200px;
  min-height: 40px;
  padding: 12px 20px;
  font-size: 14px;
  line-height: 1;
  color: $white;
  text-align: center;
  background: $pink;
  border: none;
  border-radius: 10px;
  outline: none;

  &::placeholder {
    color: $lightGray;
  }
}
</style>
