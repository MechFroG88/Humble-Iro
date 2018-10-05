<template>
  <div id="_crudTable">
    <el-row class="title-container" type="flex">
      <h3 class="title">{{title}}</h3> 
    </el-row>
    <el-table
      stripe
      :data="tableData">
      <el-table-column 
      v-for="(column, index) in columns" 
      :fixed="index == 0 ? true : false"
      min-width="160"
      :key="column.field"
      :prop="column.field"
      :label="column.label">
      </el-table-column>
      <el-table-column label="操作" min-width="120">
        <template slot-scope="scope">
          <el-button
          class="mr-2"
          size="mini"
          @click="openEdit()">编辑</el-button>

          <el-button
          size="mini"
          type="danger"
          @click="openDelete()">删除</el-button>
        </template>
      </el-table-column>
    </el-table>

    <edit-modal ref="edit" :title="modalTitle">
      <div slot="content">
        <div class="form-group" v-for="stuffs in modalData" :key="stuffs.name">
          <label class="form-label">{{stuffs.name}}</label>
          <input 
          class="form-input" 
          :type="stuffs.type" 
          :placeholder="stuffs.placeholder">
        </div>
      </div>
      <div slot="footer">
        <button class="btn btn-primary btn-error btn-lg" @click="$refs.edit.active = false">取消</button>
        <button class="btn btn-primary btn-lg" @click="confirmClick()">确认</button>
      </div>
    </edit-modal>

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
    modal: Boolean,
    modalTitle: String,
    modalData: Array
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
      if (this.modal == true) {
        this.$refs.edit.active = true;
      } else {
        this.$router.push({ path: 'addStudent'});
      }
    },
    handleDelete(index, row) {
      console.log("delete")
      //DELETE
    },
    confirmClick() {
      this.$refs.edit.active  = false;
      this.$refs.edit.loading = false;
      this.$refs.edit.error   = false;
      this.$emit('close');
      console.log("post")
      //POST
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
