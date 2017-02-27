import Baidu from './components/Baidu'
export default {
  router: function (router) {
    router.bases.push({
      path: 'search',
      component: Baidu,
      beforeEnter: router.auth
    })
  },
  sidebar: function (sidebar) {
    sidebar.push({
      text: '百度搜索',
      icon: 'fa fa-comment',
      uri: '/search'
    })
  }
}
