export let studentColumns = [
  { label: '学生姓名', field: 'cn_name', search: true },
  { label: '班级'   , field: 'class'    },
  { label: '助学金种类', field: 'aid_type' }
];

export let aidColumns = [
  { label: '赞助者'  , field: 'supplier', search: true },
  { label: '助学金种类', field: 'finance_type' },
  { label: '截止日期'  , field: 'expired_date' }
];

export let listColumns = [
  { label: '助学金种类'  , field: 'finance_type', search: true },
  { label: '申请条件', field: 'requirement' }
];