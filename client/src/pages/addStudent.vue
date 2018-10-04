<template>
  <div id="_addStudents">
    <layout>
      <el-steps :active="active" finish-status="success" align-center>
        <el-step title="学生基本资料"></el-step>
        <el-step title="父母资料"></el-step>
        <el-step title="家庭资料"></el-step>
        <el-step title="经济资料"></el-step>
      </el-steps>

      <router-view></router-view>

      <el-button type="primary" class="btnn confirm" size="medium" @click="nextStep">确认</el-button>
    </layout>
  </div>
</template>

<script>
import layout from '@/layout/default'
export default {
  components: {
    layout
  },
  data() {
    return {
      active: 0,
    }
  },
  methods: {
    // prevStep() {
    //   if (this.active == 0) {
    //     this.active = 0;
    //   } else {
    //     this.active--;
    //   }
    // },
    nextStep() {
      if (this.active == 3) {
        this.active = 0;
      } else {
        this.active++;
      }
    }
  }
}
</script>

<style>

</style>

