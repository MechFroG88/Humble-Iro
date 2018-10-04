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
            @click="openEdit()">编辑</el-button>
          <el-button
            size="mini"
            type="danger"
            @click="openDelete()">删除</el-button>
        </template>
      </el-table-column>
    </el-table>
    
    <!-- <edit-modal
    title="编辑学生" ref="edit">
      <div slot="content">

      </div>
    </edit-modal> -->

    <delete-modal 
    :confirm="handleDelete" ref="del">
    </delete-modal>
  </div>
</template>

<script>
import deleteModal from '@/components/modal/confirmation'
import editModal   from '@/components/modal/modal'
export default {
  components: {
    deleteModal,
    editModal
  },
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
    openDelete() {
      this.$refs.del.active = true;
    },
    openEdit() {
      this.$router.push({ path: 'addStudent'});
    },
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      // delete object
      console.log("delete")
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
  mounted() {
    console.log(this)
  }
}
</script>

<style>

</style>
