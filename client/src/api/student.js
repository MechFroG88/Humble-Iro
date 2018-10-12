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

export function getParent(pid) {
  return request({
    url: '/parent/' + pid,
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

export function getFamily(sid) {
  return request({
    url: '/family/' + sid,
    method: 'GET'
  })
}
export function editFamily(data, sid) {
  return request({
    url: '/family/edit/' + sid,
    method: 'POST',
    data
  })
}

export function createSibling(sid) {
  return request({
    url: '/sibling/' + sid,
    method: 'POST'
  })
}

export function getSibling(sid) {
  return request({
    url: '/sibling/' + sid,
    method: 'GET'
  })
}

export function getSiblingBasic(sid) {
  return request({
    url: '/sibling/basic/' + sid,
    method: 'GET'
  })
}

export function editSibling(data, sid) {
  return request({
    url: '/sibling/edit/' + sid,
    method: 'POST',
    data
  })
}

export function deleteSibling(siid) {
  return request({
    url: '/sibling/delete/' + siid,
    method: 'POST'
  })
}