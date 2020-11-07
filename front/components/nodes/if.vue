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
    justify-content: center;
    align-items: center;
    width: 100px;
    height: 100px;
    background-color: $pink;
    border-radius: 3px;
    overflow: hidden;
    transform: translateX(50%) rotate(45deg) skew(-22deg, -22deg);
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

.arrow {
  position: relative;
  top: 0;
  left: 0;
  display: inline-block;
  width: 200px;
  margin: -8.5px 0 26px;

  &::before {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -21px;
    transform: translateX(-50%);
    display: inline-block;
    width: 1px;
    height: 30px;
    background: $black;
  }

  &::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -31px;
    transform: translateX(-50%);
    display: inline-block;
    border: 5px solid transparent;
    border-top: 5px solid $black;
  }

  &-side {
    position: absolute;
    top: 50px;
    right: -47px;
    width: 50px;
    height: 1px;
    background: $black;

    &::after {
      content: '';
      position: absolute;
      top: -5px;
      right: -10px;
      display: inline-block;
      border: 5px solid transparent;
      border-left: 5px solid $black;
    }
  }
}
</style>
