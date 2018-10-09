import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode: 'history',
  linkExactActiveClass: 'active',
  linkActiveClass: 'active',
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 };
  },
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
      component: () => import('@/pages/student'),
    },
    {
      path: '/addStudent/',
      component: () => import('@/pages/addStudent'),
      children:[
        {
          path: '',
          redirect: { 'path':'basic' },
        },
        {
          path: 'basic',
          name: 'basic',
          component: () => import('@/pages/createStudent/basic'),
        },
        {
          path: 'parent',
          name: 'parent',
          component: () => import('@/pages/createStudent/parent')
        },
        {
          path: 'family',
          name: 'family',
          component: () => import('@/pages/createStudent/family')
        },
        {
          path: 'finance',
          name: 'finance',
          component: () => import('@/pages/createStudent/finance')
        },
        {
          path: 'finish',
          name: 'finish',
          component: () => import('@/pages/createStudent/finish')
        }
      ]
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
