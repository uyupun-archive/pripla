<template>
  <div>
    <transition name="page">
      <Nuxt />
    </transition>
  </div>
</template>

<style lang="scss" scoped>
.page-enter {
  opacity: 0;

  &-active {
    transition: opacity 1.5s;
  }
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
  from {
    opacity: 0;
  }
}
</style>
