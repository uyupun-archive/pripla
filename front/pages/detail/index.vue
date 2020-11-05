<template>
  <div class="container">
    <header class="header">
      <Fa icon="chevron-left" class="header-returnIcon" />
      <p class="header-title">デートプラン</p>
    </header>
    <div class="plan">
      <h3 class="plan-title">うゆぷん動物園めぐり</h3>
      <div class="plan-detail">
        <ul class="plan-ul">
          <li class="plan-li">
            <Fa icon="map-marker-alt" class="plan-detail__icon" />
            <span>地域</span>
          </li>
          <li class="plan-li">
            <Fa icon="dollar-sign" class="plan-detail__icon" />
            <span>予算</span>
          </li>
          <li class="plan-li">
            <Fa icon="user-friends" class="plan-detail__icon" />
            <span>男性向け</span>
          </li>
          <br />
          <li class="plan-li">
            <Fa icon="plane" class="plan-detail__icon" />
            <span>デートの流れ</span>
          </li>
        </ul>
        <ul class="plan-ul">
          <li class="plan-li">大坂</li>
          <li class="plan-li">10,000~20,000</li>
        </ul>
      </div>
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
  margin-bottom: 12px;

  &-title {
    font-size: 18px;
  }

  &-ul {
    list-style-type: none;
    padding: 0;
  }
  &-li {
    margin-bottom: 15px;
  }

  &-detail {
    display: flex;
    width: 250px;
    text-align: left;
    font-size: 14px;
    margin: 0 auto;

    &__icon {
      width: 20px;
      height: 20px;
      vertical-align: middle;
    }
  }
}
</style>
