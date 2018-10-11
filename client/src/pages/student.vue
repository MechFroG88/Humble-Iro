<template>
  <div id="_student">
    <layout>
      <div class="action-bar">
        <el-button type="primary" @click="$router.push('/addStudent')">
          <i class="icon icon-plus"></i> 添加学生
        </el-button>
      </div>
      <crudTable
      title="学生列表"
      :columns="studentColumns"
      :tableData="studentData"
      :check="true">
      </crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import { getStudentBasic } from '@/api/tableData'
import { studentColumns } from '../../api/tableColumns'

import { studentData } from '../../api/mock/tableData'
export default {
  components: {
    crudTable,
    layout
  },
  mounted() {
    // getStudentBasic().then(({data}) => {
    //   this.studentData = data.data;
    // })
  },
  data() {
    return {
      studentColumns, 
      studentData
    }
  }
}
</script>

<style>

</style>
