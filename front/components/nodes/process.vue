<template>
  <div>
    <form>
      <input
        class="processnode"
        type="text"
        name="action"
        placeholder="行動を入力"
      />
    </form>
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
