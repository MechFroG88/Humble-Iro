import { getToken, deleteToken } from '@/utils/auth';
import router from '@/router'
import store from '@/store'
import app   from '../main'
import axios from 'axios'
import qs    from 'qs'

const service = axios.create({
  //local url: http://118.101.72.11:8080/
  //production url: https://chkl-co-curriculum.ml/api/
  baseURL: process.env.NODE_ENV === 'production' ? "/api/" : "http://118.101.72.11:8080/",
  withCredentials: true,
  transformRequest: [function (data, headers) {
    if(headers['Content-Type'] == "multipart/form-data"){
      return data;
    }
    return qs.stringify(data);
  }],
})

service.interceptors.request.use(function (config) {
  app.$Progress.start();
  config.headers['Authorization'] = getToken()
  return config
}, function (error) {
  return Promise.reject(error)
})

service.interceptors.response.use(function (response) {
  app.$Progress.finish();
  return response;
}, function (error) {
  app.$Progress.fail()
  if(error.response.status == 401 && window.location.pathname != '/'){
    store.dispatch('userLogout').then(() => {
      router.push('/login')
    })
  }
  return Promise.reject(error);
});

export default service