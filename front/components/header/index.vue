<template>
  <div>
    <div class="background">
      <div class="logo-wrapper">
        <img
          class="logo-image"
          src="~/assets/images/logo/logo_white.png"
          alt="ロゴ"
        />
        <h1 class="logo-title">Pripla</h1>
        <h2 class="logo-subtitle">Princess &amp; Prince date planning</h2>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.background {
  height: 250px;
  background: linear-gradient(-135deg, $orange, $pink);
  margin-bottom: 30px;

  @include desktop() {
    height: 400px;
    margin-bottom: 60px;
  }
}

.logo {
  &-wrapper {
    height: 250px;
    text-align: center;
    font-family: 'Comfortaa', sans-serif;
    color: $white;
    box-sizing: border-box;
    padding-top: 60px;

    @include desktop() {
      height: 400px;
      padding-top: 120px;
    }
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
</style>
