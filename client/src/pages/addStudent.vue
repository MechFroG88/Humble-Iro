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
      <basic 
      v-if="$route.name === 'basic'" 
      ref="basic" 
      :getData="output.basic"></basic>

      <parent 
      v-if="$route.name === 'parent'" 
      ref="parent" 
      :getData="output.parent"></parent>

      <family 
      v-if="$route.name === 'family'" 
      ref="family" 
      :getFamilyData="output.family" 
      :getSiblingsData="output.siblings"></family>
      
      <finance 
      v-if="$route.name === 'finance'" 
      ref="finance"
      :getIncome="output.finance_income"
      :getExpenditure="output.finance_expenditure"
      :getFinance="output.finance"
      :getHouse="output.house"
      :getAircond="output.aircond"
      :getTransport="output.transport"></finance>

      <finish 
      v-if="$route.name === 'finish'"></finish>
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

      <div class="finish-button" v-if="active == 4">
        <button class="btn btn-primary btn-block" @click="finishStep">
          <i class="icon icon-edit"></i> 完成
        </button>
        <button class="btn btn-primary btn-block" @click="backStep">
          <i class="icon icon-repeat"></i> 修改
        </button>
      </div>

    </layout>
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
//finish pages
import finish from '@/pages/createStudent/finish'
//API
import { 
  editStudentBasic, 
  editParent, 
  editFamily, editSibling,
  editIncome, editExpenditure, editFinance, 
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
        house: {},
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
        this.id++;
        this.active = 4;
        const params = "finish";
        this.$router.push({ path: `/addStudent/${id}/${params}` });
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
      console.log("post");
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
        // axios.all([editFamily(this.output.family, this.student_id), editSibling(this.output.siblings, this.student_id)])
        //   .then(axios.spread(function(family, siblings) {
        //     console.log(family);
        //     console.log(siblings);
        //   }));
      } else if (this.id == 3) {
        ///POST finance///
        this.output.house               = this.$refs.finance.house;
        this.output.finance             = this.$refs.finance.finance;
        this.output.aircond             = this.$refs.finance.aircond;
        this.output.transport           = this.$refs.finance.transportArr;
        this.output.finance_income      = this.$refs.finance.income;
        this.output.finance_expenditure = this.$refs.finance.expenditure;
        console.log({ 
          house: this.output.house,
          finance: this.output.finance,
          aircond: this.output.aircond,
          transport: this.output.transport,
          finance_income: this.output.finance_income,
          finance_expenditure : this.output.finance_expenditure
        });
        editIncome(this.output.finance_income, this.student_id).then(() => {
          editExpenditure(this.output.finance_expenditure, this.student_id).then(() => {
            editFinance(this.output.finance, this.student_id).then(() => {
              
            })
          })
        })
      }
    },
    finishStep() {
      console.log("finish");
      // console.log(this.output);
      this.$router.push({ path: "/student" });
    },
    backStep() {
      this.id = 3;
      const params = this.paths[this.id];
      this.$router.push({ path: `/addStudent/${params}` });
      this.active = this.paths.indexOf(this.$route.name);
    }
  }
}
</script>

<style>

</style>

