<template>
  <div id="_student">
    <layout>
      <div class="action-bar">
        <el-button type="primary" @click="addStudent">
          <i class="icon icon-plus"></i> 添加学生
        </el-button>
      </div>
      <crudTable
      title="学生列表"
      :columns="studentColumns"
      :tableData="studentData"
      :check="true"
      type="student">
      </crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import { getStudentBasic, createStudent } from '@/api/student'
import { studentColumns } from '@/api/tableColumns'
export default {
  components: {
    crudTable,
    layout
  },
  mounted() {
    getStudentBasic().then(({data}) => {
      this.studentData = data.data;
      console.log(data.data)
    })
  },
  data() {
    return {
      studentColumns, 
      studentData: [],
      id: null,
    }
  },
  methods: {
    addStudent() {
      var id;
      createStudent().then(({data}) => {
        id = data.data
      }).then(() => {
        this.$router.push(`/addStudent/${id}/basic`);
      })
    }
  }
}
</script>

<style>

</style>
