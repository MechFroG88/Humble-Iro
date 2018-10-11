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

export function addAid({supplier, aid_type, expired_date}) {
  return request({
    url: '/financial_aid',
    method: 'POST',
    data: {
      supplier,
      aid_type,
      expired_date
    }
  })
}