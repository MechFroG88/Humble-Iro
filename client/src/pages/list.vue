<template>
  <div id="_list">
    <layout>
      <h3>{{details.financial_aid_type}}申请列表</h3>
      <crud-table>
        
      </crud-table>
    </layout>
  </div>
</template>

<script>
import layout from '@/layout/default'
import crudTable from '@/components/tables'
import { getAidById } from '@/api/financial_aid'
export default {
  beforeMount() {
    getAidById(this.$route.params.id).then(({data}) => {
      this.details = data.data;
    })
  },
  components: {
    layout,
    crudTable
  },
  data: () => ({
    details: {}
  })
}
</script>

<style>

</style>
