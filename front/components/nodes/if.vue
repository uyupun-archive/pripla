<template>
  <div class="if-box">
    <input
      v-if="inputMode"
      class="if-inner"
      type="text"
      :name="name"
      :value="defaultValue"
      placeholder="条件を入力"
      maxlength="16"
      @input="onChange"
    />
    <span v-else class="if-inner">{{ value }}</span>
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
.if {
  &-box {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 50px;
    width: 105px;
    height: 105px;
    background-color: $pink;
    border-radius: 3px;
    overflow: hidden;
    transform: rotate(45deg) skew(-22deg, -22deg);
  }

  &-inner {
    width: 160px;
    text-align: center;
    display: inline-block;
    color: $white;
    font-size: 14px;
    background: $pink;
    outline: none;
    padding: 0;
    border: none;
    box-sizing: border-box;
    transform: skew(22deg, 22deg) rotate(-45deg);

    &::placeholder {
      color: $lightGray;
    }

    &:-webkit-autofill {
      animation-name: onAutoFillStart;
      transition: all 50000s ease-in-out 0s;
    }
  }
}

@keyframes onAutoFillStart {
  from {
  }
  to {
  }
}
</style>
