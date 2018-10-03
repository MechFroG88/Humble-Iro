<template>
  <div id="_student">
    <layout>
      <crudTable
      title="学生列表"
      :columns="societyColumns"
      :tableData="data"></crudTable>
    </layout>
  </div>
</template>

<script>
import crudTable from '@/components/tables'
import layout    from '@/layout/default'
import {studentColumns} from '../../api/tableColumns'
export default {
  components: {
    crudTable,
    layout
  },
  data() {
    return {
      studentColumns,
      data : [{
        cn_name: "陈某某",
        class  : "搞搞丽丽",
        aid_type: "吃到你爽",
      }]
    }
  }
}
</script>

<style>

</style>
