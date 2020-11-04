<template>
  <div class="container">
    <header class="header">
      <Fa icon="chevron-left" class="header-returnIcon" />
      <p class="header-title">デートプラン</p>
    </header>
    <div class="plan">
      <h3 class="plan-title">うゆぷん動物園めぐり</h3>
      <table class="plan-detail">
        <tr>
          <td>
            <Fa icon="map-marker-alt" class="plan-detail__icon" />
            <span>地域</span>
          </td>
          <td>大坂</td>
        </tr>
        <tr>
          <td>
            <Fa icon="dollar-sign" class="plan-detail__icon" />
            <span>予算</span>
          </td>
          <td>10,000~20,000</td>
        </tr>
        <tr>
          <td>
            <Fa icon="user-friends" class="plan-detail__icon" />
            <span>男性向け</span>
          </td>
        </tr>
        <br />
        <tr>
          <td>
            <Fa icon="plane" class="plan-detail__icon" />
            <span>デートの流れ</span>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script></script>

<style lang="scss" scoped>
.container {
  margin: 0 auto;
}

.header {
  height: 40px;
  display: flex;
  align-items: center;

  &-title {
    font-size: 14px;
    margin: 4px auto;
  }

  &-returnIcon {
    position: absolute;
    width: 20px;
    height: 20px;
    margin-left: 15%;
  }
}

.plan {
  text-align: center;
  margin-bottom: 15px;

  &-title {
    font-size: 18px;
  }

  &-detail {
    width: 250px;
    text-align: left;
    line-height: 30px;
    font-size: 14px;
    padding: 1px 4px;
    margin: 0 auto;

    &__icon {
      width: 20px;
      height: 20px;
    }
  }
}
</style>
