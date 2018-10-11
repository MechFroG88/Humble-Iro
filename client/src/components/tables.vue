<template>
  <div id="_crudTable">
    <el-row class="title-container" type="flex">
      <h3 class="title">{{title}}</h3> 
    </el-row>
    <el-table
      stripe
      :data="tableData"
      ref="table">
      <el-table-column 
      v-for="(column, index) in columns" 
      :fixed="index == 0 ? true : false"
      min-width="160"
      :key="column.field"
      :prop="column.field"
      :label="column.label">
      </el-table-column>
      <el-table-column label="操作" min-width="180">
        <template slot-scope="scope">
          <el-button
          class="mr-2"
          size="mini"
          v-if="check == true"
          @click="openCheck">查看</el-button>

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
import { getStudentBasic } from '@/api/student'
import { getUser, editUser, deleteUser } from '@/api/user'
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
    check: {
      type: Boolean,
      default: false
    },
    modalTitle: String,
    modalData: Array,
    type: String
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
    if (this.check == true) {
      getStudentBasic().then(({data}) => {
        this.studentId = data.data.student_id;
      })
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
      studentId: null,
    }
  },
  methods: {
    openCheck() {
      this.$router.push('/check/' + this.studentId);
    },
    openDelete(index) {
      this.$refs.del.active = true;
      this.deleteIndex = index;
    },
    getModalData(index) {
      if (this.type == 'users') {
        getUser().then(({data}) => {
          // this.modalArr = data.data[index];
          for (let i = 0; i < this.modalArr.length; i++) {
            this.modalArr[i].value = data.data[index][this.modalArr[i].title];
          }
        })
      }
    },
    openEdit(index) {
      if (this.modal == true) {
        this.editIndex = index;
        this.getModalData(this.editIndex);
        this.$refs.edit.active = true;
      } else {
        this.$router.push({ path: 'addStudent'});
      }
    },
    handleDelete(index) {
      console.log(this.deleteIndex);
      console.log("delete")
      getUser().then(({data}) => {
        deleteUser(data.data[this.deleteIndex].user_id).then(({data}) => {
          if (data.status == 200) {
            location.reload();
          }
        })
      })
      //DELETE
    },
    confirmClick() {
      for (let i = 0; i < this.modalArr.length; i++) {
        this.showModalData[this.modalArr[i].title] = this.modalArr[i].value;
      }
      //POST
      getUser().then(({data}) => {
        var edited = data.data[this.editIndex];
        editUser(this.showModalData, edited.user_id).then((data) => {
          if (data.status == 200) {
            this.$refs.edit.active  = false;
            this.$refs.edit.loading = false;
            this.$refs.edit.error   = false;
            this.$emit('close');
            location.reload();
          }
        })
        // console.log(this.tableData);
        // this.$forceUpdate();
      }).then(() => {
        this.editIndex = null;
      })

      console.log("hi")
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
