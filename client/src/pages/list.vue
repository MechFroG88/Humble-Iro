<template>
  <div id="_list">
    <layout>
      <div class="action-bar">
        <el-button type="primary" @click="addModal">
          <i class="icon icon-plus"></i> 添加助学金
        </el-button>
      </div>
      <crudTable
      title="助学金种类列表"
      :columns="listColumns"
      :tableData="listData"
      :modal="true"
      modalTitle="编辑助学金"
      :modalData="listModal">
      </crudTable>
    </layout>

    <modal title="添加助学金" ref="add">
      <div slot="content">
        <div class="form-group">
          <label class="form-label">助学金种类</label>
          <input 
          class="form-input" 
          type="text" 
          placeholder="请输入所提供助学金名称..."
          v-model="value.aid_type">
        </div>
        <div class="form-group">
          <label class="form-label">申请条件</label>
          <input 
          class="form-input" 
          type="text" 
          placeholder="请输入所需的申请条件..."
          v-model="value.requirements">
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
import { listModal } from '../../api/modalData'
import { listColumns } from '../../api/tableColumns'

import { listData } from '../../api/mock/tableData'
export default {
  components: {
    layout,
    crudTable,
    modal
  },
  data() {
    return {
      listColumns,
      listData,
      listModal,
      value: {
        aid_type    : '',
        requirements: ''
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
