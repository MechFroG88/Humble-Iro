<template>
  <div id="_users">
    <layout>
      <div class="action-bar">
        <el-button type="primary" @click="addModal">
          <i class="icon icon-plus"></i> 添加用户
        </el-button>
      </div>
      <crudTable
      title="用户列表"
      :columns="usersColumns"
      :tableData="usersData"
      modalTitle="编辑用户"
      :modalData="usersModal"
      :modal="true"
      type="users">
      </crudTable>
    </layout>

    <modal title="添加用户" ref="add">
      <div slot="content">
        <div class="form-group">
          <label class="form-label">用户名</label>
          <input 
          class="form-input" 
          :class="{'is-error': errors.first('username')}"
          type="text" 
          name="username"
          placeholder="请输入用户名..."
          v-validate="'required|min:5'"
          v-model="value.username">
        </div>
        <p
        class="form-input-hint text-error" 
        v-if="errors.first('username')">用户名至少需5个字符</p>
        <div class="form-group">
          <label class="form-label">中文姓名</label>
          <input 
          class="form-input" 
          :class="{'is-error': errors.first('cn_name')}"
          type="text" 
          name="cn_name"
          placeholder="请输入用户中文姓名..."
          v-validate="'required'"
          v-model="value.cn_name">
        </div>
        <p
        class="form-input-hint text-error" 
        v-if="errors.first('cn_name')">用户中文姓名是必须的</p>
      </div>

      <div slot="footer">
        <button class="btn btn-primary btn-error btn-lg" @click="closeModal()">取消</button>
        <button class="btn btn-primary btn-lg" @click="confirmAdd()">确认</button>
      </div>
    </modal>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import modal     from '@/components/modal/modal'
import { getUser, addUser } from '@/api/user'
import { usersModal } from '@/api/modalData'
import { usersColumns } from '@/api/tableColumns'
export default {
  beforeMount() {
    this.get();
  },
  components: {
    crudTable,
    layout,
    modal
  },
  data() {
    return {
      usersColumns,
      usersData: [],
      usersModal,
      value: {
        username: '',
        password: '',
        cn_name : ''
      }
    }
  },
  methods: {
    reset() {
      this.value.username = '';
      this.value.password = '';
      this.value.cn_name  = '';
    },
    get() {
      getUser().then(({data}) => {
        this.usersData = data.data;
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    addModal() {
      this.$refs.add.active = true;
    },
    closeModal() {
      this.$refs.add.active = false;
      this.errors.clear();
    },
    confirmAdd() {
      //POST
      this.value.password = this.value.username;
      addUser(this.value).then(({data}) => {
        if (data.status == 200) {
          this.$refs.add.active  = false;
          this.$refs.add.loading = false;
          this.$refs.add.error   = false;
          this.$emit('close');
          this.get();
          this.reset();
        }
      }).catch(() => {
        this.$refs.add.error = true;
      })
    }
  }
}
</script>

<style>

</style>
