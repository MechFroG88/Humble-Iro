<template>
  <div id="_addStudents">
    <layout>
      <el-steps :active="active" finish-status="success" align-center>
        <el-step title="学生基本资料"></el-step>
        <el-step title="监护人资料"></el-step>
        <el-step title="家庭资料"></el-step>
        <el-step title="经济资料"></el-step>
      </el-steps>

      <!-- <router-view :name="$route.name"></router-view> -->
      <basic v-if="$route.name === 'basic'"></basic>
      <parent v-if="$route.name === 'parent'"></parent>

      <div class="btn-group">
        <el-button-group>
          <el-button type="primary" class="btnn" size="small" @click="prevStep">
            <i class="el-icon-arrow-left"></i> previous
          </el-button>
          <el-button type="primary" class="btnn" size="small" @click="nextStep">
            next <i class="el-icon-arrow-right"></i>
          </el-button>
        </el-button-group>
      </div>

    </layout>
  </div>
</template>

<script>
import layout from '@/layout/default'
import basic  from '@/pages/createStudent/studentform'
import parent from '@/pages/createStudent/parent'
export default {
  components: {
    layout,
    basic,
    parent
  },
  data() {
    return {
      active: 0,
      id    : 0,
      paths : [
        'basic', 'parent', 'family', 'finance'
      ]
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
      this.$router.push({ path: `/addStudent/${params}` })
      this.active = this.paths.indexOf(this.$route.name);
    },
    nextStep() {
      if (this.id == 3) {
        this.id = 3;
        //finish upload
      } else {
        this.id++;
      }
      const params = this.paths[this.id];
      this.$router.push({ path: `/addStudent/${params}` })
      this.active = this.paths.indexOf(this.$route.name);
    },
  }
}
</script>

<style>

</style>

