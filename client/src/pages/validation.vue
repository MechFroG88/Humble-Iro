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
            <td class="col-9">{{parent[index].occupation || '─'}}</td>
          </tr>
          <tr class="work_place col-12">
            <td class="col-3">雇主/公司/工作单位名称：</td>
            <td class="col-9">{{parent[index].work_place || '─'}}</td>
          </tr>
          <tr class="boss_contact col-12">
            <td class="col-3">雇主联络号码：</td>
            <td class="col-9">{{parent[index].boss_contact || '─'}}</td>
          </tr>
          <tr class="work_address col-12">
            <td class="col-3">工作地址：</td>
            <td class="col-9">{{parent[index].work_address || '─'}}</td>
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
              {{siblings[index].financial_aid ? siblings[index].financial_aid.join('、') : ""}}
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
            <td class="col-3">{{income[index].member}}：</td>
            <td class="col-9">RM {{income[index].income}}</td>
          </tr>
          <tr class="title col-12">
            <td class="col-12">
              <h5>家庭开销</h5>
            </td>
          </tr>
          <tr class="expenditure col-12" v-for="(inc, index) in expenditure" :key="inc.member">
            <td class="col-3">{{expenditure[index].object}}：</td>
            <td class="col-9">RM {{expenditure[index].expenditure}}</td>
          </tr>
          <tr class="title col-12">
            <td class="col-12">
              <h5>概要</h5>
            </td>
          </tr>
          <tr class="balance col-12">
            <td class="col-3">余额：</td>
            <td class="col-9">RM {{finance.balance}}</td>
          </tr>
          <tr class="auto_transfer col-12">
            <td class="col-3">申请学校自动转账服务：</td>
            <td class="col-9">{{finance.auto_transfer}}</td>
          </tr>
          <tr class="remarks col-12">
            <td class="col-3">备注：</td>
            <td class="col-9">{{finance.remarks}}</td>
          </tr>
        </tbody>
      </table>

      <h3>房屋资料</h3>
      <table class="house table">
        <tbody>
          <tr class="aircond col-12" v-if="aircond[0] && aircond[0].amount">
            <td class="col-3">冷气机数量：</td>
            <td class="col-9">{{aircond[0].amount}}</td>
          </tr>
        </tbody>
        <tbody v-for="(h, index) in house.length" :key="h.house_id">
          <tr class="title col-12">
            <td class="col-12">
              <h5>{{h}}.</h5>
            </td>
          </tr>
          <tr class="house_type col-12">
            <td class="col-3">房屋种类：</td>
            <td class="col-9">{{house[index].house_type}}</td>
          </tr>
          <tr class="house_state col-12">
            <td class="col-3">房子状态：</td>
            <td class="col-9">
              {{house[index].house_state == 0 ? '租赁' :
                house[index].house_state == 1 ? '已供完' : '正供着'}}
            </td>
          </tr>
        </tbody>
      </table>

      <h3>交通工具资料</h3>
      <table class="transport table" v-if="transport">
        <tbody v-for="(t, index) in transport.length" :key="t.transport_id">
          <tr class="title col-12">
            <td class="col-12">
              <h5>{{t}}.</h5>
            </td>
          </tr>
          <tr class="transport_type col-12">
            <td class="col-3">种类：</td>
            <td class="col-9">
              {{transport[index].transport_type == 0 ? '摩托' : '汽车'}}
            </td>
          </tr>
          <tr class="model col-12">
            <td class="col-3">型号：</td>
            <td class="col-9">
              {{transport[index].model}} ({{transport[index].year}})
            </td>
          </tr>
        </tbody>
      </table>

      <div class="button-group">
        <div class="btn btn-primary mb-2 mr-2" @click="$refs.finance.active = true">
          <i class="el-icon-plus"></i> 添加助学金
        </div>
      </div>

      <div class="d-block">
        <el-row class="title-container" type="flex">
          <h3 class="title">助学金资料</h3> 
        </el-row>
        <el-table
          :data="student_aid"
          style="width: 100%">
          <el-table-column
            prop="financial_aid_type"
            label="助学金种类">
          </el-table-column>
          <el-table-column label="状态">
            <template slot-scope="scope">
              <span class="label label-primary"
              v-if="student_aid[scope.$index].status == 1">未审核</span>
              <span class="label label-success"
              v-if="student_aid[scope.$index].status == 2">已批准</span>
            </template>
          </el-table-column>
          <el-table-column label="操作">
            <template slot-scope="scope">
              <el-button
              size="mini"
              type="info"
              plain
              @click="openAid(scope.$index)">查看</el-button>

              <el-button
              size="mini"
              type="info"
              @click="disableAid(scope.$index)">解除助学金</el-button>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </layout>

    <modal title="添加助学金" ref="finance">
      <div slot="content">
        <el-table
        ref="table"
        :data="financial_aid"
        style="width: 100%">
          <el-table-column
            prop="financial_aid_type"
            label="助学金名称">
          </el-table-column>
          <el-table-column label="选择">
            <template slot-scope="scope">
              <el-checkbox 
              v-model="check[scope.$index]" 
              @change="confirm(scope.$index)">
              </el-checkbox>
            </template>
          </el-table-column>
        </el-table>
      </div>
      <div slot="footer">
        <button class="btn btn-primary btn-error btn-lg" @click="closeModal()">取消</button>
        <button class="btn btn-primary btn-lg" @click="confirmClick()">确认</button>
      </div>
    </modal>

    <delete-modal 
    :confirm="handleDelete" ref="del">
    </delete-modal>
  </div>
</template>

<script>
import layout from '@/layout/default'
import crudTable from '@/components/tables'
import modal from '@/components/modal/modal'
import deleteModal from '@/components/modal/confirmation'
import { getAid, getAidById } from '@/api/financial_aid'
import { 
  getStudent, deleteStudent, getStudentBasicById,
  getParentBasic, getParent,
  getFamily, getSibling,
  getIncome, getExpenditure, getFinance, getHouse, getAircond, getTransport,
  studentLinkage, verifyStudent, deleteVerification
} from '@/api/student'
export default {
  mounted() {
    getStudent(this.$route.params.id).then(({data}) => {
      this.basic = data.data;
    }).then(() => {
      this.basic.birthdate = this.basic.birthdate.split('-').reverse().join('/');
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getParent(this.$route.params.id).then(({data}) => {
      this.parent = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getFamily(this.$route.params.id).then(({data}) => {
      this.family = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getSibling(this.$route.params.id).then(({data}) => {
      this.siblings = data.data;
    }).then(() => {
      for (let i = 0; i < this.siblings.length; i++) {
        if (this.siblings[i].financial_aid_id.length != 0) {
          for (let j = 0; j < this.siblings[i].financial_aid_id.length; j++) {
            getAidById(this.siblings[i].financial_aid_id[j]).then(({data}) => {
              this.aidArr.push(data.data.financial_aid_type);
              this.$set(this.siblings[i], 'financial_aid', this.aidArr.slice())
            })
          }
          this.aidArr = [];
        }
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getIncome(this.$route.params.id).then(({data}) => {
      this.income = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getExpenditure(this.$route.params.id).then(({data}) => {
      this.expenditure = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getFinance(this.$route.params.id).then(({data}) => {
      this.finance = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getHouse(this.$route.params.id).then(({data}) => {
      this.house = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getAircond(this.$route.params.id).then(({data}) => {
      this.aircond = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getTransport(this.$route.params.id).then(({data}) => {
      this.transport = data.data;
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getAid().then(({data}) => {
      this.financial_aid = data.data;
      for (let i = 0; i < this.financial_aid.length; i++) {
        this.check.push(false)
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    this.get(); 
  },
  data() {
    return {
      aidArr        : [],
      basic         : {},
      parent        : [],
      family        : {},
      siblings      : [],
      income        : [],
      expenditure   : [],
      finance       : {},
      house         : [],
      aircond       : {},
      transport     : [],
      financial_aid : [],
      student_aid   : [],
      check         : [],
      confirmed     : [],
      disableId     : null
    }
  },
  methods: {
    get() {
      getStudentBasicById(this.$route.params.id).then(({data}) => {
        this.student_aid = data.data.financial_aid;
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    closeModal() {
      this.$refs.finance.active = false;
    },
    confirmClick() {
      if (this.confirmed.length != 0) {
        for (let i = 0; i < this.confirmed.length; i++) {
          studentLinkage({
            student_id: this.$route.params.id,
            financial_aid_id: this.financial_aid[this.confirmed[i]].financial_aid_id
          }).then((data) => {
            this.get();
          })
        }
        for (let i = 0; i < this.check.length; i++) {
          this.$set(this.check, i, false);
        }
        this.$refs.finance.active = false;
      } else {
        this.$message({
          message: '请选择要添加的助学金',
          type: 'error'
        });
      }
    },
    confirm(index) {
      if (this.check[index] == true && this.confirmed.indexOf(index) == -1) {
        this.confirmed.push(index);
      }
      if (this.check[index] == false && this.confirmed.indexOf(index) != -1) {
        this.confirmed.splice(this.confirmed.indexOf(index), 1);
      }
    },
    disableAid(index) {
      this.disableId = index;
      this.$refs.del.active = true;
    },
    handleDelete() {
      deleteVerification({
        student_id: this.$route.params.id,
        financial_aid_id: this.student_aid[this.disableId].financial_aid_id
      }).then(() => {
        this.get();
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    openAid(index) {
      this.$router.push({path: `/list/${this.student_aid[index].financial_aid_id}`})
    }
  },
  components: {
    layout,
    modal,
    crudTable,
    deleteModal
  }
}
</script>