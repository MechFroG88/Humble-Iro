// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import ElementUI from 'element-ui';
import VeeValidate from 'vee-validate';
import { getToken } from '@/utils/auth'
import './assets/scss/icons/style.css'
import './assets/scss/style.scss'
import './assets/element-ui.scss'

Vue.config.productionTip = false

Vue.use(ElementUI)

const config = {
  aria: true,
  classNames: {},
  classes: false,
  delay: 0,
  dictionary: null,
  errorBagName: 'errors', // change if property conflicts
  events: 'input|blur',
  fieldsBagName: 'v-fields',
  i18n: null, // the vue-i18n plugin instance
  i18nRootKey: 'validations', // the nested key under which the validation messages will be located
  inject: true,
  locale: 'en',
  validity: false
};

Vue.use(VeeValidate, config);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})

window.token = getToken()
