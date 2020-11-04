<template>
  <div>
    <div class="background-image">
      <div class="container">
        <div class="area-title">
          <img
            class="mainlogo"
            src="~/assets/logo/logo_white.png"
            alt="ロゴ"
            width="75"
            height="75"
          />
          <h2 class="title">Pripla</h2>
          <h4 class="subtitle">Princess & Prince date planning</h4>
        </div>
      </div>
    </div>
    <div class="container">
      <h5 class="explain">臨機応変なデートプランをシェア</h5>
      <p class="explain-containt">
        ほげほげほげほげほげほげほげほげほげほげ
        ほげほげほげほげほげほげほげほげほげほげ
        ほげほげほげほげほげほげほげほげほげほげ
        ほげほげほげほげほげほげほげほげほげほげ
        ほげほげほげほげほげほげほげほげほげほげ
        ほげほげほげほげほげほげほげほげほげほげ
        ほげほげほげほげほげほげほげほげほげほげ
      </p>
      <div>
        <button>さあ、はじめよう</button>
      </div>
    </div>
  </div>
</template>

<script></script>

<style lang="scss" scoped>
.background-image {
  height: 250px;
  background-image: url(https://placehold.jp/375x250.png);
  background-position: center;
  background-repeat: no-repeat;
}

.container {
  position: absolute;
  text-align: center;
}

.area-title {
  color: white;
}

.mainlogo {
  margin: 70px auto 0;
}

.title {
  font-size: 36px;
  margin: 0 auto;
}

.subtitle {
  font-size: 16px;
  margin: 0 auto;
}
.explain {
  font-size: 18px;

  &-containt {
    max-width: 350px;
    font-size: 14px;
    margin: 0 auto 30px;
  }
}
</style>
