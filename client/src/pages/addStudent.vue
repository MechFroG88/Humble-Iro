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
      <finish v-if="$route.name === 'finish'"></finish>
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
//form pages
import basic  from '@/pages/createStudent/basic'
import parent from '@/pages/createStudent/parent'
import family from '@/pages/createStudent/family'
//finish pages
import finish from '@/pages/createStudent/finish'
export default {
  components: {
    layout,
    basic,
    parent,
    family,
    finish
  },
  data() {
    return {
      active: 0,
      id    : 0,
      paths : [
        'basic', 'parent', 'family', 'finance'
      ],
      output: {
        basic  : {},
        parent : [],
        family : {},
        siblings: {},
        finance: {}
      }
    }
  },
  mounted() {
    this.active = this.paths.indexOf(this.$route.name);
    this.id = this.active;
    if (this.active == -1 || this.id == -1) {
      this.active = 4;
      this.id = 4;
    }
  },
  methods: {
    prevStep() {
      if (this.id == 0) {
        this.id = 0;
      } else {
        this.id--;
      }
      const params = this.paths[this.id];
      this.$router.push({ path: `/addStudent/${params}` });
      this.$nextTick(function () {
        this.active = this.paths.indexOf(this.$route.name);
      })
    },
    nextStep() {
      if (this.id == 3) {
        this.id++;
        this.active = 4;
        const params = "finish";
        this.$router.push({ path: `/addStudent/${params}` });
        return;
        //finish upload
      } else {
        this.id++;
      }
      const params = this.paths[this.id];
      this.$router.push({ path: `/addStudent/${params}` });
      this.$nextTick(function () {
        this.active = this.paths.indexOf(this.$route.name);
      })
    },
    postData() {
      console.log("post");
      /////POST input data/////
      if (this.id == 0) {
        this.output.basic = this.$refs.basic.value;
      } else if (this.id == 1) {
        this.output.parent = this.$refs.parent.output_value;
      } else if (this.id == 2) {
        this.output.family = this.$refs.family.family_value;
        this.output.siblings = this.$refs.family.siblings_array;
      }
      /////POST input data/////

      console.log(this);
      this.nextStep();
    },
    finishStep() {
      console.log("finish");
      this.$router.push({ path: "/student" });
    },
    backStep() {
      this.id = 0;
      const params = this.paths[this.id];
      this.$router.push({ path: `/addStudent/${params}` });
      this.$nextTick(function () {
        this.active = this.paths.indexOf(this.$route.name);
      })
    }
  }
}
</script>

<style>

</style>

