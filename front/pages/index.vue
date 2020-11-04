<template>
  <div>
    <div class="container background-image">
      <div class="logo-wrapper">
        <img class="logo-image" src="~/assets/logo/logo_white.png" alt="ロゴ" />
        <h2 class="logo-title">Pripla</h2>
        <h4 class="logo-subtitle">Princess & Prince date planning</h4>
      </div>
    </div>
    <div class="container">
      <div class="feature-wrapper">
        <h5 class="feature-title">臨機応変なデートプランをシェア</h5>
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
        <button>さあ、はじめよう</button>
      </div>
    </div>
  </div>
</template>

<script></script>

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
  }

  &-image {
    width: 80px;
    height: 80px;
  }

  &-title {
    margin: 0;
    font-size: 36px;
    color: $white;
  }

  &-subtitle {
    margin: 0;
    font-size: 16px;
    color: $white;
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
