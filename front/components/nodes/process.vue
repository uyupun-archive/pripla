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
    content: '';
    position: absolute;
    left: 50%;
    bottom: -50px;
    transform: translateX(-50%);
    display: inline-block;
    width: 1px;
    height: 50px;
    background: $black;
  }

  &::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -60px;
    transform: translateX(-50%);
    display: inline-block;
    border: 5px solid transparent;
    border-top: 5px solid $black;
  }
}

.process-node {
  width: 200px;
  display: inline-block;
  text-align: center;
  color: $white;
  font-size: 14px;
  line-height: 1;
  background: $pink;
  outline: none;
  box-sizing: border-box;
  padding: 12px 20px;
  border: none;
  border-radius: 10px;
  min-height: 40px;

  &::placeholder {
    color: $lightGray;
  }
}
</style>
