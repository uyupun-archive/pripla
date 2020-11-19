<template>
  <div>
    <div class="parent">
      <div class="arrow">
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
        <div class="arrow-side" />
      </div>
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
.parent {
  width: 252px;
}

.if {
  &-box {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
    overflow: hidden;
    background-color: $pink;
    border-radius: 3px;
    transform: translateX(50%) rotate(45deg) skew(-22deg, -22deg);
  }

  &-inner {
    box-sizing: border-box;
    display: inline-block;
    width: 160px;
    padding: 0;
    font-size: 14px;
    color: $white;
    text-align: center;
    background: $pink;
    border: none;
    outline: none;
    transform: skew(22deg, 22deg) rotate(-45deg);

    &::placeholder {
      color: $lightGray;
    }

    &:-webkit-autofill {
      transition: all 50000s ease-in-out 0s;
      animation-name: onAutoFillStart;
    }
  }
}

.arrow {
  position: relative;
  top: 0;
  left: 0;
  display: inline-block;
  width: 200px;
  margin: -8.5px 0 46px;

  &::before {
    position: absolute;
    bottom: -41px;
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
    bottom: -51px;
    left: 50%;
    display: inline-block;
    content: '';
    border: 5px solid transparent;
    border-top: 5px solid $black;
    transform: translateX(-50%);
  }

  &-side {
    position: absolute;
    top: 50px;
    right: -47px;
    width: 50px;
    height: 1px;
    background: $black;

    &::after {
      position: absolute;
      top: -5px;
      right: -10px;
      display: inline-block;
      content: '';
      border: 5px solid transparent;
      border-left: 5px solid $black;
    }
  }
}
</style>
