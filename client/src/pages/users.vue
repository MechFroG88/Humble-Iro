<template>
  <div id="_users">
    <layout>
      <crudTable
      title="用户列表"
      :columns="usersColumns"
      :tableData="usersData"></crudTable>
    </layout>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import { usersColumns } from '../../api/tableColumns'

import {usersData} from '../../api/mock/tableData'
export default {
  components: {
    crudTable,
    layout
  },
  data() {
    return {
      usersColumns,
      usersData
    }
  }
}
</script>

<style>

</style>
