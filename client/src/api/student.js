import request from '@/api/request'

export function getStudentBasic() {
  return request({
    url: '/student/basic',
    method: 'GET'
  })
}

export function deleteStudent(id) {
  return request({
    url: '/student/delete/' + id,
    method: 'POST'
  })
}

export function createStudent() {
  return request({
    url: '/student',
    method: 'POST'
  })
}

export function getStudent(id) {
  return request({
    url: '/student/' + id,
    method: 'GET'
  })
}

export function editStudentBasic(data, id) {
  return request({
    url: '/student/edit/' + id,
    method: 'POST',
    data
  })
}

export function getParent(id) {
  return request({
    url: '/parent/' + id,
    method: 'GET'
  })
}

export function getParentBasic(id) {
  return request({
    url: '/parent/basic/' + id,
    method: 'GET'
  })
}

export function createParent(sid) {
  return request({
    url: '/parent/' + sid,
    method: 'POST'
  })
}

export function editParent(data, sid) {
  return request({
    url: '/parent/edit/' + sid,
    method: 'POST',
    data
  })
}

export function deleteParent(pid) {
  return request({
    url: '/parent/delete/' + pid,
    method: 'POST'
  })
}