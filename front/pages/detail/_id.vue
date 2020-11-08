<template>
  <div class="container">
    <header class="header">
      <Fa
        icon="chevron-left"
        class="header-returnIcon"
        @click="$router.push('/tl')"
      />
      <div class="header-title">デートプラン</div>
    </header>
    <div v-if="plan" class="plan">
      <h3 class="plan-title">{{ plan.title }}</h3>
      <div class="plan-detail">
        <ul class="plan-list">
          <li class="plan-item">
            <Fa icon="map-marker-alt" class="plan-detail__icon" />
            <span class="plan-detail__margin">地域</span>
            <span>{{ plan.prefecture.name }}</span>
          </li>
          <li class="plan-item">
            <Fa icon="dollar-sign" class="plan-detail__icon" />
            <span class="plan-detail__margin">予算</span>
            <span>{{ plan.budget.range }}</span>
          </li>
          <li class="plan-item">
            <Fa icon="user-friends" class="plan-detail__icon" />
            <span class="plan-detail__margin">{{ plan.target.name }}</span>
          </li>
        </ul>
      </div>
      <div class="plan-detail">
        <ul class="plan-list">
          <li class="plan-item">
            <Fa icon="plane" class="plan-detail__icon" />
            <span>デートの流れ</span>
          </li>
        </ul>
        <div class="flow-chart">
          <Renderer
            :tree="parseTreeModel(plan.flow_chart)"
            :input-mode="false"
          />
        </div>
      </div>
    </div>
    <Loading v-if="loading" />
  </div>
</template>

<script>
import TreeModel from 'tree-model'
import Loading from '~/components/loading/index.vue'
import Renderer from '~/components/flow-chart/renderer.vue'

export default {
  components: {
    Loading,
    Renderer,
  },
  data() {
    return {
      plan: null,
      loading: false,
    }
  },
  mounted() {
    if (this.$route.params.id) {
      const params = {
        id: this.$route.params.id,
      }
      this.loading = true
      this.fetchDetail(params).finally(() => {
        this.loading = false
      })
    } else {
      this.$router.push('/404')
    }
  },
  methods: {
    fetchDetail(params) {
      return this.$fetchDetail(params)
        .then((plan) => {
          this.plan = plan
          this.loading = false
        })
        .catch(() => {
          this.$router.push('/404')
        })
    },
    parseTreeModel(tree) {
      const treeModel = new TreeModel()
      return treeModel.parse(tree)
    },
  },
}
</script>

<style lang="scss" scoped>
.header {
  position: relative;
  display: flex;
  align-items: center;
  padding: 15px 0 0;
  margin: 0 0 20px;

  &-title {
    font-size: 14px;
    width: 100%;
    text-align: center;
  }

  &-returnIcon {
    position: absolute;
    width: 20px;
    height: 20px;
    cursor: pointer;
  }
}

.plan {
  margin-bottom: 12px;

  &-title {
    font-size: 18px;
    text-align: center;
    font-weight: normal;
    margin: 0 0 20px;
  }

  &-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
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

.flow {
  &-chart {
    overflow: scroll;
    height: calc(100vh - 250px);
    min-height: 200px;
    margin: 0 15px 15px;
  }
}
</style>
