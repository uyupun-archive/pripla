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
      <div class="filter-panel" :class="{ active: showFilterPanel }">
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
  z-index: 2;
  box-sizing: border-box;
  width: 100%;

  &-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 15px;
    cursor: pointer;
    background-color: $white;
    border-bottom: 1px solid $gray;
  }

  &-text {
    font-size: 1.4rem;
  }

  &-panel {
    position: relative;
    top: -236px;
    z-index: -1;
    display: block;
    padding: 15px;
    margin-bottom: -236px;
    overflow: hidden;
    background: $white;
    border-bottom: 2px solid $gray;
    transition: all 0.3s;
  }

  & .active {
    top: 0;
  }

  & .icon {
    width: auto;
    height: 24px;
  }
}
</style>
