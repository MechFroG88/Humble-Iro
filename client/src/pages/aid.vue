<template>
  <div id="_aid">
    <layout>
      <crudTable
      title="助学金申请列表"
      :columns="aidColumns"
      :tableData="aidData"
      :modal="true"
      modalTitle="编辑助学金申请"
      :modalData="aidModal">
      </crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import modal     from '@/components/modal/modal'
import { aidModal } from '../../api/modalData'
import { aidColumns } from '../../api/tableColumns'

import { aidData } from '../../api/mock/tableData'
export default {
  mounted() {
  },
  components: {
    layout,
    crudTable,
    modal
  },
  data() {
    return {
      aidColumns,
      aidData,
      aidModal
    }
  }
}
</script>

<style>

</style>
