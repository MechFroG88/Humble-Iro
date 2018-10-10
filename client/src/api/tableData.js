import request from '@/api/request'

export function getStudentBasic() {
  return request({
    url: '/student/basic',
    method: 'GET'
  })
}

export function getAid() {
  return request({
    url: '/financial_aid',
    method: 'GET'
  })
}