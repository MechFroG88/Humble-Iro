<template>
  <div id="_family">
    <form class="family-form">
      <div class="form-group single_parent columns col-gapless">
        <label class="form-label col-12">单亲家庭</label>
        <label class="form-radio col-2">
          <input type="radio" name="single_parent"
          v-model="family_value.single_parent" :value="1" @click="showSingle = true">
          <i class="form-icon"></i> 是
        </label>
        <label class="form-radio col-10">
          <input type="radio" name="single_parent"
          v-model="family_value.single_parent" :value="0" @click="showSingle = false">
          <i class="form-icon"></i> 否
        </label>
      </div>
      <div class="form-group single_reason" v-if="showSingle">
        <label class="form-label" for="single_reason">单亲原因</label>
        <input 
        class="form-input" 
        type="text" 
        name="single_reason"
        id="single_reason" 
        placeholder="单亲原因"
        v-validate="'required'"
        v-model="family_value.single_reason">
        <div class="toast toast-error mt-1" v-if="errors.has('single_reason')">
          {{errors.first('single_reason')}}
        </div>
      </div>

      <div class="form-group disable_member columns col-gapless">
        <label class="form-label col-12">残障家人</label>
        <label class="form-radio col-2">
          <input type="radio" name="disabled"
          v-model="family_value.disabled" :value="1" @click="showDisabled = true">
          <i class="form-icon"></i> 有
        </label>
        <label class="form-radio col-10">
          <input type="radio" name="disabled"
          v-model="family_value.disabled" :value="0" @click="showDisabled = false">
          <i class="form-icon"></i> 无
        </label>
      </div>
      <div class="form-group disabled_relation" v-if="showDisabled">
        <label class="form-label" for="disabled_relation">与残障家人的关系</label>
        <input 
        class="form-input" 
        type="text" 
        name="disabled_relation"
        id="disabled_relation" 
        placeholder="与残障家人的关系"
        v-validate="'required'"
        v-model="family_value.disabled_relation">
        <div class="toast toast-error mt-1" v-if="errors.has('disabled_relation')">
          {{errors.first('disabled_relation')}}
        </div>
      </div>

      <div class="form-group family_size">
        <label class="form-label" for="family_size">家庭人数</label>
        <input 
        class="form-input" 
        type="number" 
        name="family_size"
        id="family_size" 
        placeholder="家庭人数"
        v-validate="'required|numeric'"
        v-model="family_value.family_size">
        <div class="toast toast-error mt-1" v-if="errors.has('family_size')">
          {{errors.first('family_size')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="working_people">就业人数</label>
        <input 
        class="form-input" 
        type="number" 
        name="working_people"
        id="working_people" 
        placeholder="就业人数"
        v-validate="'required|numeric'"
        v-model="family_value.working_people">
        <div class="toast toast-error mt-1" v-if="errors.has('working_people')">
          {{errors.first('working_people')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="primary_people">就读小学人数</label>
        <input 
        class="form-input" 
        type="number" 
        name="primary_people"
        id="primary_people" 
        placeholder="就读小学人数"
        v-validate="'required|numeric'"
        v-model="family_value.primary_people">
        <div class="toast toast-error mt-1" v-if="errors.has('primary_people')">
          {{errors.first('primary_people')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="smk_people">就读国中人数</label>
        <input 
        class="form-input" 
        type="number" 
        name="smk_people"
        id="smk_people" 
        placeholder="就读国中人数"
        v-validate="'required|numeric'"
        v-model="family_value.smk_people">
        <div class="toast toast-error mt-1" v-if="errors.has('smk_people')">
          {{errors.first('smk_people')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="smp_people">就读独中/私立学校人数</label>
        <input 
        class="form-input" 
        type="number" 
        name="smp_people"
        id="smp_people" 
        placeholder="就读独中/私立学校人数"
        v-validate="'required|numeric'"
        v-model="family_value.smp_people">
        <div class="toast toast-error mt-1" v-if="errors.has('smp_people')">
          {{errors.first('smp_people')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="uni_people">就读学院/大专人数</label>
        <input 
        class="form-input" 
        type="number" 
        name="uni_people"
        id="uni_people" 
        placeholder="就读学院/大专人数"
        v-validate="'required|numeric'"
        v-model="family_value.uni_people">
        <div class="toast toast-error mt-1" v-if="errors.has('uni_people')">
          {{errors.first('uni_people')}}
        </div>
      </div>  
    </form>

    <!-- sibling form -->
    <div class="control-buttons">
      <el-button type="primary" class="btnn" size="medium" @click="addSibling()">
        <i class="icon icon-user-plus"></i> 添加兄弟姐妹
      </el-button>
      <el-button type="primary" class="btnn" size="medium" @click="dltSibling()">
        <i class="icon icon-user-minus"></i> 删除兄弟姐妹
      </el-button>
    </div>
  
    <form class="sibling-form" v-if="sibling_number != 0">
      <div class="title">
        <div 
        class="sibling-buttons"
        :class="isSelected(index)"
        v-for="(sibling, index) in sibling_number" 
        :key="sibling" 
        @click="formIndex = index;">
          <i class="icon icon-user"></i>
        </div>
      </div>
      <div class="form-container basic_info">
        <div class="form-group cn_name">
          <label class="form-label" for="cn_name">中文姓名</label>
          <input 
          class="form-input" 
          type="text" 
          name="cn_name"
          id="cn_name" 
          placeholder="中文姓名"
          v-validate="'required'"
          v-model="siblings_array[formIndex].cn_name">
          <div class="toast toast-error mt-1" v-if="errors.has('cn_name')">
            {{errors.first('cn_name')}}
          </div>
        </div>
        <div class="form-group age">
          <label class="form-label" for="age">年龄</label>
          <input 
          class="form-input" 
          type="number" 
          name="age"
          id="age" 
          placeholder="年龄"
          v-validate="'required|integer'"
          v-model="siblings_array[formIndex].age">
          <div class="toast toast-error mt-1" v-if="errors.has('age')">
            {{errors.first('age')}}
          </div>
        </div>
        <div class="form-group relationship">
          <label class="form-label" for="relationship">关系</label>
          <select 
          class="form-select" 
          name="relationship"
          id="relationship" 
          v-validate="'required'"
          v-model="siblings_array[formIndex].relation">
            <option :value="null" disabled>请选择一个关系</option>
            <option :value="0">哥哥</option>
            <option :value="1">弟弟</option>
            <option :value="2">姐姐</option>
            <option :value="3">妹妹</option>
          </select>
          <div class="toast toast-error mt-1" v-if="errors.has('relatioship')">
            {{errors.first('relatioship')}}
          </div>
        </div>
      </div>
      <div class="form-container aid_info">
        <div class="form-group got_aid columns col-gapless">
          <label class="form-label col-12">是否申请助学金</label>
          <label class="form-radio col-2">
            <input 
            type="radio" 
            name="got_aid"
            v-model="siblings_array[formIndex].got_aid" 
            :value="1"
            @click="siblings_array[formIndex].financial_aid_id = []">
            <i class="form-icon"></i> 是
          </label>
          <label class="form-radio col-10">
            <input 
            type="radio" 
            name="got_aid"
            v-model="siblings_array[formIndex].got_aid" 
            :value="0"
            @click="siblings_array[formIndex].financial_aid_id = []">
            <i class="form-icon"></i> 否
          </label>
        </div>
        <div v-if="siblings_array[formIndex].got_aid == 1">
          <div class="title-group col-12">
            <div class="finance-title">助学金资料</div>
            <div class="control-buttons">
              <div class="btn btn-sm btn-primary ml-2" @click="addFinancial(formIndex)">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltFinancial(formIndex)">
                <i class="icon icon-minus"></i>
              </div>
            </div> 
          </div>
          <div v-for="finance in siblings_array[formIndex].financial_aid_id.length" :key="finance">
            <div class="form-group financial_aid">
              <label class="form-label" for="financial_aid">助学金名称</label>
              <select 
              class="form-input form-select" 
              name="financial_aid"
              id="financial_aid" 
              v-validate="'required'"
              v-model="siblings_array[formIndex].financial_aid_id[finance - 1]">
                <option 
                v-for="(f, index) in financialArr" 
                :value="financialArr[index].financial_aid_id" 
                :key="financialArr[index].financial_aid_id">{{financialArr[index].financial_aid_type}}</option>
              </select>
              <div class="toast toast-error mt-1" v-if="errors.has('financial_aid')">
                {{errors.first('financial_aid')}}
              </div>
            </div>
          </div>
          <div class="form-group aid_total">
            <label class="form-label" for="aid_total">助学金数额（以年份计算）</label>
            <input 
            class="form-input" 
            type="number" 
            name="aid_total"
            id="aid_total" 
            placeholder="助学金名数额"
            v-validate="'required|decimal:2'"
            v-model="siblings_array[formIndex].aid_total">
            <div class="toast toast-error mt-1" v-if="errors.has('aid_total')">
              {{errors.first('aid_total')}}
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { 
  getFamily, createSibling, getSibling, getSiblingBasic, deleteSibling 
} from '@/api/student'
import { getAid } from '@/api/financialAid'
export default {
  beforeMount() {
    getFamily(this.$route.params.id).then(({data}) => {
      this.family_value = data.data;
      if (this.family_value.single_parent == 1) { this.showSingle = true; }
      if (this.family_value.disabled == 1) { this.showDisabled = true; }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })

    getSibling(this.$route.params.id).then(({data}) => {
      if (data.data.length != 0) {
        this.siblings_array = data.data;
        this.sibling_number = this.siblings_array.length;
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })

    getAid().then(({data}) => {
      for (let i = 0; i < data.data.length; i++) {
        this.financialArr.push(data.data[i]);
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
  },
  data() {
    return {
      sibling_number: 0,
      formIndex: 0,
      financialArr: [],
      showSingle: false,
      showDisabled: false,
      family_value: {
        single_reason : '',
        single_parent : 0,
        family_size   : null,
        working_people: null,
        primary_people: null,
        smk_people    : null,
        smp_people    : null,
        uni_people    : null,
        disabled_relation: '',
        disabled  : 0,
      },
      siblings_value: {
        cn_name: '',
        age: null,
        relation: null,
        got_aid: 0,
        financial_aid_id: [],
        aid_total: '',
        sibling_id: null
      },
      siblings_array: []
    }
  },
  methods: {
    addSibling() {
      createSibling(this.$route.params.id).then(({data}) => {
        this.siblings_array.push(Object.assign({}, this.siblings_value));
        this.siblings_array[this.siblings_array.length - 1].sibling_id = data.data;
        this.sibling_number++;
      })
    },
    dltSibling() {
      if (this.sibling_number != 0) {
        deleteSibling(this.siblings_array[this.siblings_array.length - 1].sibling_id).then(({data}) => {
          this.siblings_array.pop();
          this.sibling_number--;
        })
      }
    },
    isSelected(index) {
      return this.formIndex == index ? "active" : "";
    },
    addFinancial(index) {
      this.siblings_array[index].financial_aid_id.push('')
    },
    dltFinancial(index) {
      if (this.siblings_array[index].financial_aid_id.length != 0) {
        this.siblings_array[index].financial_aid_id.pop();
      }
    }
  }
}
</script>

<style>

</style>
