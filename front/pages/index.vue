<template>
  <div>
    <div class="container background-image">
      <div class="logo-wrapper">
        <img class="logo-image" src="~/assets/logo/logo_white.png" alt="ロゴ" />
        <h1 class="logo-title">Pripla</h1>
        <h2 class="logo-subtitle">Princess &amp; Prince date planning</h2>
      </div>
    </div>
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
        <Button>さあ、はじめよう</Button>
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
}
</script>

<style lang="scss" scoped>
.background-image {
  height: 250px;
  background: linear-gradient(-135deg, $orange, $pink);
  margin-bottom: 30px;
}

.logo {
  &-wrapper {
    padding-top: 60px;
    text-align: center;
    font-family: 'Comfortaa', sans-serif;
    color: $white;
  }

  &-image {
    width: 80px;
    height: 80px;
    margin-bottom: 5px;
  }

  &-title {
    margin: 0;
    font-size: 36px;
    margin-bottom: 5px;
  }

  &-subtitle {
    margin: 0;
    font-size: 16px;
  }
}

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
