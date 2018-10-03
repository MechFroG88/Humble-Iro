export let studentColumns = [
  { label: '学生姓名', field: 'cn_name', search: true },
  { label: '班级'   , field: 'class'    },
  { label: '助学金种类', field: 'aid_type' },
  { label: '操作'   , field: 'action'}
]

export let aidColumns = [
  { label: '机构名称'  , field: 'company_name', search: true },
  { label: '助学金种类', field: 'finance_type' },
  { label: '截止日期'  , field: 'expired_date' },
  { label: '操作'     , field: 'action' }
]

export let listColumns = [
  { label: '助学金种类'  , field: 'finance_type', search: true },
  { label: '申请条件', field: 'requirement' },
  { label: '操作'     , field: 'action' }
]