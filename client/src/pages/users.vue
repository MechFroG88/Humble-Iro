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
      :modal="true">
      </crudTable>
    </layout>

    <modal title="添加用户" ref="add">
      <div slot="content">
        <div class="form-group">
          <label class="form-label">用户名</label>
          <input 
          class="form-input" 
          type="text" 
          placeholder="请输入用户名..."
          v-model="value.username">
        </div>
        <div class="form-group">
          <label class="form-label">中文姓名</label>
          <input 
          class="form-input" 
          type="text" 
          placeholder="请输入用户中文姓名..."
          v-model="value.cn_name">
        </div>
      </div>

      <div slot="footer">
        <button class="btn btn-primary btn-error btn-lg" @click="$refs.edit.active = false">取消</button>
        <button class="btn btn-primary btn-lg" @click="confirmAdd()">确认</button>
      </div>
    </modal>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import modal     from '@/components/modal/modal'
import { usersModal } from '../../api/modalData'
import { usersColumns } from '../../api/tableColumns'

import {usersData} from '../../api/mock/tableData'
export default {
  components: {
    crudTable,
    layout,
    modal
  },
  data() {
    return {
      usersColumns,
      usersData,
      usersModal,
      value: {
        username: '',
        cn_name : ''
      }
    }
  },
  methods: {
    addModal() {
      this.$refs.add.active = true;
    },
    confirmAdd() {
      this.$refs.add.active  = false;
      this.$refs.add.loading = false;
      this.$refs.add.error   = false;
      this.$emit('close');
      console.log("post")
      //POST
      console.log(this.value);
    }
  }
}
</script>

<style>

</style>
