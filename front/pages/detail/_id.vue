<template>
  <div class="container">
    <header class="header">
      <Fa icon="chevron-left" class="header-returnIcon" />
      <div class="header-title">デートプラン</div>
    </header>
    <div class="plan">
      <h3 class="plan-title">うゆぷん動物園めぐり</h3>
      <div class="plan-detail">
        <ul class="plan-list">
          <li class="plan-item">
            <Fa icon="map-marker-alt" class="plan-detail__icon" />
            <span class="plan-detail__margin">地域</span>
            <span>大坂</span>
          </li>
          <li class="plan-item">
            <Fa icon="dollar-sign" class="plan-detail__icon" />
            <span class="plan-detail__margin">予算</span>
            <span>10,000~20,000</span>
          </li>
          <li class="plan-item">
            <Fa icon="user-friends" class="plan-detail__icon" />
            <span class="plan-detail__margin">男性向け</span>
          </li>
          <li class="plan-item">
            <Fa icon="plane" class="plan-detail__icon" />
            <span>デートの流れ</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script></script>

<style lang="scss" scoped>
.header {
  position: relative;
  height: 40px;
  display: flex;
  align-items: center;

  &-title {
    font-size: 14px;
    width: 100%;
    text-align: center;
  }

  &-returnIcon {
    position: absolute;
    width: 20px;
    height: 20px;
  }
}

.plan {
  margin-bottom: 12px;

  &-title {
    font-size: 18px;
    text-align: center;
    font-weight: normal;
  }

  &-list {
    list-style-type: none;
    padding: 0;
  }

  &-item {
    margin-bottom: 10px;
    height: 20px;

    &:nth-of-type(3) {
      margin-bottom: 20px;
    }
  }

  &-detail {
    text-align: left;
    font-size: 14px;
    padding-left: 25px;

    &__icon {
      width: 20px;
      height: 20px;
      vertical-align: middle;
    }

    &__margin {
      margin-right: 20px;
    }
  }
}
</style>
