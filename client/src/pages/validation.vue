<template>
  <div id="_validate">
    <layout>
      <h3>学生基本资料</h3>
      <table class="basic table">
        <tbody>
          <tr class="cn_name col-12">
            <td class="col-3">中文姓名：</td>
            <td class="col-9">{{basic.cn_name}}</td>
          </tr>
          <tr class="en_name col-12">
            <td class="col-3">英文名字：</td>
            <td class="col-9">{{basic.en_name}}</td>
          </tr>
          <tr class="number col-12">
            <td class="col-3">学号：</td>
            <td class="col-9">{{basic.number}}</td>
          </tr>
          <tr class="classroom col-12">
            <td class="col-3">班级：</td>
            <td class="col-9">{{basic.classroom}}</td>
          </tr>
          <tr class="gender col-12">
            <td class="col-3">性别：</td>
            <td class="col-9">{{basic.gender == 1 ? '女生' : '男生'}}</td>
          </tr>
          <tr class="ic col-12">
            <td class="col-3">身份证：</td>
            <td class="col-9">{{basic.ic}}</td>
          </tr>
          <tr class="contact col-12">
            <td class="col-3">联络号码：</td>
            <td class="col-9">{{basic.contact}}</td>
          </tr>
          <tr class="ancestor col-12">
            <td class="col-3">祖籍：</td>
            <td class="col-9">{{basic.ancestor}}</td>
          </tr>
          <tr class="birthdate col-12">
            <td class="col-3">出生日期：</td>
            <td class="col-9">
              {{basic.birthdate}}
            </td>
          </tr>
          <tr class="attitude col-12">
            <td class="col-3">操行分：</td>
            <td class="col-9">{{basic.attitude}}</td>
          </tr>
          <tr class="score col-12">
            <td class="col-3">全年总平均：</td>
            <td class="col-9">{{basic.score}}</td>
          </tr>
          <tr class="address col-12">
            <td class="col-3">地址：</td>
            <td class="col-9">{{basic.address}}</td>
          </tr>
        </tbody>
      </table>

      <h3>监护人资料</h3>
      <table class="parent table">
        <tbody v-for="(p, index) in parent.length" :key="p.parent_id">
          <tr class="title col-12">
            <td class="col-12">
              <h5>监护人{{p}}</h5>
            </td>
          </tr>
          <tr class="cn_name col-12">
            <td class="col-3">中文姓名：</td>
            <td class="col-9">{{parent[index].cn_name}}</td>
          </tr>
          <tr class="en_name col-12">
            <td class="col-3">英文姓名：</td>
            <td class="col-9">{{parent[index].en_name}}</td>
          </tr>
          <tr class="cn_name col-12">
            <td class="col-3">关系：</td>
            <td class="col-9">
              {{parent[index].relation == 0 ? '父亲' :
                parent[index].relation == 1 ? '母亲' : '监护人'}}
            </td>
          </tr>
          <tr class="contact col-12">
            <td class="col-3">联络号码：</td>
            <td class="col-9">{{parent[index].contact}}</td>
          </tr>
          <tr class="ic col-12">
            <td class="col-3">身份证号码：</td>
            <td class="col-9">{{parent[index].ic}}</td>
          </tr>
          <tr class="age col-12">
            <td class="col-3">年龄：</td>
            <td class="col-9">{{parent[index].age}}</td>
          </tr>
          <tr class="occupation col-12">
            <td class="col-3">职业：</td>
            <td class="col-9">{{parent[index].occupation}}</td>
          </tr>
          <tr class="work_place col-12">
            <td class="col-3">雇主/公司/工作单位名称：</td>
            <td class="col-9">{{parent[index].work_place}}</td>
          </tr>
          <tr class="boss_contact col-12">
            <td class="col-3">雇主联络号码：</td>
            <td class="col-9">{{parent[index].boss_contact}}</td>
          </tr>
          <tr class="work_address col-12">
            <td class="col-3">工作地址：</td>
            <td class="col-9">{{parent[index].work_address}}</td>
          </tr>
        </tbody>
      </table>

      <h3>家庭资料</h3>
      <table class="family table">
        <tbody>
          <tr class="single_parent col-12">
            <td class="col-3">单亲家庭：</td>
            <td class="col-9">
              {{family.single_parent == 0 ? '否' : '是 ─── '+ family.single_reason}}
            </td>
          </tr>
          <tr class="disabled col-12">
            <td class="col-3">残障家人：</td>
            <td class="col-9">
              {{family.disabled == 0 ? '无' : '有 ─── ' + family.disabled_relation}}
            </td>
          </tr>
          <tr class="family_size col-12">
            <td class="col-3">家庭人数：</td>
            <td class="col-9">{{family.family_size}}</td>
          </tr>
          <tr class="working_people col-12">
            <td class="col-3">就业人数：</td>
            <td class="col-9">{{family.working_people}}</td>
          </tr>
          <tr class="primary_people col-12">
            <td class="col-3">就读小学人数：</td>
            <td class="col-9">{{family.primary_people}}</td>
          </tr>
          <tr class="smk_people col-12">
            <td class="col-3">就读国中人数：</td>
            <td class="col-9">{{family.smk_people}}</td>
          </tr>
          <tr class="smp_people col-12">
            <td class="col-3">就读独中/私立学校人数：</td>
            <td class="col-9">{{family.smp_people}}</td>
          </tr>
          <tr class="uni_people col-12">
            <td class="col-3">就读学院/大专人数：</td>
            <td class="col-9">{{family.uni_people}}</td>
          </tr>
        </tbody>
      </table>

      <h3>兄弟姐妹资料</h3>
      <table class="siblings table">
        <tbody v-for="(s, index) in siblings.length" :key="s.sibling_id">
          <tr class="title col-12">
            <td class="col-12">
              <h5>{{s}}.</h5>
            </td>
          </tr>
          <tr class="cn_name col-12">
            <td class="col-3">中文姓名：</td>
            <td class="col-9">{{siblings[index].cn_name}}</td>
          </tr>
          <tr class="age col-12">
            <td class="col-3">年龄：</td>
            <td class="col-9">{{siblings[index].age}}</td>
          </tr>
          <tr class="age col-12">
            <td class="col-3">关系：</td>
            <td class="col-9">
              {{siblings[index].relation == 0 ? '哥哥' : 
                siblings[index].relation == 1 ? '弟弟' :
                siblings[index].relation == 2 ? '姐姐' : '妹妹'}}
            </td>
          </tr>
          <tr class="got_aid col-12">
            <td class="col-3">是否申请助学金：</td>
            <td class="col-9">
              {{siblings[index].got_aid == 0 ? '否' : '是'}}
            </td>
          </tr>
          <tr class="age col-12" v-if="siblings[index].got_aid == 1">
            <td class="col-3">助学金名称：</td>
            <td class="col-9">
              {{aidArr[index].join(' ')}}
            </td>
          </tr>
          <tr class="aid_total col-12" v-if="siblings[index].got_aid == 1">
            <td class="col-3">助学金数额 (以年份计算)：</td>
            <td class="col-9">{{siblings[index].aid_total}}</td>
          </tr>
        </tbody>
      </table>

      <h3>其他资料</h3>
      <table class="others table">
        <tbody>
          <tr class="title col-12">
            <td class="col-12">
              <h5>家庭收入</h5>
            </td>
          </tr>
          <tr class="income col-12" v-for="(inc, index) in income" :key="inc.member">
            <td class="col-3">{{income[index].member}}</td>
            <td class="col-9">{{income[index].income}}</td>
          </tr>
          <tr class="title col-12">
            <td class="col-12">
              <h5>家庭开销</h5>
            </td>
          </tr>
          <tr class="expenditure col-12" v-for="(inc, index) in expenditure" :key="inc.member">
            <td class="col-3">{{expenditure[index].object}}</td>
            <td class="col-9">{{expenditure[index].expenditure}}</td>
          </tr>
        </tbody>
      </table>
    </layout>
  </div>
</template>

<script>
import layout from '@/layout/default'
import { getAidById } from '@/api/financial_aid'
import { 
  getStudent, 
  getParentBasic, getParent,
  getFamily, getSibling,
  getIncome, getExpenditure, getFinance, getHouse, getAircond, getTransport
} from '@/api/student'
export default {
  mounted() {
    getStudent(this.$route.params.id).then(({data}) => {
      this.basic = data.data;
    }).then(() => {
      this.basic.birthdate = this.basic.birthdate.split('-').reverse().join('/');
    })
    getParent(this.$route.params.id).then(({data}) => {
      this.parent = data.data;
    })
    getFamily(this.$route.params.id).then(({data}) => {
      this.family = data.data;
    })
    getSibling(this.$route.params.id).then(({data}) => {
      this.siblings = data.data;
    }).then(() => {
      for (let i = 0; i < this.siblings.length; i++) {
        this.aidArr.push([]);
        if (this.siblings[i].financial_aid_id.length != 0) {
          for (let j = 0; j < this.siblings[i].financial_aid_id.length; j++) {
            getAidById(this.siblings[i].financial_aid_id[j]).then(({data}) => {
              this.aidArr[i].push(data.data.financial_aid_type);
            })
          }
        }
      }
    })
    getIncome(this.$route.params.id).then(({data}) => {
      this.income = data.data;
    })
    getExpenditure(this.$route.params.id).then(({data}) => {
      this.expenditure = data.data;
    })
  },
  data() {
    return {
      aidArr: [],
      basic: {},
      parent: [],
      family: {},
      siblings: [],
      income: [],
      expenditure: [],
    }
  },
  components: {
    layout
  },
}
</script>

<style>

</style>
