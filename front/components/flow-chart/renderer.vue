<template>
  <div class="relative">
    <div
      v-for="(node, index) in tree"
      :key="node.id"
      class="absolute"
      :style="{
        top: `${calculateTop(index)}px`,
        left: `${tier !== 1 ? 252 : 0}px`,
      }"
    >
      <div>
        <EdgeNode v-if="node.type === treeTypes.begin" :begin-node="true">
          集合
        </EdgeNode>
        <EdgeNode v-if="node.type === treeTypes.end">解散</EdgeNode>
        <ProcessNode
          v-if="node.type === treeTypes.process"
          @input="onChangeProcessNode(node, $event)"
        />
        <IfNode
          v-if="node.type === treeTypes.if"
          @input="onChangeIfNode(node, $event)"
        />
        <Fa
          v-if="[treeTypes.process, treeTypes.if].includes(node.type)"
          icon="times"
          class="btn btn-times"
          @click="removeNode(node.raw)"
        />
        <div
          v-if="[treeTypes.begin, treeTypes.process].includes(node.type)"
          class="btns"
        >
          <Fa icon="plus" class="btn" @click="addProcessNode(node.raw)" />
          <Fa
            v-if="searchIfNodeIndex() === -1"
            icon="code-branch"
            class="btn"
            @click="addIfNode(node.raw)"
          />
        </div>
        <div v-if="node.type === treeTypes.if" class="btns">
          <div class="btns-item">
            <Fa icon="plus" class="btn" @click="addProcessNode(node.raw)" />
            <Fa
              v-if="searchIfNodeIndex() === -1"
              icon="code-branch"
              class="btn"
              @click="addIfNode(node.raw)"
            />
          </div>
          <div class="btns-item">
            <Fa
              icon="plus"
              class="btn"
              @click="addChildProcessNode(node.raw)"
            />
            <Fa
              icon="code-branch"
              class="btn"
              @click="addChildIfNode(node.raw)"
            />
          </div>
        </div>
      </div>
      <div
        v-if="node.children.length > 0"
        :style="{
          padding: `${
            node.children[0].type === treeTypes.if ? '0' : '20px 0 0'
          }`,
        }"
      >
        <Renderer
          :tree="node.children"
          :tier="tier + 1"
          @addProcessNode="addProcessNode"
          @addChildProcessNode="addChildProcessNode"
          @addIfNode="addIfNode"
          @addChildIfNode="addChildIfNode"
          @removeNode="removeNode"
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
      type: Array,
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
    onChangeProcessNode(node, e) {
      this.$emit('setValue', node, e.target.value)
    },
    onChangeIfNode(node, e) {
      this.$emit('setValue', node, e.target.value)
    },
    searchIfNodeIndex() {
      return this.tree.findIndex(
        (node, index) => node.type === this.treeTypes.if
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
  z-index: 0;
}

.absolute {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
}
</style>
