<template>
  <div id="_aid">
    <layout>
      <crudTable
      title="助学金申请列表"
      :columns="aidColumns"
      :tableData="aidData"
      :modal="true"
      :inputs="aidModal"
      modalTitle="编辑助学金申请">
      </crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import { aidModal }   from '../../api/modalData'
import { aidColumns } from '../../api/tableColumns'

import { aidData } from '../../api/mock/tableData'
export default {
  components: {
    layout,
    crudTable
  },
  data() {
    return {
      aidColumns,
      aidData
    }
  }
}
</script>

<style>

</style>
