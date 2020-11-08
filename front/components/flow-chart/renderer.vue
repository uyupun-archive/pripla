<template>
  <div class="relative">
    <div
      v-for="(node, index) in tree.children"
      :key="node.model.id"
      class="absolute"
      :style="{
        top: `${calculateTop(index)}px`,
        left: `${tier !== 1 ? 252 : 0}px`,
      }"
    >
      <div>
        <EdgeNode v-if="node.model.type === treeTypes.begin" :begin-node="true">
          集合
        </EdgeNode>
        <EdgeNode v-if="node.model.type === treeTypes.end">解散</EdgeNode>
        <ProcessNode
          v-if="node.model.type === treeTypes.process"
          :defalut-value="node.model.value"
          @input="setValue({ node, event: $event })"
        />
        <IfNode
          v-if="node.model.type === treeTypes.if"
          :defalut-value="node.model.value"
          @input="setValue({ node, event: $event })"
        />
        <Fa
          v-if="[treeTypes.process, treeTypes.if].includes(node.model.type)"
          icon="times"
          class="btn btn-times"
          :style="{ right: `${node.model.type === treeTypes.if && 52}px` }"
          @click="removeNode(node)"
        />
        <div
          v-if="[treeTypes.begin, treeTypes.process].includes(node.model.type)"
          class="btns"
        >
          <span :style="{ widht: '100px' }">
            <Fa icon="plus" class="btn" @click="addProcessNode(node)" />
          </span>
          <span :style="{ widht: '100px' }">
            <Fa
              v-if="searchIfNodeIndex() === -1"
              icon="code-branch"
              class="btn"
              @click="addIfNode(node)"
            />
          </span>
        </div>
        <div v-if="node.model.type === treeTypes.if" class="btns">
          <div class="btns-item">
            <span />
            <span>
              <Fa icon="plus" class="btn" @click="addProcessNode(node)" />
            </span>
          </div>
          <div class="btns-item">
            <span>
              <Fa icon="plus" class="btn" @click="addChildProcessNode(node)" />
            </span>
            <span>
              <Fa
                icon="code-branch"
                class="btn"
                @click="addChildIfNode(node)"
              />
            </span>
          </div>
        </div>
      </div>
      <div
        v-if="node.hasOwnProperty('children') && node.children.length > 0"
        class="relative"
        :style="{
          top: `${node.children[0].model.type === treeTypes.process && 20}px`,
        }"
      >
        <Renderer
          :tree="node"
          :tier="tier + 1"
          @addProcessNode="addProcessNode"
          @addChildProcessNode="addChildProcessNode"
          @addIfNode="addIfNode"
          @addChildIfNode="addChildIfNode"
          @removeNode="removeNode"
          @setValue="setValue"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Renderer from '~/components/flow-chart/renderer.vue'
import EdgeNode from '~/components/nodes/edge.vue'
import IfNode from '~/components/nodes/if.vue'
import ProcessNode from '~/components/nodes/process.vue'
import { TreeTypes } from '~/components/flow-chart/tree-types.js'

export default {
  name: 'Renderer',
  components: {
    Renderer,
    EdgeNode,
    IfNode,
    ProcessNode,
  },
  props: {
    tree: {
      type: Object,
      required: true,
    },
    tier: {
      type: Number,
      default: 1,
    },
  },
  data() {
    return {
      treeTypes: TreeTypes,
    }
  },
  methods: {
    setValue(args) {
      this.$emit('setValue', args)
    },
    addProcessNode(node) {
      this.$emit('addProcessNode', node)
    },
    addChildProcessNode(node) {
      this.$emit('addChildProcessNode', node)
    },
    addIfNode(node) {
      this.$emit('addIfNode', node)
    },
    addChildIfNode(node) {
      this.$emit('addChildIfNode', node)
    },
    removeNode(node) {
      this.$emit('removeNode', node)
    },
    searchIfNodeIndex() {
      return this.tree.children.findIndex(
        (node, index) => node.model.type === this.treeTypes.if
      )
    },
    calculateTop(index) {
      const ifNodeIndex = this.searchIfNodeIndex()
      if (ifNodeIndex === -1 && this.tier === 1) {
        return 95 * index
      } else if (ifNodeIndex !== -1 && this.tier === 1) {
        return ifNodeIndex < index ? 95 * (index - 1) + 137.5 : 95 * index
      } else if (ifNodeIndex === -1 && this.tier !== 1) {
        return 95 * index - 137.5
      } else {
        return ifNodeIndex < index ? 95 * (index - 1) : 95 * index - 137.5
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.btns {
  position: absolute;
  bottom: 10px;
  display: inline-flex;
  justify-content: space-around;
  align-items: center;
  width: 200px;

  & span {
    width: 50%;

    &:first-of-type {
      text-align: right;
      padding-right: 20px;
    }

    &:last-of-type {
      padding-left: 20px;
    }
  }

  &-item {
    display: inline-flex;
    justify-content: space-around;
    align-items: center;
    width: 50%;

    & span {
      width: 50%;

      &:first-of-type {
        text-align: right;
        padding-right: 10px;
      }

      &:last-of-type {
        padding-left: 10px;
      }
    }
  }
}

.btn {
  height: 25px;
  outline: none;
  border: none;
  transform: rotate(180deg);
  z-index: 100;

  &-times {
    position: absolute;
    top: -10px;
    right: 0;
  }
}

.flexbox {
  display: inline-flex;
  justify-content: space-between;
  align-items: top;
}

.relative {
  position: relative;
  top: 0;
  left: 0;
}

.absolute {
  position: absolute;
}
</style>
