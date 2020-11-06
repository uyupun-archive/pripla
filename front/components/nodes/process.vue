<template>
  <div>
    <input
      class="processnode"
      type="text"
      :name="name"
      placeholder="行動を入力"
      maxlength="16"
    />
  </div>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      default: '',
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
}
::placeholder {
  color: $white;
}
</style>
