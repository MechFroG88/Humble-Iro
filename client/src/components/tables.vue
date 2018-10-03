<template>
  <div id="_crudTable">
    <el-row class="title" type="flex">
      <h3>{{title}}</h3> 
    </el-row>
    <el-table
      stripe
      :data="tableData">
      <el-table-column 
      v-for="column in columns" 
      :key="column.field"
      :prop="column.field"
      :label="column.label">
      </el-table-column>
      <el-table-column label="操作">
        <template slot-scope="scope">
          <el-button
            size="mini"
            @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
          <el-button
            size="mini"
            type="danger"
            @click="handleDelete(scope.$index, scope.row)">删除</el-button>
        </template>
      </el-table-column>
    </el-table>    
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    columns: Array,
    tableData: Array,
    actions: Object
  },
  data() {
    return{
      search: {
        columns: [],
        message: "",
      },
      loading: true,
      originalData: [],
      displayData : []
    }
  },
  methods: {
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      console.log(index, row);
    }
  },
  watch: {
    tableData(data) {
      this.loading = false
      this.originalData = JSON.parse(JSON.stringify(this.tableData))
      this.displayData  = JSON.parse(JSON.stringify(this.tableData))
      this.search.columns = this.columns.filter((x) => x.search)
      .map(({field}) => field);
    }
  },
}
</script>

<style>

</style>
