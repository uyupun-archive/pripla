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
      <div v-if="showFilterPanel" class="filter-panel">
        <slot />
      </div>
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showFilterPanel: false,
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
  z-index: 1;

  &-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding: 10px 15px;
    border-bottom: 1px solid $gray;
  }

  &-text {
    font-size: 1.4rem;
  }

  &-panel {
    background: $white;
    padding: 15px;
    border-bottom: 1px solid $gray;
  }

  & .icon {
    width: auto;
    height: 24px;
  }
}
</style>
