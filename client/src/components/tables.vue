<template>
  <div id="_crudTable">
    <el-row class="title" type="flex">
      <h3>{{title}}</h3> 
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
            size="mini"
            @click="openEdit()">编辑</el-button>
          <el-button
            size="mini"
            type="danger"
            @click="openDelete()">删除</el-button>
        </template>
      </el-table-column>
    </el-table>
    
    <!-- <edit-modal ref="edit">
      <div slot="content">
      </div>
    </edit-modal> -->

    <div class="modal" ref="edit" id="editGroup" :class="{'active': active }">
      <a @click="closeClick" class="modal-overlay" aria-label="Close"></a>
      <div class="modal-container loading-lg" :class="{ 'loading' : loading }">
        <div class="modal-header">
          <a @click="closeClick" class="btn btn-clear float-right" aria-label="Close"></a>
          <div class="modal-title h5">{{modalTitle}}</div>
        </div>
        <div class="modal-body">
          <div class="toast toast-error" v-if="error">
            {{ errorMessage }}
          </div>
          <div class="content">
            <div class="form-group" v-for="i in inputs" :key="i.name">
              <label class="form-label" :for="i.name">{{i.name}}</label>
              <input class="form-input" :type="type" :id="i.name" :placeholder="i.placeholder">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>

    <delete-modal 
    :confirm="handleDelete" ref="del">
    </delete-modal>
  </div>
</template>

<script>
import deleteModal from '@/components/modal/confirmation'
export default {
  mounted() {
    console.log(this)
  },
  components: {
    deleteModal
  },
  props: {
    title: String,
    columns: Array,
    tableData: Array,
    modal: Boolean,
    inputs: Array,
    modalTitle: String,
  },
  data() {
    return{
      search: {
        columns: [],
        message: "",
      },
      loading: true,
      originalData: [],
      displayData : [],
      // modal data
      active : false,
      loading: false,
      error  : false,
      errorMessage: "发生错误，请检查表单。"
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
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      // delete object
      console.log("delete")
    },
    closeClick() {
      this.active  = false
      this.loading = false
      this.error   = false
      this.$emit('close')
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
