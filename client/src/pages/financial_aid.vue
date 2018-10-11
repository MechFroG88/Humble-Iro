<template>
  <div id="_financial_aid">
      <layout>
        <crudTable
        title="助学金列表"
        :columns="financialAidColumns"
        :tableData="financialAidData"
        :modal="true"
        modalTitle="编辑助学金"
        :modalData="financialAidModal"
        type="financial_aid">
        </crudTable>
      </layout>
  </div>
</template>

<script>
import layout from '@/layout/default'
import crudTable from '@/components/tables'
import { financialAidModal }   from '../../api/modalData'
import { financialAidColumns } from '../../api/tableColumns'
import { getAid } from '@/api/financial_aid'

export default {
  beforeMount() {
    getAid().then(({data}) => {
      this.financialAidData = data.data;
    })
  },
  components: {
    layout,
    crudTable
  },
  data: () => ({
    financialAidColumns,
    financialAidModal,
    financialAidData: []
  })
}
</script>

<style>

</style>
