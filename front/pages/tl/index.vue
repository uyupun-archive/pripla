<template>
  <div>
    <Header ref="header">
      <form @submit.prevent="search">
        <div class="form-item">
          <SelectBox name="prefecture" :options="prefectureOptions" />
        </div>
        <div class="form-item">
          <SelectBox name="budget" :options="budgetOptions" />
        </div>
        <div class="form-item form-radio">
          <RadioButton
            v-for="target in targets"
            :id="`target-${target.id}`"
            :key="target.id"
            name="target"
            :value="String(target.id)"
            :text="target.name"
          />
        </div>
        <div class="form-btn">
          <Button type="submit">検索</Button>
        </div>
      </form>
    </Header>
    <div class="container tl">
      <div v-if="plans">
        <Card
          v-for="plan in plans"
          :key="plan.id"
          :title="plan.title"
          :prefecture="plan.prefecture.name"
          :budget="plan.budget.range"
          :target="plan.target.name"
          @click.native="$router.push(`/detail/${plan.id}`)"
        />
      </div>
      <div v-if="plansNot">
        <p class="plans-not__msg">デートプランが存在しません</p>
      </div>
      <div class="btn-plus">
        <IconButton icon="plus" @click.native="$router.push('/post')" />
      </div>
    </div>
    <Loading v-if="loading" />
  </div>
</template>

<script>
import Card from '~/components/card/index.vue'
import Header from '~/components/header/filter.vue'
import SelectBox from '~/components/form/select.vue'
import RadioButton from '~/components/form/radio.vue'
import Button from '~/components/button/index.vue'
import IconButton from '~/components/button/icon.vue'
import Loading from '~/components/loading/index.vue'

export default {
  components: {
    Card,
    Header,
    SelectBox,
    RadioButton,
    Button,
    IconButton,
    Loading,
  },
  data() {
    return {
      plans: null,
      plansNot: false,
      prefectureOptions: [
        {
          value: '',
          text: '地域',
          selected: true,
        },
      ],
      budgetOptions: [
        {
          value: '',
          text: '予算',
          selected: true,
        },
      ],
      prefectures: null,
      budgets: null,
      targets: null,
      loading: false,
    }
  },
  mounted() {
    this.loading = true
    Promise.all([
      this.featchTl(),
      this.fetchPrefectures(),
      this.fetchBudgets(),
      this.fetchTargets(),
    ]).finally(() => {
      this.loading = false
    })
  },
  methods: {
    featchTl(params = null) {
      this.plans = null
      this.plansNot = false
      if (params) {
        return this.$fetchTl(params).then((plans) => {
          if (plans.length) this.plans = plans
          else this.plansNot = true
        })
      } else {
        return this.$fetchTl().then((plans) => {
          if (plans.length) this.plans = plans
          else this.plansNot = true
        })
      }
    },
    fetchPrefectures() {
      return this.$fetchPrefectures().then((prefectures) => {
        this.prefectures = prefectures
        this.addPrefectureOptions(prefectures)
      })
    },
    fetchBudgets() {
      return this.$fetchBudgets().then((budgets) => {
        this.budgets = budgets
        this.addBudgetOptions(budgets)
      })
    },
    fetchTargets() {
      return this.$fetchTargets().then((targets) => {
        this.targets = targets
      })
    },
    addPrefectureOptions(prefectures) {
      prefectures.map((prefecture) => {
        this.prefectureOptions.push({
          value: prefecture.id,
          text: prefecture.name,
          selected: false,
        })
      })
    },
    addBudgetOptions(budgets) {
      budgets.map((budget) => {
        this.budgetOptions.push({
          value: budget.id,
          text: budget.range,
          selected: false,
        })
      })
    },
    validation(params) {
      return (
        'prefecture_id' in params ||
        'budget_id' in params ||
        'target_id' in params
      )
    },
    search(e) {
      const params = {}
      if (Number(e.target.prefecture.value))
        params.prefecture_id = Number(e.target.prefecture.value)
      if (Number(e.target.budget.value))
        params.budget_id = Number(e.target.budget.value)
      if (Number(e.target.target.value))
        params.target_id = Number(e.target.target.value)

      this.loading = true
      if (this.validation(params)) {
        this.featchTl(params).finally(() => {
          this.$refs.header.toggleFilterPanel()
          this.loading = false
        })
      } else {
        this.featchTl().finally(() => {
          this.$refs.header.toggleFilterPanel()
          this.loading = false
        })
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.form {
  &-item {
    margin: 0 0 20px;
  }

  &-radio {
    display: flex;
    align-items: center;

    & div {
      margin-right: 10px;

      &:last-of-type {
        margin-right: 0;
      }
    }
  }

  &-btn {
    text-align: center;
  }
}

.tl {
  padding-top: 60px;
}

.btn {
  &-plus {
    position: fixed;
    bottom: 15px;
    right: 15px;
  }
}

.plans {
  &-not {
    &__msg {
      font-size: 14px;
      text-align: center;
      margin: 0;
    }
  }
}
</style>
