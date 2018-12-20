<template>
  <div id="_list">
    <layout>
      <div class="d-block">
        <el-row class="title-container" type="flex">
          <h3 class="title">{{details.financial_aid_type}}申请列表</h3> 
        </el-row>
        <el-table
          :data="details.student"
          style="width: 100%">
          <el-table-column
            prop="cn_name"
            label="学生姓名">
          </el-table-column>
          <el-table-column label="状态">
            <template slot-scope="scope">
              <span class="label label-primary"
              v-if="details.student[scope.$index].status == 1">未审核</span>
              <span class="label label-success"
              v-if="details.student[scope.$index].status == 2">已批准</span>
            </template>
          </el-table-column>
          <el-table-column label="操作">
            <template slot-scope="scope">
              <el-button
              size="mini"
              @click="openCheck(scope.$index)">查看</el-button>
              
              <el-button
              class="mr-2"
              size="mini"
              type="success"
              @click="verify(scope.$index)">批准</el-button>

              <el-button
              size="mini"
              type="danger"
              @click="remove(scope.$index)">不批准</el-button>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </layout>

    <delete-modal 
    :confirm="handleDelete" ref="del">
    </delete-modal>
  </div>
</template>

<script>
import layout from '@/layout/default'
import deleteModal from '@/components/modal/confirmation'
import { getAidById } from '@/api/financial_aid'
import { verifyStudent, deleteVerification } from '@/api/student'
export default {
  beforeMount() {
    this.get();
  },
  components: {
    layout,
    deleteModal
  },
  data: () => ({
    details: {},
    deleteId: null
  }),
  methods: {
    get() {
      getAidById(this.$route.params.id).then(({data}) => {
        this.details = data.data;
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    openCheck(index) {
      const params = this.details.student[index].student_id;
      this.$router.push(`/validate/${params}`);
    },
    verify(index) {
      verifyStudent({
        student_id: this.details.student[index].student_id,
        financial_aid_id: this.details.financial_aid_id
      }).then(() => {
        this.get();
      })
    },
    remove(index) {
      this.deleteId = index;
      this.$refs.del.active = true;
    },
    handleDelete() {
      deleteVerification({
        student_id: this.details.student[this.deleteId].student_id,
        financial_aid_id: this.details.financial_aid_id
      }).then(() => {
        this.get();
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    }
  }
}
</script>

<style>

</style>
