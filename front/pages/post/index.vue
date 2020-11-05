<template>
  <div>
    <h1>Post</h1>
  </div>
</template>

<script>
export default {
  data() {
    return {
      prefectures: null,
      budgets: null,
      targets: null,
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
        console.log(prefectures)
        this.prefectures = prefectures
      })
    },
    fetchBudgets() {
      this.$fetchBudgets().then((budgets) => {
        console.log(budgets)
        this.budgets = budgets
      })
    },
    fetchTargets() {
      this.$fetchTargets((targets) => {
        console.log('targets')
        console.log(targets)
        this.targets = targets
      })
    },
  },
}
</script>

<style lang="scss" scoped></style>
