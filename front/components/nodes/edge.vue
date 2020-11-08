<template>
  <div>
    <div class="edgenode" :class="{ arrow: beginNode }">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    beginNode: {
      type: Boolean,
      default: false,
    },
  },
}
</script>

<style lang="scss" scoped>
.edgenode {
  width: 200px;
  padding: 13px 20px;
  border-radius: 50px;
  display: inline-block;
  text-align: center;
  color: $white;
  font-size: 14px;
  line-height: 1;
  background: $pink;
  outline: none;
  box-sizing: border-box;
  border: none;
}

.arrow {
  position: relative;
  margin: 0 0 55px;

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
</style>
