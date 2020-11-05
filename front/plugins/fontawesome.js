import Vue from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { config, library } from '@fortawesome/fontawesome-svg-core'
import {
  faMapMarkerAlt,
  faDollarSign,
  faUserFriends,
  faPlane,
  faPlus,
  faCodeBranch,
  faChevronUp,
  faChevronRight,
  faChevronDown,
  faChevronLeft,
} from '@fortawesome/free-solid-svg-icons'

// nuxt.config.jsでCSSファイルを追加
config.autoAddCss = false

// 利用するアイコンを配列に追加
const icons = [
  faMapMarkerAlt,
  faDollarSign,
  faUserFriends,
  faPlane,
  faPlus,
  faCodeBranch,
  faChevronUp,
  faChevronRight,
  faChevronDown,
  faChevronLeft,
]

// 利用するアイコンをlibraryに追加
icons.forEach((icon) => library.add(icon))

// グローバルコンポーネントに登録
Vue.component('Fa', FontAwesomeIcon)
