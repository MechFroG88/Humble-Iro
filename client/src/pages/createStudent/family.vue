<template>
  <div id="_family">
    <form class="family-form">
      <div class="form-container single-family columns">
        <div class="form-group single_parent column col-3 columns col-gapless">
          <label class="form-label col-12">单亲家庭</label>
          <label class="form-radio col-6">
            <input type="radio" name="single_parent" checked
            v-model="family_value.single_parent" :value="1">
            <i class="form-icon"></i> 是
          </label>
          <label class="form-radio col-6">
            <input type="radio" name="single_parent"
            v-model="family_value.single_parent" :value="0">
            <i class="form-icon"></i> 否
          </label>
        </div>
        <div class="form-group single_reason column col-3">
          <label class="form-label" for="single_reason">单亲原因</label>
          <input 
          class="form-input" 
          type="text" 
          id="single_reason" 
          placeholder="单亲原因"
          v-model="family_value.single_reason">
        </div>
        <div class="form-group disable_member column col-3 columns col-gapless">
          <label class="form-label col-12">残障家人</label>
          <label class="form-radio col-6">
            <input type="radio" name="disabled_member" checked
            v-model="family_value.disabled_member" :value="1">
            <i class="form-icon"></i> 有
          </label>
          <label class="form-radio col-6">
            <input type="radio" name="disabled_member"
            v-model="family_value.disabled_member" :value="0">
            <i class="form-icon"></i> 无
          </label>
        </div>
        <div class="form-group disabled_relation column col-3">
          <label class="form-label" for="disabled_relation">与残障家人的关系</label>
          <input 
          class="form-input" 
          type="text" 
          id="disabled_relation" 
          placeholder="与残障家人的关系"
          v-model="family_value.disabled_relation">
        </div>
      </div>
      <div class="form-container noofpax1 columns">
        <div class="form-group family_size column col-4">
          <label class="form-label" for="family_size">家庭人数</label>
          <input 
          class="form-input" 
          type="number" 
          id="family_size" 
          placeholder="家庭人数"
          v-model="family_value.family_size">
        </div>
        <div class="form-group column col-4">
          <label class="form-label" for="work_people">就业人数</label>
          <input 
          class="form-input" 
          type="number" 
          id="work_people" 
          placeholder="就业人数"
          v-model="family_value.work_people">
        </div>
        <div class="form-group column col-4">
          <label class="form-label" for="primary_people">就读小学人数</label>
          <input 
          class="form-input" 
          type="number" 
          id="primary_people" 
          placeholder="就读小学人数"
          v-model="family_value.primary_people">
        </div>
      </div>
      <div class="form-container noofpax2 columns">
        <div class="form-group column col-4">
          <label class="form-label" for="smk_people">就读国中人数</label>
          <input 
          class="form-input" 
          type="number" 
          id="smk_people" 
          placeholder="就读国中人数"
          v-model="family_value.smk_people">
        </div>
        <div class="form-group column col-4">
          <label class="form-label" for="smp_people">就读独中/私立学校人数</label>
          <input 
          class="form-input" 
          type="number" 
          id="smp_people" 
          placeholder="就读独中/私立学校人数"
          v-model="family_value.smp_people">
        </div>
        <div class="form-group column col-4">
          <label class="form-label" for="uni_people">就读学院/大专人数</label>
          <input 
          class="form-input" 
          type="number" 
          id="uni_people" 
          placeholder="就读学院/大专人数"
          v-model="family_value.uni_people">
        </div>
      </div>   
    </form>

    <!-- sibling form -->
    <el-button type="primary" class="btnn" size="medium" @click="addSibling()">
      <i class="icon icon-user-plus"></i> 添加兄弟姐妹
    </el-button>
    <el-button type="primary" class="btnn" size="medium" @click="dltSibling()">
      <i class="icon icon-user-minus"></i> 删除兄弟姐妹
    </el-button>
  
    <form class="sibling-form" v-for="sibling in sibling_number" :key="sibling">
      <div class="title">{{sibling}}.</div>
      <div class="form-container basic_info columns">
        <div class="form-group cn_name column col-4">
          <label class="form-label" for="cn_name">中文姓名</label>
          <input class="form-input" type="text" id="cn_name" placeholder="中文姓名">
        </div>
        <div class="form-group age column col-4">
          <label class="form-label" for="age">年龄</label>
          <input class="form-input" type="number" id="age" placeholder="年龄">
        </div>
        <div class="form-group relation column col-4">
          <label class="form-label" for="relation">关系</label>
          <select class="form-select" id="relation" v-model="siblings_value.relation">
            <option :value="null" disabled>请选择一个关系</option>
            <option :value="0">哥哥</option>
            <option :value="1">弟弟</option>
            <option :value="2">姐姐</option>
            <option :value="3">妹妹</option>
          </select>
        </div>
      </div>
      <div class="form-container aid_info columns">
        <div class="column col-4">
          <div class="form-group aid columns col-gapless">
            <label class="form-label col-12">是否申请助学金</label>
            <label class="form-radio col-6">
              <input type="radio" name="aid" :value="1">
              <i class="form-icon"></i> 是
            </label>
            <label class="form-radio col-6">
              <input type="radio" name="aid" :value="0">
              <i class="form-icon"></i> 否
            </label>
          </div>
        </div>
        <div class="form-group aid_name column col-4">
          <label class="form-label" for="aid_name">助学金名称</label>
          <input class="form-input" type="text" id="aid_name" placeholder="助学金名称">
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      sibling_number: 0,
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
        relation: null,
      }
    }
  },
  methods: {
    addSibling() {
      this.sibling_number++;
    },
    dltSibling() {
      if (this.sibling_number != 0) {
        this.sibling_number--;
      }
    }
  }
}
</script>

<style>

</style>
