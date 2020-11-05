<template>
  <div>
    <div class="container">
      <form class="form" @submit.prevent="onSubmit">
        <div class="form-links">
          <nuxt-link to="/tl" class="link">キャンセル</nuxt-link>
          <Button type="submit" size="small">投稿</Button>
        </div>
        <div class="form-item">
          <TextBox name="title" placeholder="タイトル" />
        </div>
        <div class="form-item">
          <SelectBox name="prefecture" :options="prefectureOptions" />
        </div>
        <div class="form-item">
          <SelectBox name="budget" :options="budgetOptions" />
        </div>
        <div class="form-radio">
          <RadioButton
            v-for="target in targets"
            :id="`target-${target.id}`"
            :key="target.id"
            name="target"
            :value="String(target.id)"
            :text="target.name"
            :checked="target.id === 1"
          />
        </div>
        <div>デートの流れ</div>
      </form>
    </div>
  </div>
</template>

<script>
import TextBox from '~/components/form/textbox.vue'
import SelectBox from '~/components/form/select.vue'
import RadioButton from '~/components/form/radio.vue'
import Button from '~/components/button/index.vue'

export default {
  components: {
    SelectBox,
    RadioButton,
    Button,
    TextBox,
  },
  data() {
    return {
      prefectures: null,
      budgets: null,
      targets: null,
      prefectureOptions: [
        {
          value: '0',
          text: '地域',
          selected: true,
        },
      ],
      budgetOptions: [
        {
          value: '0',
          text: '予算',
          selected: true,
        },
      ],
    }
  },
  mounted() {
    this.fetchPrefectures()
    this.fetchBudgets()
    this.fetchTargets()
  },
  methods: {
    fetchPrefectures() {
      this.$fetchPrefectures().then((prefectures) => {
        this.prefectures = prefectures
        this.addPrefectureOptions(prefectures)
      })
    },
    fetchBudgets() {
      this.$fetchBudgets().then((budgets) => {
        this.budgets = budgets
        this.addBudgetOptions(budgets)
      })
    },
    fetchTargets() {
      this.$fetchTargets().then((targets) => {
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
    onSubmit(e) {
      // 投稿
    },
  },
}
</script>

<style lang="scss" scoped>
.form {
  font-size: 14px;
  padding: 15px 0 0;

  &-links {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 0 20px;

    & .link {
      color: $black;
      text-decoration: none;
    }
  }

  &-item {
    margin: 0 0 20px;
  }

  &-radio {
    display: flex;
    align-items: center;
    margin: 0 0 25px;

    & div {
      margin-right: 10px;

      &:last-of-type {
        margin-right: 0;
      }
    }
  }
}
</style>
