<template>
  <div id="_list">
    <layout>
      <crudTable
      title="助学金种类列表"
      :columns="listColumns"
      :tableData="listData"></crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import { listColumns } from '../../api/tableColumns'

import { listData } from '../../api/mock/tableData'
export default {
  components: {
    layout,
    crudTable
  },
  data() {
    return {
      listColumns,
      listData
    }
  }
}
</script>

<style>

</style>
