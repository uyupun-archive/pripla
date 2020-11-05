<template>
  <div>
    <div class="card">
      <h3 class="card-title">{{ title }}</h3>
      <div class="card-item">
        <Fa icon="map-marker-alt" class="icon" area-hidden="true" />
        <span class="card-label">地域</span>
        <span>{{ prefecture }}</span>
      </div>
      <div class="card-item">
        <Fa icon="dollar-sign" class="icon" area-hidden="true" />
        <span class="card-label">予算</span>
        <span>{{ budget }}</span>
      </div>
      <div class="card-item">
        <Fa icon="user-friends" class="icon" area-hidden="true" />
        <span class="card-label">{{ target }}</span>
      </div>
      <Fa icon="chevron-right" class="icon icon-chevron" area-hidden="true" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    prefecture: {
      type: String,
      required: true,
    },
    budget: {
      type: String,
      required: true,
    },
    target: {
      type: String,
      required: true,
    },
  },
}
</script>

<style lang="scss" scoped>
.card {
  position: relative;
  width: 100%;
  box-sizing: border-box;
  cursor: pointer;
  padding: 15px;
  border: 1px solid $gray;
  border-radius: 10px;
  margin: 0 0 15px;

  &-title {
    font-size: 1.4rem;
    font-weight: normal;
    margin: 0 0 5px;
  }

  &-item {
    margin: 0 0 5px;

    &:last-of-type {
      margin: 0;
    }
  }

  &-label {
    margin-right: 10px;
  }

  & .icon {
    width: 12.5px;
    height: 10px;
    margin-right: 2.5px;

    &-chevron {
      position: absolute;
      right: 10px;
      bottom: 10px;
      width: auto;
      height: 16px;
      margin-right: 0;
    }
  }
}
</style>
