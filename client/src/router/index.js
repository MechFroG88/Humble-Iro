import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes: [
    {
      path: '/',
      redirect: {'name': 'login'},
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('@/pages/login')
    },
    {
      path: '/student',
      name: 'student',
      component: () => import('@/pages/student')
    },
    {
      path: '/aid',
      name: 'aid',
      component: () => import('@/pages/aid')
    },
    {
      path: '/list',
      name: 'list',
      component: () => import('@/pages/list')
    },
    {
      path: '/users',
      name: 'users',
      component: () => import('@/pages/users')
    }
  ]
})
