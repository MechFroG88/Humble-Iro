import request from '@/api/request'

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

export function getUser(){
  return request({
    url   : '/user',
    method: 'GET'
  })
}