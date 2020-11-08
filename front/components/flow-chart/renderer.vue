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
          @click="removeNode(node)"
        />
        <div
          v-if="[treeTypes.begin, treeTypes.process].includes(node.model.type)"
          class="btns"
        >
          <Fa icon="plus" class="btn" @click="addProcessNode(node)" />
          <Fa
            v-if="searchIfNodeIndex() === -1"
            icon="code-branch"
            class="btn"
            @click="addIfNode(node)"
          />
        </div>
        <div v-if="node.model.type === treeTypes.if" class="btns">
          <div class="btns-item">
            <Fa icon="plus" class="btn" @click="addProcessNode(node)" />
            <Fa
              v-if="searchIfNodeIndex() === -1"
              icon="code-branch"
              class="btn"
              @click="addIfNode(node)"
            />
          </div>
          <div class="btns-item">
            <Fa icon="plus" class="btn" @click="addChildProcessNode(node)" />
            <Fa icon="code-branch" class="btn" @click="addChildIfNode(node)" />
          </div>
        </div>
      </div>
      <div
        v-if="node.hasOwnProperty('children') && node.children.length > 0"
        :style="{
          padding: `${
            node.children[0].model.type === treeTypes.if ? '0' : '20px 0 0'
          }`,
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
    addProcessNode(raw) {
      this.$emit('addProcessNode', raw)
    },
    addChildProcessNode(raw) {
      this.$emit('addChildProcessNode', raw)
    },
    addIfNode(raw) {
      this.$emit('addIfNode', raw)
    },
    addChildIfNode(raw) {
      this.$emit('addChildIfNode', raw)
    },
    removeNode(raw) {
      this.$emit('removeNode', raw)
    },
    searchIfNodeIndex() {
      return this.tree.children.findIndex(
        (node, index) => node.model.type === this.treeTypes.if
      )
    },
    calculateTop(index) {
      const ifNodeIndex = this.searchIfNodeIndex()
      if (ifNodeIndex === -1 && this.tier === 1) {
        return 105 * index
      } else if (ifNodeIndex !== -1 && this.tier === 1) {
        return ifNodeIndex < index ? 105 * (index - 1) + 147.5 : 105 * index
      } else if (ifNodeIndex === -1 && this.tier !== 1) {
        return 105 * index - 147.5
      } else {
        return ifNodeIndex < index ? 105 * (index - 1) : 105 * index - 147.5
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.btns {
  display: inline-flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;

  &-item {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 50%;
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
    right: -10px;
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
