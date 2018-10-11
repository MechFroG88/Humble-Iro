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

export function addUser({username, password, cn_name}){
  return request({
    url: '/user',
    method: 'POST',
    data: {
      username,
      password,
      cn_name
    }
  })
}
export function editUser({username, cn_name}, id){
  return request ({
    url: '/user/edit/' + id,
    method: 'POST',
    data: {
      username,
      cn_name
    }
  })
}

export function deleteUser(id){
  return request({
    url: '/user/delete/' + id,
    method: 'POST'
  })
}

export function getCurrentUser(){
  return request({
    url: '/user/current',
    method: 'GET'
  })
}