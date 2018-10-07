import Cookies from 'js-cookie'
import { request } from 'request'
const TOKEN_NAME = "token"

export function setToken(token){
  Cookies.set(TOKEN_NAME, token, { expires: 30 })
}

export function getToken(){
  return Cookies.get(TOKEN_NAME)
}

export function deleteToken(){
  Cookies.remove(TOKEN_NAME)
}

export function loginWithUsername(username, password){
  return request({
    url : '/login',
    method: 'POST',
    data: {
      username,
      password
    }
  })
}