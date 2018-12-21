import Vue from 'vue'
import { getToken } from '@/utils/auth'
import Router from 'vue-router'

Vue.use(Router)

const router = new Router({
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
      path: '/changePassword',
      name: 'changePassword',
      component: () => import('@/pages/changePassword')
    },
    {
      path: '/student',
      name: 'student',
      component: () => import('@/pages/student'),
    },
    {
      path: '/addStudent/:id/',
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
        }
      ]
    },
    {
      path: '/financial_aid',
      name: 'financial_aid',
      component: () => import('@/pages/financial_aid')
    },
    {
      path: '/list/:id',
      name: 'list',
      component: () => import('@/pages/list')
    },
    {
      path: '/users',
      name: 'users',
      component: () => import('@/pages/users')
    },
    {
      path: '/validate/:id',
      name: 'validate',
      component: () => import('@/pages/validation')
    }
  ]
})

router.beforeEach((to, from, next) => {
  if(getToken() && to.path == "/login"){
    return next({
      path: '/student'
    });
  }
  if(!getToken() && to.path != '/login'){
    return next({
      path: '/login'
    });
  }
  return next();
})

export default router;