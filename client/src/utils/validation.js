const errorBagConfig = {
  aria: true,
  classNames: {},
  classes: false,
  delay: 0,
  dictionary: null,
  errorBagName: 'errors', // change if property conflicts
  events: 'input|blur',
  fieldsBagName: 'v-fields',
  i18n: null, // the vue-i18n plugin instance
  i18nRootKey: 'validations', // the nested key under which the validation messages will be located
  inject: true,
  locale: 'en',
  validity: false
};

const errorMessages = {
  custom: {
    cn_name: {
      required: '请填上中文姓名'
    },
    en_name: {
      required: '请填上英文姓名'
    },
    number: {
      required: '请填上学号',
      numeric: '学号只能含有数字',
      length: '学号格式错误（XXXXXX）'
    },
    class: {
      required: '请填上班级'
    },
    icNumber: {
      required: '请填上身份证号码',
      regex: () => '身份证格式错误（XXXXXX-XX-XXXX）'
    },
    phonenum: {
      required: '请填上联络号码',
      regex: () => '联络号码格式错误'
    },
    ancestral: {
      required: '请填上祖籍'
    },
    birthdate: {
      required: '请填上出生日期'
    },
    attitude: {
      required: '请填上操行分数',
      numeric: '操行分数必须为整数',
      between: '分数只能介于0与100之间'
    },
    averageScore: {
      required: '请填上总平均',
      between: '分数只能介于0与100之间',
      decimal: '总平均准确至3位小数'
    },
    address: {
      required: '请填上住址'
    },
    relationship: {
      required: '请选择关系'
    },
    age: {
      required: '请填上年龄',
      numeric: '年龄必须是整数'
    },
    boss_contact: {
      regex: () => '联络号码格式错误'
    },
    single_reason: {
      required: '请填上单亲原因'
    },
    disabled_relation: {
      required: '请填上与残障家人的关系'
    },
    family_size: {
      required: '请填上家庭人数',
      numeric: '家庭人数必须是整数'
    },
    working_people: {
      required: '请填上就业人数',
      numeric: '人数必须是整数'
    },
    primary_people: {
      required: '请填上就读小学人数',
      numeric: '人数必须是整数'
    },
    smk_people: {
      required: '请填上就读国中人数',
      numeric: '人数必须是整数'
    },
    smp_people: {
      required: '请填上就读独中/私立学校人数',
      numeric: '人数必须是整数'
    },
    uni_people: {
      required: '请填上就读学院/大专人数',
      numeric: '人数必须是整数'
    },
    financial_aid: {
      required: '请选择助学金种类'
    },
    aid_total: {
      required: '请填上助学金数额',
      decimal: '数额准确至2位小数'
    }
  }
};

module.exports = { errorBagConfig, errorMessages };