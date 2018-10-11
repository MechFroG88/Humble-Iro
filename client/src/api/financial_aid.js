import request from '@/api/request'

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

export function deleteAid(id) {
  return request({
    url: ''
  })
}