<template>
  <div>
    <div class="container">
      <div class="feature-wrapper">
        <h2 class="feature-title">臨機応変なデートプランをシェア</h2>
        <p class="feature-description">
          ほげほげほげほげほげほげほげほげほげほげ
          ほげほげほげほげほげほげほげほげほげほげ
          ほげほげほげほげほげほげほげほげほげほげ
          ほげほげほげほげほげほげほげほげほげほげ
          ほげほげほげほげほげほげほげほげほげほげ
          ほげほげほげほげほげほげほげほげほげほげ
          ほげほげほげほげほげほげほげほげほげほげ
        </p>
      </div>
      <div class="start-btn">
        <Button @click.native="$router.push(`/tl`)">さあ、はじめよう</Button>
      </div>
    </div>
  </div>
</template>

<script>
import Button from '~/components/button/index.vue'
export default {
  components: {
    Button,
  },
  layout: 'header/index',
}
</script>

<style lang="scss" scoped>
.feature {
  &-wrapper {
    text-align: center;
  }

  &-title {
    margin: 0 0 30px 0;
    font-size: 18px;
  }

  &-description {
    margin: 0 0 30px 0;
    width: 100%;
    font-size: 14px;
  }
}

.start-btn {
  text-align: center;
}
</style>
