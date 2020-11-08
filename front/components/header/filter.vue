<template>
  <div>
    <header class="filter">
      <div class="filter-bar" @click="toggleFilterPanel">
        <div class="filter-text">絞り込み</div>
        <Fa
          v-if="showFilterPanel"
          icon="chevron-up"
          class="icon"
          area-hidden="true"
        />
        <Fa v-else icon="chevron-down" class="icon" area-hidden="true" />
      </div>
      <div
        class="filter-panel"
        :class="{ 'filter-panel__active': showFilterPanel }"
      >
        <slot />
      </div>
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showFilterPanel: true,
    }
  },
  methods: {
    toggleFilterPanel() {
      this.showFilterPanel = !this.showFilterPanel
    },
  },
}
</script>

<style lang="scss" scoped>
.filter {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background: $white;
  box-sizing: border-box;
  z-index: 50;

  &-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding: 10px 15px;
    border-bottom: 1px solid $gray;
    background-color: $white;
    z-index: 50;
  }

  &-text {
    font-size: 1.4rem;
    z-index: 2;
  }

  &-panel {
    background: $white;
    margin-bottom: -300px;
    position: relative;
    display: block;
    padding: 15px;
    border-bottom: 2px solid $gray;
    z-index: -1;
    transform: translateY(0px);
    transition: all 0.3s;

    &__active {
      overflow: hidden;
      z-index: -10;
      transform: translateY(-300px);
    }
  }

  & .icon {
    width: auto;
    height: 24px;
  }
}
</style>
