// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import App from './App';
import router from './router';
import ElementUI from 'element-ui';
import VeeValidate, { Validator } from 'vee-validate';
import { errorBagConfig, errorMessages } from './utils/validation';
import { getToken } from '@/utils/auth';
import './assets/scss/icons/style.css';
import './assets/scss/style.scss';
import './assets/element-ui.scss';

Vue.config.productionTip = false

Vue.use(ElementUI)
Vue.use(VeeValidate, errorBagConfig);

Validator.localize('en', errorMessages);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})

window.token = getToken()
