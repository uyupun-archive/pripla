import TreeModel from 'tree-model'
import { TreeTypes } from './tree-types'

const treeModel = new TreeModel()

export const getNodes = (shapedTree = null) => {
  return {
    id: 1,
    name: 'root',
    value: '',
    type: TreeTypes.root,
    children: shapedTree || [
      {
        id: 2,
        name: '集合',
        value: '',
        type: TreeTypes.begin,
      },
      { id: 3, name: '解散', value: '', type: TreeTypes.end },
    ],
  }
}

export const getTree = (shapedTree = null) => {
  return treeModel.parse(getNodes(shapedTree))
}
