export let studentColumns = [
  { label: '学生姓名'  , field: 'cn_name', search: true },
  { label: '班级'     , field: 'classroom' },
  { label: '助学金种类', field: 'aid_type'  }
];

export let financialAidColumns = [
  { label: '赞助者'   , field: 'supplier', search: true },
  { label: '助学金种类', field: 'financial_aid_type'     },
  { label: '申请条件'  , field: 'requirements' },
  { label: '截止日期'  , field: 'expired_date' }
];

export let financialListColumns = [
  { label: '助学金种类', field: 'financial_aid_type', search: true },
  { label: '状态'     , field: 'status' }
];

export let usersColumns = [
  { label: '用户名'  , field: 'username', search: true },
  { label: '中文姓名', field: 'cn_name' }
];