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

export function getParent(sid) {
  return request({
    url: '/parent/' + sid,
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

export function getIncome(sid) {
  return request({
    url: '/finance_income/' + sid,
    method: 'GET'
  })
}

export function createIncome(sid) {
  return request({
    url: '/finance_income/' + sid,
    method: 'POST'
  })
}

export function editIncome(data, sid) {
  return request({
    url: '/finance_income/edit/' + sid,
    method: 'POST',
    data
  })
}

export function deleteIncome(fid) {
  return request({
    url: '/finance_income/delete/' + fid,
    method: 'POST'
  })
}

export function getExpenditure(sid) {
  return request({
    url: '/finance_expenditure/' + sid,
    method: 'GET'
  })
}

export function createExpenditure(sid) {
  return request({
    url: '/finance_expenditure/' + sid,
    method: 'POST'
  })
}

export function editExpenditure(data, sid) {
  return request({
    url: '/finance_expenditure/edit/' + sid,
    method: 'POST',
    data
  })
}

export function deleteExpenditure(fid) {
  return request({
    url: '/finance_expenditure/delete/' + fid,
    method: 'POST'    
  })
}

export function getFinance(sid) {
  return request({
    url: '/finance/' + sid,
    method: 'GET'
  })
}

export function editFinance(data, sid) {
  return request({
    url: '/finance/edit/' + sid,
    method: 'POST',
    data
  })
}

export function getHouse(sid) {
  return request({
    url: '/house/' + sid,
    method: 'GET'
  })
}

export function createHouse(sid) {
  return request({
    url: '/house/' + sid,
    method: 'POST'
  })
}

export function editHouse(data, sid) {
  return request({
    url: '/house/edit/' + sid,
    method: 'POST',
    data
  })
}

export function deleteHouse(hid) {
  return request({
    url: '/house/delete/' + hid,
    method: 'POST'
  })
}

export function getAircond(sid) {
  return request({
    url: '/aircond/' + sid,
    method: 'GET'
  })
}

export function editAircond(data, sid) {
  return request({
    url: '/aircond/edit/' + sid,
    method: 'POST',
    data
  })
}

export function getTransport(sid) {
  return request({
    url: '/transport/' + sid,
    method: 'GET'
  })
}

export function createTransport(sid) {
  return request({
    url: '/transport/' + sid,
    method: 'POST'
  })
}

export function editTransport(data, sid) {
  return request({
    url: '/transport/edit/' + sid,
    method: 'POST',
    data
  })
}

export function deleteTransport(tid) {
  return request({
    url: '/transport/delete/' + tid,
    method: 'POST'
  })
}

export function studentLinkage(data) {
  return request({
    url: '/student_financial',
    method: 'POST',
    data
  })
}

export function verifyStudent(data) {
  return request({
    url: '/student_financial/verify',
    method: 'POST',
    data
  })
}

export function deleteVerification(data) {
  return request({
    url: '/student_financial/delete',
    method: 'POST',
    data
  })
}