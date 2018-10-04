<template>
  <div id="_list">
    <layout>
      <crudTable
      title="助学金种类列表"
      :columns="listColumns"
      :tableData="listData"
      :modal="true"
      modalTitle="编辑助学金"
      :modalData="listModal">
      </crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import { listModal } from '../../api/modalData'
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
      listData,
      listModal
    }
  }
}
</script>

<style>

</style>
