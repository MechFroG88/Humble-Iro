import request from '@/api/request'

export function getStudentBasic() {
  return request({
    url: '/student/basic',
    method: 'GET'
  })
}