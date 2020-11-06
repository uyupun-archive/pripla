<template>
  <div class="if-box">
    <input
      class="if-inner"
      type="text"
      name="action"
      placeholder="行動を入力"
      maxlength="16"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      action: String,
    }
  },
}
</script>

<style lang="scss" scoped>
.if {
  &-box {
    position: relative;
    margin-left: 50px;
    width: 105px;
    height: 105px;
    background-color: $pink;
    border-radius: 3px;
    overflow: hidden;
    transform: rotate(45deg) skew(-22deg, -22deg);
  }

  &-inner {
    position: absolute;
    width: 105px;
    height: 105px;
    text-align: center;
    display: inline-block;
    color: $white;
    font-size: 14px;
    background: $pink;
    outline: none;
    border: none;
    box-sizing: border-box;
    transform: skew(22deg, 22deg) rotate(-45deg);

    &:-webkit-autofill {
      animation-name: onAutoFillStart;
      transition: all 50000s ease-in-out 0s;
    }
  }
}

::placeholder {
  color: $white;
}
@keyframes onAutoFillStart {
  from {
  }
  to {
  }
}
</style>
