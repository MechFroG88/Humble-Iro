<template>
  <div id="_aid">
    <layout>
      <div class="action-bar">
        <el-button type="primary" @click="addModal">
          <i class="icon icon-plus"></i> 添加赞助单位
        </el-button>
      </div>
      <crudTable
      title="助学金申请列表"
      :columns="aidColumns"
      :tableData="aidData"
      :modal="true"
      modalTitle="编辑助学金申请"
      :modalData="aidModal">
      </crudTable>
    </layout>

    <modal title="添加赞助单位" ref="add">
      <div slot="content">
        <div class="form-group">
          <label class="form-label">赞助者</label>
          <input 
          class="form-input" 
          type="text" 
          placeholder="请输入赞助单位名称..."
          v-model="value.supplier">
        </div>
        <div class="form-group">
          <label class="form-label">助学金种类</label>
          <input 
          class="form-input" 
          type="text" 
          placeholder="请输入所提供助学金名称..."
          v-model="value.aid_type">
        </div>
        <div class="form-group">
          <label class="form-label">截止日期</label>
          <input 
          class="form-input" 
          type="date" 
          placeholder="请输入赞助截止日期..."
          v-model="value.expired_date">
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
import { getAid } from '@/api/tableData'
import { aidModal } from '../../api/modalData'
import { aidColumns } from '../../api/tableColumns'

// import { aidData } from '../../api/mock/tableData'
export default {
  mounted() {
    getAid().then(({data}) => {
      this.aidData = data.data;
    })
  },
  components: {
    layout,
    crudTable,
    modal
  },
  data() {
    return {
      aidColumns,
      aidData: [],
      aidModal,
      value: {
        supplier: '',
        aid_type: '',
        expired_date: ''
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
