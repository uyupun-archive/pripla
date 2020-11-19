<template>
  <div>
    <div class="edge-node" :class="{ arrow: beginNode }">
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
.edge-node {
  box-sizing: border-box;
  display: inline-block;
  width: 200px;
  padding: 13px 20px;
  font-size: 14px;
  line-height: 1;
  color: $white;
  text-align: center;
  background: $pink;
  border: none;
  border-radius: 50px;
  outline: none;
}

.arrow {
  position: relative;
  margin: 0 0 55px;

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
</style>
