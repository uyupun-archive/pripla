<template>
  <div>
    <!--
      edge: [treeTypes.begin, treeTypes.end].includes(node.type),
      process: node.type === treeTypes.process,
      if: node.type === treeTypes.if,
    -->
    <div
      v-for="node in tree"
      :key="node.id"
      class="relative"
      :style="{ height: `${node.type === treeTypes.if ? 176 : 125}px` }"
    >
      <!-- <div>{{ node.name }}</div> -->
      <EdgeNode v-if="node.type === treeTypes.end">解散</EdgeNode>
      <div
        :class="{ absolute: tier !== 1 }"
        :style="{ left: `${250 * (tier - 1)}px` }"
      >
        <EdgeNode v-if="node.type === treeTypes.begin" :begin-node="true">
          集合
        </EdgeNode>
        <ProcessNode
          v-if="node.type === treeTypes.process"
          @input="onChangeProcessNode"
        />
        <IfNode v-if="node.type === treeTypes.if" @input="onChangeIfNode" />
      </div>
      <button
        v-if="[treeTypes.begin, treeTypes.process].includes(node.type)"
        type="button"
        @click="addProcessNode(node.raw)"
      >
        +
      </button>
      <button
        v-if="[treeTypes.process, treeTypes.if].includes(node.type)"
        type="button"
        @click="removeNode(node.raw)"
      >
        -
      </button>
      <button
        v-if="[treeTypes.begin, treeTypes.process].includes(node.type)"
        type="button"
        @click="addIfNode(node.raw)"
      >
        if
      </button>
      <button
        v-if="node.type === treeTypes.if"
        type="button"
        @click="addProcessNode(node.raw)"
      >
        Yes
      </button>
      <button
        v-if="node.type === treeTypes.if"
        type="button"
        @click="addChildProcessNode(node.raw)"
      >
        No
      </button>
      <button
        v-if="node.type === treeTypes.if"
        type="button"
        @click="addIfNode(node.raw)"
      >
        Yes if
      </button>
      <button
        v-if="node.type === treeTypes.if"
        type="button"
        @click="addChildIfNode(node.raw)"
      >
        No if
      </button>
      <div v-if="node.children.length > 0">
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
    onChangeProcessNode(e) {
      console.log(this.tree)
      console.log('onChangeProcessNode', e.target.value)
    },
    onChangeIfNode(e) {
      console.log('onChangeIfNode', e.target.value)
    },
  },
}
</script>

<style lang="scss" scoped>
.edge {
  border: 2px solid #000;
  background-color: red;
}

.process {
  border: 2px solid #000;
  background-color: blue;
}

.if {
  border: 2px solid #000;
  background-color: green;
}

.node {
  margin-left: 20px;
}

.relative {
  position: relative;
  top: 0;
}

.absolute {
  position: absolute;
  top: 0;
}
</style>
