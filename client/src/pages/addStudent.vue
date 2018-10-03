<template>
  <div id="_addStudents">
    <layout>
      <el-steps :active="active" finish-status="success" align-center>
        <el-step title="学生基本资料"></el-step>
        <el-step title="父母资料"></el-step>
        <el-step title="家庭资料"></el-step>
        <el-step title="经济资料"></el-step>
      </el-steps>

      <el-button type="primary" plain calss="button" @click="nextStep">确认</el-button>
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
    nextStep() {
      this.active++;
    }
  }
}
</script>

<style>

</style>
