<template>
  <div>
    <Header />
    <div class="container center">
      <p class="msg">このページは存在しません</p>
      <Button @click.native="$router.push('/')">トップページへ戻る</Button>
    </div>
  </div>
</template>

<script>
import Button from '~/components/button/index.vue'
import Header from '~/components/header/index.vue'

export default {
  components: {
    Button,
    Header,
  },
}
</script>

<style lang="scss" scoped>
.center {
  text-align: center;
}

.msg {
  font-size: 14px;
  margin: 0 0 40px;

  @include desktop() {
    font-size: 18px;
    margin: 0 0 60px;
  }
}
</style>
