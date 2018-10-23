<template>
  <div id="_financial_aid">
    <layout>
      <div class="action-bar">
        <el-button type="primary" @click="addModal">
          <i class="icon icon-plus"></i> 添加赞助单位
        </el-button>
      </div>
      <crudTable
      title="助学金列表"
      :columns="financialAidColumns"
      :tableData="financialAidData"
      :modal="true"
      :check="true"
      modalTitle="编辑助学金"
      :modalData="financialAidModal"
      type="financial_aid">
      </crudTable>
    </layout>

    <modal title="添加助学金" ref="add">
      <div slot="content">
        <div class="form-group">
          <label class="form-label">赞助者</label>
          <input 
          class="form-input" 
          :class="{'is-error': errors.first('supplier') }"
          name="supplier"
          type="text" 
          placeholder="请输入赞助单位名称..."
          v-validate="'required'"
          v-model="value.supplier">
        </div>
        <p
        class="form-input-hint text-error" 
        v-if="errors.first('supplier')">赞助单位是必须的</p>
        <div class="form-group">
          <label class="form-label">助学金种类</label>
          <input 
          class="form-input" 
          :class="{'is-error': errors.first('financial_aid_type') }"
          name="financial_aid_type"
          type="text" 
          placeholder="请输入所提供助学金名称..."
          v-validate="'required'"
          v-model="value.financial_aid_type">
        </div>
        <p
        class="form-input-hint text-error" 
        v-if="errors.first('financial_aid_type')">助学金名称是必须的</p>
        <div class="form-group">
          <label class="form-label">申请条件</label>
          <input 
          class="form-input" 
          :class="{'is-error': errors.first('requirements') }"
          name="requirements"
          type="text" 
          placeholder="请输入申请条件..."
          v-validate="'required'"
          v-model="value.requirements">
        </div>
        <p
        class="form-input-hint text-error" 
        v-if="errors.first('requirements')">申请条件是必须的</p>
        <div class="form-group">
          <label class="form-label">截止日期</label>
          <input 
          class="form-input" 
          :class="{'is-error': errors.first('expired_date') }"
          name="expired_date"
          type="date" 
          placeholder="请输入赞助截止日期..."
          v-validate="'required'"
          v-model="value.expired_date">
        </div>
        <p
        class="form-input-hint text-error" 
        v-if="errors.first('requirements')">赞助截止日期是必须的</p>
      </div>
      <div slot="footer">
        <button 
        class="btn btn-primary btn-error btn-lg" 
        @click="closeModal()">取消</button>
        <button 
        class="btn btn-primary btn-lg" 
        @click="confirmAdd()">确认</button>
      </div>
    </modal>
  </div>
</template>

<script>
import layout    from '@/layout/default'
import crudTable from '@/components/tables'
import modal     from '@/components/modal/modal'
import { financialAidModal }   from '@/api/modalData'
import { financialAidColumns } from '@/api/tableColumns'
import { getAid, addAid } from '@/api/financial_aid'

export default {
  beforeMount() {
    this.get();
  },
  components: {
    layout,
    crudTable,
    modal
  },
  data: () => ({
    financialAidColumns,
    financialAidModal,
    financialAidData: [],
    value: {
      supplier: '',
      financial_aid_type: '',
      requirements: '',
      expired_date: '',
    }
  }),
  methods: {
    get() {
      getAid().then(({data}) => {
        this.financialAidData = data.data;
      })
    },
    reset() {
      this.value.supplier = '';
      this.value.financial_aid_type = '';
      this.value.requirements = '';
      this.value.expired_date = '';
    },
    addModal() {
      this.$refs.add.active = true;
      console.log(this.$refs.add.errors)
    },
    closeModal() {
      this.$refs.add.active = false;
      this.errors.clear();
    },
    confirmAdd() {
      this.$refs.add.active  = false;
      this.$refs.add.loading = false;
      this.$refs.add.error   = false;
      this.$emit('close');
      addAid(this.value).then(() => {
        this.get();
        this.reset();
      }).catch((err) => {
        console.log(err);
      })
    }
  }
}
</script>

<style>

</style>
