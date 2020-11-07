<template>
  <div>
    <div v-for="node in tree" :key="node.id" class="flexbox">
      <div class="relative">
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
            v-if="!searchIfNode()"
            icon="code-branch"
            class="btn"
            @click="addIfNode(node.raw)"
          />
        </div>
        <div v-if="node.type === treeTypes.if" class="btns">
          <div class="btns-item">
            <Fa icon="plus" class="btn" @click="addProcessNode(node.raw)" />
            <Fa
              v-if="!searchIfNode()"
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
    searchIfNode() {
      let flag = false
      this.tree.map((node) => {
        if (node.type === this.treeTypes.if) flag = true
      })
      return flag
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
    onChangeProcessNode(node, e) {
      this.$emit('setValue', node, e.target.value)
    },
    onChangeIfNode(node, e) {
      this.$emit('setValue', node, e.target.value)
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
}
</style>
