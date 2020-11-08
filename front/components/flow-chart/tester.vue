<template>
  <div>
    <div
      v-for="node in tree.children"
      :key="node.model.id"
      :class="{
        edge: [treeTypes.begin, treeTypes.end].includes(node.model.type),
        process: node.model.type === treeTypes.process,
        if: node.model.type === treeTypes.if,
      }"
      class="node"
    >
      <div>{{ node.model.name }}</div>
      <div>
        <input
          v-if="[treeTypes.process, treeTypes.if].includes(node.model.type)"
          type="text"
          :value="node.model.value"
          @change="setValue({ node, event: $event })"
        />
      </div>
      <button
        v-if="[treeTypes.begin, treeTypes.process].includes(node.model.type)"
        type="button"
        @click="addProcessNode(node)"
      >
        +
      </button>
      <button
        v-if="[treeTypes.process, treeTypes.if].includes(node.model.type)"
        type="button"
        @click="removeNode(node)"
      >
        -
      </button>
      <button
        v-if="[treeTypes.begin, treeTypes.process].includes(node.model.type)"
        type="button"
        @click="addIfNode(node)"
      >
        if
      </button>
      <button
        v-if="node.model.type === treeTypes.if"
        type="button"
        @click="addProcessNode(node)"
      >
        Yes
      </button>
      <button
        v-if="node.model.type === treeTypes.if"
        type="button"
        @click="addChildProcessNode(node)"
      >
        No
      </button>
      <button
        v-if="node.model.type === treeTypes.if"
        type="button"
        @click="addIfNode(node)"
      >
        Yes if
      </button>
      <button
        v-if="node.model.type === treeTypes.if"
        type="button"
        @click="addChildIfNode(node)"
      >
        No if
      </button>
      <div v-if="node.hasOwnProperty('children') && node.children.length > 0">
        <Tester
          :tree="node"
          @setValue="setValue"
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
import Tester from '~/components/flow-chart/tester.vue'
import { TreeTypes } from '~/components/flow-chart/tree-types.js'

export default {
  name: 'Tester',
  components: {
    Tester,
  },
  props: {
    tree: {
      type: Object,
      required: true,
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
</style>
