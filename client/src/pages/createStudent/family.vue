<template>
  <div id="_family">
    <form class="family-form">
      <div class="form-group single_parent columns col-gapless">
        <label class="form-label col-12">单亲家庭</label>
        <label class="form-radio col-2">
          <input type="radio" name="single_parent" checked
          v-model="family_value.single_parent" :value="1" @click="gotSingle">
          <i class="form-icon"></i> 是
        </label>
        <label class="form-radio col-10">
          <input type="radio" name="single_parent"
          v-model="family_value.single_parent" :value="0" @click="removeSingle">
          <i class="form-icon"></i> 否
        </label>
      </div>
      <div class="form-group single_reason" v-if="showSingle">
        <label class="form-label" for="single_reason">单亲原因</label>
        <input 
        class="form-input" 
        type="text" 
        id="single_reason" 
        placeholder="单亲原因"
        v-model="family_value.single_reason">
      </div>

      <div class="form-group disable_member columns col-gapless">
        <label class="form-label col-12">残障家人</label>
        <label class="form-radio col-2">
          <input type="radio" name="disabled_member" checked
          v-model="family_value.disabled_member" :value="1" @click="gotDisabled">
          <i class="form-icon"></i> 有
        </label>
        <label class="form-radio col-10">
          <input type="radio" name="disabled_member"
          v-model="family_value.disabled_member" :value="0" @click="removeDisabled">
          <i class="form-icon"></i> 无
        </label>
      </div>
      <div class="form-group disabled_relation" v-if="showDisabled">
        <label class="form-label" for="disabled_relation">与残障家人的关系</label>
        <input 
        class="form-input" 
        type="text" 
        id="disabled_relation" 
        placeholder="与残障家人的关系"
        v-model="family_value.disabled_relation">
      </div>

      <div class="form-group family_size">
        <label class="form-label" for="family_size">家庭人数</label>
        <input 
        class="form-input" 
        type="number" 
        id="family_size" 
        placeholder="家庭人数"
        v-model="family_value.family_size">
      </div>
      <div class="form-group">
        <label class="form-label" for="work_people">就业人数</label>
        <input 
        class="form-input" 
        type="number" 
        id="work_people" 
        placeholder="就业人数"
        v-model="family_value.work_people">
      </div>
      <div class="form-group">
        <label class="form-label" for="primary_people">就读小学人数</label>
        <input 
        class="form-input" 
        type="number" 
        id="primary_people" 
        placeholder="就读小学人数"
        v-model="family_value.primary_people">
      </div>

      <div class="form-group">
        <label class="form-label" for="smk_people">就读国中人数</label>
        <input 
        class="form-input" 
        type="number" 
        id="smk_people" 
        placeholder="就读国中人数"
        v-model="family_value.smk_people">
      </div>
      <div class="form-group">
        <label class="form-label" for="smp_people">就读独中/私立学校人数</label>
        <input 
        class="form-input" 
        type="number" 
        id="smp_people" 
        placeholder="就读独中/私立学校人数"
        v-model="family_value.smp_people">
      </div>
      <div class="form-group">
        <label class="form-label" for="uni_people">就读学院/大专人数</label>
        <input 
        class="form-input" 
        type="number" 
        id="uni_people" 
        placeholder="就读学院/大专人数"
        v-model="family_value.uni_people">
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
        @click="openForm(index)">
          <i class="icon icon-user"></i>
        </div>
      </div>
      <div class="form-container basic_info">
        <div class="form-group cn_name">
          <label class="form-label" for="cn_name">中文姓名</label>
          <input 
          class="form-input" 
          type="text" 
          id="cn_name" 
          placeholder="中文姓名"
          v-model="siblings_array[formIndex].cn_name">
        </div>
        <div class="form-group age">
          <label class="form-label" for="age">年龄</label>
          <input 
          class="form-input" 
          type="number" 
          id="age" 
          placeholder="年龄"
          v-model="siblings_array[formIndex].age">
        </div>
        <div class="form-group relation">
          <label class="form-label" for="relation">关系</label>
          <select class="form-select" id="relation" v-model="siblings_array[formIndex].relation">
            <option :value="null" disabled>请选择一个关系</option>
            <option :value="0">哥哥</option>
            <option :value="1">弟弟</option>
            <option :value="2">姐姐</option>
            <option :value="3">妹妹</option>
          </select>
        </div>
      </div>
      <div class="form-container aid_info">
        <div class="form-group aid columns col-gapless">
          <label class="form-label col-12">是否申请助学金</label>
          <label class="form-radio col-2">
            <input 
            type="radio" 
            name="aid"
            v-model="siblings_array[formIndex].aid" 
            :value="1">
            <i class="form-icon"></i> 是
          </label>
          <label class="form-radio col-10">
            <input 
            type="radio" 
            name="aid" 
            v-model="siblings_array[formIndex].aid" 
            :value="0">
            <i class="form-icon"></i> 否
          </label>
        </div>
        <div class="form-group aid_name">
          <label class="form-label" for="aid_name">助学金名称</label>
          <input 
          class="form-input" 
          type="text" 
          id="aid_name" 
          placeholder="助学金名称"
          v-model="siblings_array[formIndex].aid_name">
        </div>
        <div class="form-group aid_total">
          <label class="form-label" for="aid_total">助学金数额（以年份计算）</label>
          <input 
          class="form-input" 
          type="number" 
          id="aid_total" 
          placeholder="助学金名数额"
          v-model="siblings_array[formIndex].aid_total">
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    familyData: Object,
    siblingsData: Array
  },
  beforeMount() {
    this.family_value = this.familyData;
    if (this.siblingsData.length != 0) {
      this.siblings_array = this.siblingsData;
      this.sibling_number = this.siblingsData.length;
    }
  },
  data() {
    return {
      sibling_number: 0,
      formIndex: 0,
      showSingle: false,
      showDisabled: false,
      family_value: {
        single_reason : '',
        single_parent : null,
        family_size   : null,
        work_people   : null,
        primary_people: null,
        smk_people    : null,
        smp_people    : null,
        uni_people    : null,
        disabled_relation: '',
        disabled_member  : null,
      },
      siblings_value: {
        cn_name: '',
        age: null,
        relation: null,
        aid: null,
        aid_name: '',
        aid_total: null
      },
      siblings_array: []
    }
  },
  methods: {
    gotSingle() {
      this.showSingle = true;
    },
    removeSingle() {
      this.showSingle = false;
    },
    gotDisabled() {
      this.showDisabled = true;
    },
    removeDisabled() {
      this.showDisabled = false;
    },
    addSibling() {
      this.siblings_array.push(Object.assign({}, this.siblings_value));
      this.sibling_number++;
    },
    dltSibling() {
      if (this.sibling_number != 0) {
        this.siblings_array.pop();
        this.sibling_number--;
      }
    },
    openForm(index) {
      this.formIndex = index;
    },
    isSelected(index) {
      return this.formIndex == index ? "active" : "";
    }
  }
}
</script>

<style>

</style>
