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
          @click.native="openEdit(scope.$index)">编辑</el-button>

          <el-button
          size="mini"
          type="danger"
          @click="openDelete(scope.$index)">删除</el-button>
        </template>
      </el-table-column>
    </el-table>

    <edit-modal ref="edit" :title="modalTitle">
      <div slot="content">
        <div class="form-group" v-for="(stuffs, index) in modalData" :key="stuffs.name">
          <label class="form-label">{{stuffs.name}}</label>
          <input 
          class="form-input" 
          :type="stuffs.type" 
          :placeholder="stuffs.placeholder"
          v-model="modalArr[index].value">
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
    modal: {
      type: Boolean,
      default: false
    },
    modalTitle: String,
    modalData: Array
  },
  beforeMount() {
    if (this.modal == true) {
      for (let i = 0; i < this.modalData.length; i++) {
        this.showModalData[this.modalData[i].data] = null;
        this.modalArr.push({
          title: this.modalData[i].data,
          value: null
        });
      }
    }
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
      showModalData: {},
      modalArr: [],
      editIndex: null,
      deleteIndex: null,
    }
  },
  methods: {
    openDelete(index) {
      this.$refs.del.active = true;
      this.deleteIndex = index;
    },
    openEdit(index) {
      if (this.modal == true) {
        this.editIndex = index;
        this.$refs.edit.active = true;
        // this.modalData[index] = this.modalOutput;
      } else {
        this.$router.push({ path: 'addStudent'});
      }
    },
    handleDelete(index) {
      console.log(this.deleteIndex);
      console.log("delete")
      //DELETE
    },
    confirmClick() {
      this.$refs.edit.active  = false;
      this.$refs.edit.loading = false;
      this.$refs.edit.error   = false;
      this.$emit('close');
      console.log("post");
      for (let i = 0; i < this.modalArr.length; i++) {
        this.showModalData[this.modalArr[i].title] = this.modalArr[i].value;
      }
      console.log(this.showModalData);
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
