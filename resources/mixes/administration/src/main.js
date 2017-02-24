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
      text: '多说评论',
      icon: 'fa fa-comment',
      uri: '/duoshuo'
    })
  }
}
