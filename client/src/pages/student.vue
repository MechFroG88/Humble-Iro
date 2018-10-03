<template>
  <div id="_student">
    <layout>
      <crudTable
      title="学生列表"
      :columns="studentColumns"
      :tableData="studentData">
      </crudTable>
    </layout>
  </div>
</template>

<script>
import crudTable from '@/components/tables'
import layout    from '@/layout/default'
import { studentColumns } from '../../api/tableColumns'
export default {
  components: {
    crudTable,
    layout
  },
  data() {
    return {
      studentColumns, 
      studentData : [
        {
          cn_name: "陈某某",
          class  : "搞搞丽丽",
          aid_type: "吃到你爽",
        },
        {
          cn_name: "杀了我",
          class  : "没死就好",
          aid_type: "早日死掉",
        }
      ]
    }
  }
}
</script>

<style>

</style>
