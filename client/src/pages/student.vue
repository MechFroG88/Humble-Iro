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
