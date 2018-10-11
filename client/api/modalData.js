export let financialAidModal = [
  { name: '赞助者'    , placeholder: '请输入赞助单位名称...'    , type: 'text'  ,data: 'supplier'      },
  { name: '助学金种类' , placeholder: '请输入所提供助学金名称...' , type: 'text' , data: 'financial_aid_type'},
  { name: '申请条件'  , placeholder: '请输入申请条件...'        , type: 'text'  , data: 'requirements' },
  { name: '截止日期'  , placeholder: '请输入赞助截止日期...'     , type: 'date' ,data: 'expired_date'   }
]

export let aidModal = [
  { name: '赞助者'    , placeholder: '请输入赞助单位名称...'    , type: 'text'  ,data: 'supplier' },
  { name: '助学金种类' , placeholder: '请输入所提供助学金名称...' , type: 'text' , data: 'aid_type'},
  { name: '截止日期'  , placeholder: '请输入赞助截止日期...'     , type: 'date' ,data: 'expired_date'}
];

export let listModal = [
  { name: '助学金种类' , placeholder: '请输入所提供助学金名称...', type: 'text', data: 'aid_type' },
  { name: '申请条件' , placeholder: '请输入所需的申请条件...', type: 'text'    , data: 'requirements'},
];

export let usersModal = [
  { name: '用户名'  , placeholder: '请输入用户名...'   , type: 'text'    , data: 'username'},
  { name: '中文姓名' , placeholder: '请输入用户中文姓名...', type: 'text' , data: 'cn_name'}
];