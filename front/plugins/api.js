import { axios } from './axios'

/**
 * タイムラインの取得
 */
const fetchTl = (params = null) => {
  if (params) {
    return axios.$get('tl', {
      params,
    })
  } else {
    return axios.$get('tl')
  }
}

/**
 * デートプラン詳細の取得
 */
const fetchDetail = (params) => {
  return axios.$get('detail', {
    params,
  })
}

/**
 * 地域（都道府県）一覧の取得
 */
const fetchPrefectures = () => {
  return axios.$get('prefectures')
}

/**
 * 予算の一覧の取得
 */
const fetchBudgets = () => {
  return axios.$get('budgets')
}

/**
 * ターゲット（男/女/どちらでも可）の取得
 */
const fetchTargets = () => {
  return axios.$get('targets')
}

/**
 * 投稿
 */
const post = (payload) => {
  return axios.$post('post', payload)
}

/* eslint-disable */

export default ({}, inject) => {
  inject('fetchTl', fetchTl)
  inject('fetchDetail', fetchDetail)
  inject('fetchPrefectures', fetchPrefectures)
  inject('fetchBudgets', fetchBudgets)
  inject('fetchTargets', fetchTargets)
  inject('post', post)
}

/* eslint-enable */
