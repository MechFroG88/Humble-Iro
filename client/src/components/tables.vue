<template>
  <div id="_crudTable">
    <el-row class="title-container" type="flex">
      <h3 class="title">{{title}}</h3> 
    </el-row>
    <el-table
      stripe
      :data="tableData"
      style="width: 100%;"
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
          size="mini"
          v-if="check == true"
          @click="openCheck(scope.$index)">查看</el-button>

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
        <div v-for="(stuffs, index) in modalData" :key="stuffs.name">
          <div class="form-group">
            <label class="form-label">{{stuffs.name}}</label>
            <input 
            class="form-input" 
            :class="{'is-error': errors.first(stuffs.data) }"
            :type="stuffs.type" 
            :name="stuffs.data"
            :placeholder="stuffs.placeholder"
            v-validate="{
              required: true,
              regex: type == 'users' ? 
              stuffs.data == 'username' ? /[\w]{5,}/ : /\w+/ 
              : /\w+/
            }"
            v-model="modalArr[index].value">
          </div>
          <p
          class="form-input-hint text-error"
          v-if="errors.first(stuffs.data)">{{stuffs.name}}是必须的</p>
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
import { getStudentBasic, deleteStudent, deleteVerification } from '@/api/student'
import { getUser, editUser, deleteUser } from '@/api/user'
import { getAid, editAid, deleteAid } from '@/api/financial_aid'
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
    type: String //student, financial_aid, users, financial_list
  },
  beforeMount() {
    if (this.modal == true) {
      this.resetData();
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
    resetData() {
      for (let i = 0; i < this.modalData.length; i++) {
        this.showModalData[this.modalData[i].data] = null;
        this.modalArr.push({
          title: this.modalData[i].data,
          value: null
        });
      }
    },
    openCheck(index) {
      if (this.type == 'student') {
        getStudentBasic().then(({data}) => {
          const params = data.data[index].student_id;
          this.$router.push(`/validate/${params}`);
        })
      } else if (this.type == 'financial_aid') {
        getAid().then(({data}) => {
          const params = data.data[index].financial_aid_id;
          this.$router.push(`/list/${params}`);
        })

      }
    },
    openEdit(index) {
      if (this.modal == true) {
        this.editIndex = index;
        this.getModalData(this.editIndex);
        this.$refs.edit.active = true;
      } else {
        getStudentBasic().then(({data}) => {
          const params = data.data[index].student_id;
          this.$router.push(`/addStudent/${params}`);
        })
      }
    },
    getModalData(index) {
      if (this.type == 'financial_aid') {
        getAid().then(({data}) => {
          for (let i = 0; i < this.modalArr.length; i++) {
            this.modalArr[i].value = data.data[index][this.modalArr[i].title];
          }
        }).catch((err) => {
          if (err.response.status == 400 || err.response.status == 500) {
            this.$refs.edit.error = true;
          }
        })
      }
      if (this.type == 'users') {
        getUser().then(({data}) => {
          for (let i = 0; i < this.modalArr.length; i++) {
            this.modalArr[i].value = data.data[index][this.modalArr[i].title];
          }
        }).catch((err) => {
          if (err.response.status == 400 || err.response.status == 500) {
            this.$refs.edit.error = true;
          }
        })
      }
    },
    confirmClick() {
      for (let i = 0; i < this.modalArr.length; i++) {
        this.showModalData[this.modalArr[i].title] = this.modalArr[i].value;
      }
      //POST
      if (this.type == 'financial_aid') {
        getAid().then(({data}) => {
          editAid(this.showModalData, data.data[this.editIndex].financial_aid_id).then((data) => {
            if (data.status == 200) {
              this.$refs.edit.active  = false;
              this.$refs.edit.loading = false;
              this.$refs.edit.error   = false;
              this.$emit('close');
              location.reload();
            }
          })
        })
      }
      if (this.type == "users") {
        getUser().then(({data}) => {
          editUser(this.showModalData, data.data[this.editIndex].user_id).then((data) => {
            if (data.status == 200) {
              this.$refs.edit.active  = false;
              this.$refs.edit.loading = false;
              this.$refs.edit.error   = false;
              this.$emit('close');
              location.reload();
            }
          })
        })
      }
    },
    openDelete(index) {
      this.$refs.del.active = true;
      this.deleteIndex = index;
    },
    handleDelete(index) {
      if (this.type == "student") {
        getStudentBasic().then(({data}) => {
          deleteStudent(data.data[this.deleteIndex].student_id).then(({data}) => {
            if (data.status == 200) {
              location.reload();
            }
          })
        })
      }
      if (this.type == "financial_aid") {
        getAid().then(({data}) => {
          deleteAid(data.data[this.deleteIndex].financial_aid_id).then(({data}) => {
            if (data.status == 200) {
              location.reload();
            }
          })
        })
      }
      if (this.type == "users") {
        getUser().then(({data}) => {
          deleteUser(data.data[this.deleteIndex].user_id).then(({data}) => {
            if (data.status == 200) {
              location.reload();
            }
          })
        })
      }
    },
    disableAid(index) {
      deleteVerification({
        student_id: this.$route.params.id,
        financial_aid_id: this.tableData[index].financial_aid_id
      }).then(({data}) => {
        console.log(data)
      }).catch((err) => {
        console.log(err)
      })
      console.log(this.tableData);
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
