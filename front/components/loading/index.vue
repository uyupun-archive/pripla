<template>
  <div>
    <div class="loading">
      <img
        src="~/assets/images/loading.svg"
        alt="ローディング"
        class="loading-icon"
      />
    </div>
  </div>
</template>

<style lang="scss" scoped>
.loading {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  background: rgba($gray, 0.3);
  z-index: 9999;

  &-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50px;
  }
}
</style>
