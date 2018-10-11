import request from '@/api/request'

export function getAid() {
  return request({
    url: '/financial_aid',
    method: 'GET'
  })
}

export function addAid({supplier, financial_aid_type, requirements, expired_date}) {
  return request({
    url: '/financial_aid',
    method: 'POST',
    data: {
      supplier,
      financial_aid_type,
      requirements,
      expired_date
    }
  })
}

export function deleteAid(id) {
  return request({
    url: '/financial_aid/delete/' + id,
    method: 'POST'
  })
}