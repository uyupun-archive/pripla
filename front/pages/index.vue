<template>
  <div>
    <Header />
    <div class="container">
      <div class="feature-wrapper">
        <h2 class="feature-title">臨機応変なデートプランをシェア</h2>
        <p class="feature-description">
          どこか一箇所のスポットに行くことだけがデートではありません。
          目的地の他にも食事やショッピングといった行き先の設定、雨が降ったり混雑していたら...といったイレギュラーにもスマートに対応したいもの。
          Priplaではそんな幾通りもある分岐をカバーしたデートプランが共有されています。
        </p>
      </div>
      <div class="start-btn">
        <Button @click.native="$router.push(`/tl`)">デートプランを見る</Button>
      </div>
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
    line-height: 1.8;
    font-size: 14px;
  }
}

.start-btn {
  text-align: center;
}
</style>
