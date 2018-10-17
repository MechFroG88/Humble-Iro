<template>
  <div id="_list">
    <layout>
      <crud-table
      :title="details.financial_aid_type + '申请列表'"
      :columns="listColumns">
      </crud-table>
    </layout>
  </div>
</template>

<script>
import layout from '@/layout/default'
import crudTable from '@/components/tables'
import { listColumns } from '@/api/tableColumns'
import { getAidById } from '@/api/financial_aid'
export default {
  beforeMount() {
    getAidById(this.$route.params.id).then(({data}) => {
      this.details = data.data;
      console.log(data.data)
    })
  },
  components: {
    layout,
    crudTable
  },
  data: () => ({
    details: {},
    listColumns
  })
}
</script>

<style>

</style>
