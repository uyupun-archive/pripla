<template>
  <div>
    <Header>
      <form @submit.prevent="onSubmit">
        <div class="form-item">
          <SelectBox name="prefecture" :options="prefectureOptions" />
        </div>
        <div class="form-item">
          <SelectBox name="budget" :options="budgetOptions" />
        </div>
        <div class="form-item form-radio">
          <RadioButton
            id="target-1"
            name="target"
            value="1"
            text="どちらでも"
          />
          <RadioButton id="target-2" name="target" value="2" text="男性向け" />
          <RadioButton id="target-3" name="target" value="3" text="女性向け" />
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
      <div v-else>
        <p>デートプランが存在しません</p>
      </div>
      <div class="btn-plus">
        <IconButton icon="plus" @click.native="$router.push('/post')" />
      </div>
    </div>
  </div>
</template>

<script>
import Card from '~/components/card/index.vue'
import Header from '~/components/header/filter.vue'
import SelectBox from '~/components/form/select.vue'
import RadioButton from '~/components/form/radio.vue'
import Button from '~/components/button/index.vue'
import IconButton from '~/components/button/icon.vue'

export default {
  components: {
    Card,
    Header,
    SelectBox,
    RadioButton,
    Button,
    IconButton,
  },
  data() {
    return {
      plans: null,
      prefectureOptions: [
        {
          value: '',
          text: '地域',
          selected: true,
        },
        {
          value: '1',
          text: '北海道',
          selected: false,
        },
      ],
      budgetOptions: [
        {
          value: '',
          text: '予算',
          selected: true,
        },
        {
          value: '1',
          text: '0 - 1,500円',
          selected: false,
        },
      ],
    }
  },
  mounted() {
    this.getPlans()
  },
  methods: {
    getPlans() {
      // API通信
      this.plans = [
        {
          id: 1,
          title: '北海道雪まつりプラン',
          prefecture: {
            id: 1,
            name: '北海道',
          },
          budget: {
            id: 1,
            range: '0 - 1,500円',
          },
          target: {
            id: 1,
            name: 'どちらでも',
          },
        },
        {
          id: 2,
          title: '北海道グルメプラン',
          prefecture: {
            id: 1,
            name: '北海道',
          },
          budget: {
            id: 1,
            range: '0 - 1,500円',
          },
          target: {
            id: 1,
            name: 'どちらでも',
          },
        },
      ]
    },
    onSubmit(e) {
      // TODO: API通信
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
</style>
