<template>
  <div id="_addStudents">
    <layout>
      <el-steps :active="active" finish-status="success" align-center>
        <el-step title="学生基本资料"></el-step>
        <el-step title="监护人资料"></el-step>
        <el-step title="家庭资料"></el-step>
        <el-step title="经济资料"></el-step>
      </el-steps>

      <!-- form stuffs -->
      <basic v-if="$route.name === 'basic'" ref="basic"></basic>

      <parent v-if="$route.name === 'parent'" ref="parent"></parent>

      <family v-if="$route.name === 'family'" ref="family"></family>
      
      <finance v-if="$route.name === 'finance'" ref="finance"></finance>
      <!-- form stuffs -->
      
      <div class="btn-group" v-if="active != 4">
        <el-button-group>
          <el-button type="primary" class="btnn" size="small" @click="prevStep">
            <i class="el-icon-arrow-left"></i> 上一个
          </el-button>
          <el-button type="primary" class="btnn" size="small" @click="postData">
            下一个 <i class="el-icon-arrow-right"></i>
          </el-button>
        </el-button-group>
      </div>
    </layout>

    <el-dialog
      :visible.sync="dialogVisible"
      width="30%">
      <span 
      style="
      font-size: 1.2rem;
      display: flex;
      justify-content: center;">确定完成资料填写？</span>
      <span 
      slot="footer" 
      class="dialog-footer"
      style="
      display: flex;
      justify-content: center;">
        <el-button type="danger" @click="dialogVisible = false">取消</el-button>
        <el-button type="primary" @click="finishStep()">确定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import layout from '@/layout/default'
import axios  from 'axios'
//form pages
import basic   from '@/pages/createStudent/basic'
import parent  from '@/pages/createStudent/parent'
import family  from '@/pages/createStudent/family'
import finance from '@/pages/createStudent/finance'
//API
import { 
  editStudentBasic, 
  editParent, 
  editFamily, editSibling,
  editIncome, editExpenditure, editFinance, editHouse, editAircond, editTransport
} from '@/api/student'
export default {
  components: {
    layout,
    basic,
    parent,
    family,
    finance,
    finish
  },
  data() {
    return {
      dialogVisible: false,
      active: 0,
      id    : 0,
      student_id: null,
      paths : [
        'basic', 'parent', 'family', 'finance'
      ],
      output: {
        basic  : {},
        parent : [],
        family : {},
        siblings: [],
        finance: {},
        finance_income: [],
        finance_expenditure: [],
        aircond: {},
        house: [],
        transport: []
      }
    }
  },
  mounted() {
    this.student_id = this.$route.params.id;
    this.active = this.paths.indexOf(this.$route.name);
    this.id = this.active;
    if (this.active == -1 || this.id == -1) {
      this.active = 4;
      this.id = 4;
    }
  },
  methods: {
    prevStep() {
      const id = this.student_id;
      if (this.id == 0) {
        this.id = 0;
      } else {
        this.id--;
      }
      const params = this.paths[this.id];
      this.$router.push(`/addStudent/${id}/${params}`);
      this.active = this.paths.indexOf(this.$route.name);
    },
    nextStep() {
      const id = this.student_id;
      if (this.id == 3) {
        this.dialogVisible = true;
        return;
        //finish upload
      } else {
        this.id++;
      }
      const params = this.paths[this.id];
      this.$router.push({ path: `/addStudent/${id}/${params}` });
      this.$nextTick(function() {
        this.active = this.paths.indexOf(params);
      });
    },
    postData() {
      /////POST input data/////
      if (this.id == 0) {
        ///POST basic///
        this.output.basic = this.$refs.basic.value;
        editStudentBasic(this.output.basic, this.student_id).then(({data}) => {
          this.nextStep();
        })
      } else if (this.id == 1) {
        ///POST parent///
        this.output.parent = this.$refs.parent.output_value;
        // console.log(this.output.parent)
        editParent(this.output.parent, this.student_id).then((data) => {
          this.nextStep();
        })
      } else if (this.id == 2) {
        ///POST family and siblings///
        this.output.family   = this.$refs.family.family_value;
        this.output.siblings = this.$refs.family.siblings_array;
        editFamily(this.output.family, this.student_id).then(({data}) => {
          editSibling(this.output.siblings, this.student_id).then(({data}) => {
            this.nextStep();
          })
        })
      } else if (this.id == 3) {
        ///POST finance///
        this.output.house               = this.$refs.finance.house;
        this.output.finance             = this.$refs.finance.finance;
        this.output.aircond             = this.$refs.finance.aircond;
        this.output.transport           = this.$refs.finance.transportArr;
        this.output.finance_income      = this.$refs.finance.income;
        this.output.finance_expenditure = this.$refs.finance.expenditure;
        editIncome(this.output.finance_income, this.student_id).then(() => {
          editExpenditure(this.output.finance_expenditure, this.student_id).then(() => {
            editFinance(this.output.finance, this.student_id).then(() => {
              editHouse(this.output.house, this.student_id).then(() => {
                editAircond(this.output.aircond, this.student_id).then(() => {
                  editTransport(this.output.transport, this.student_id).then(() => {
                    this.nextStep();
                  })
                })
              })
            })
          })
        })
      }
    },
    finishStep() {
      this.dialogVisible = false;
      this.$message({
        message: '成功呈交！',
        type: 'success',
        center: true
      });
      this.$router.push({ path: "/student" });
    },
    backStep() {
      this.id = 3;
      this.active = 3;
      const params = this.paths[this.id];
      this.$router.push({ path: `/addStudent/${this.student_id}/${params}` });
    }
  }
}
</script>

<style>

</style>

