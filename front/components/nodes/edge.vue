<template>
  <div class="edgenode" :type="string">
    <slot />
  </div>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
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
</style>
