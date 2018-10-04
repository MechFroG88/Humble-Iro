<template>
  <div id="_student">
    <layout>
      <el-button class="btnn addStudent" size="mini" type="primary">
        <router-link to="/addStudent">
          <i class="icon icon-plus"></i> 添加学生
        </router-link>
      </el-button>
      <crudTable
      title="学生列表"
      :columns="studentColumns"
      :tableData="studentData">
      </crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import { studentColumns } from '../../api/tableColumns'

import { studentData } from '../../api/mock/tableData'
export default {
  components: {
    crudTable,
    layout
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
