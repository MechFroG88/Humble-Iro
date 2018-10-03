<template>
  <div id="_aid">
    <layout>
      <crudTable
      title="助学金申请列表"
      :columns="aidColumns"
      :tableData="aidData"></crudTable>
    </layout>
  </div>
</template>

<script>
import layout from '@/layout/default'
import crudTable from '@/components/tables'
import { aidColumns } from '../../api/tableColumns'
export default {
  components: {
    layout,
    crudTable
  },
  data() {
    return {
      aidColumns,
      aidData: [
        {
          company_name: "我很想死集团",
          finance_type: "赶紧死掉费用",
          expired_date: "06092069",  
        }
      ]
    }
  }
}
</script>

<style>

</style>
