// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import App from './App';
import router from './router';
import ElementUI from 'element-ui';
import VeeValidate, { Validator } from 'vee-validate';
import { getToken } from '@/utils/auth';
import './assets/scss/icons/style.css';
import './assets/scss/style.scss';
import './assets/element-ui.scss';

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

const errorMessages = {
  custom: {
    cn_name: {
      required: '请填上中文姓名'
    },
    en_name: {
      required: '请填上英文姓名'
    },
    number: {
      required: '请填上学号',
      numeric: '学号只能含有数字',
      length: '学号格式错误（XXXXXX）'
    },
    class: {
      required: '请填上班级'
    },
    icNumber: {
      required: '请填上身份证号码',
      regex: () => '身份证格式错误（XXXXXX-XX-XXXX）'
    },
    phonenum: {
      required: '请填上联络号码'
    },
    ancestral: {
      required: '请填上祖籍'
    },
    birthdate: {
      required: '请填上出生日期'
    },
    attitude: {
      required: '请填上操行分数',
      decimal: '操行分数必须为整数',
      between: '分数只能介于0与100之间'
    },
    averageScore: {
      required: '请填上总平均',
      between: '分数只能介于0与100之间',
      decimal: '总平均准确至3位小数'
    },
    address: {
      required: '请填上住址'
    }
  }
}

Vue.use(VeeValidate, config);
Validator.localize('en', errorMessages);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})

window.token = getToken()
