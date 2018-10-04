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
          component: () => import('@/pages/createStudent/studentform'),
        },
        {
          path: 'parent',
          name: 'parent',
          component: () => import('@/pages/createStudent/parent')
        },
        {
          path: 'family',
          name: 'family',
        },
        {
          path: 'finance',
          name: 'finance',
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
