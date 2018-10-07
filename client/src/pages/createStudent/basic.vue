<template>
  <div id="_basic" class="student-form">
    <h2>个人资料</h2>
    <form class="basic-form columns">
      <div class="column col-6">
        <div class="form-group">
          <label class="form-label" for="cn_name">中文姓名</label>
          <input 
            class="form-input" 
            type="text" 
            id="cn_name" 
            placeholder="中文姓名"
            v-model="value.cn_name">
        </div>
      </div>
      <div class="column col-6">
        <div class="form-group">
          <label class="form-label" for="en_name">英文姓名</label>
          <input 
            class="form-input" 
            type="text" 
            id="en_name" 
            placeholder="英文姓名"
            v-model="value.en_name">
        </div>
      </div>
      <div class="column col-4">
        <div class="form-group">
          <label class="form-label" for="number">学号</label>
          <input 
            class="form-input" 
            type="text" 
            id="number" 
            placeholder="学号"
            v-model="value.number">
        </div>
      </div>
      <div class="column col-4">
        <div class="form-group">
          <label class="form-label" for="class">班级</label>
          <input 
            class="form-input" 
            type="text" 
            id="class" 
            placeholder="班级"
            v-model="value.classroom">
        </div>
      </div>
      <div class="column col-3">
        <div class="form-group columns col-gapless">
          <label class="form-label col-12">性别</label>
          <label class="form-radio col-6">
            <input type="radio" name="gender" checked
            v-model="value.gender" :value="0">
            <i class="form-icon"></i> 男
          </label>
          <label class="form-radio col-6">
            <input type="radio" name="gender"
            v-model="value.gender" :value="1">
            <i class="form-icon"></i> 女
          </label>
        </div>
      </div>
      <div class="column col-12">
        <div class="form-group">  
          <label class="form-label" for="ic-number">身份证号码</label>
          <input 
          class="form-input" 
          type="text" 
          id="ic-number" 
          placeholder="身份证号码"
          v-model="value.ic_num">
        </div>  
      </div>
      <div class="column col-5">
        <div class="form-group">
          <label class="form-label" for="phonenum">联络号码</label>
          <input 
            class="form-input" 
            type="text" 
            id="phonenum" 
            placeholder="联络号码"
            v-model="value.contact">
        </div>
      </div>
      <div class="column col-3">
        <div class="form-group">
          <label class="form-label" for="ancestral">祖籍</label>
          <input 
            class="form-input" 
            type="text" 
            id="ancestral" 
            placeholder="祖籍"
            v-model="value.ancestor">
        </div>  
      </div>
      <div class="column col-4">
        <div class="form-group">
          <label class="form-label" for="date-of-birth">出生日期</label>
          <input 
            class="form-input" 
            type="date" 
            id="date-of-birth" 
            placeholder="出生日期"
            v-model="value.birth">
        </div>
      </div>
      <div class="column col-3">
        <div class="form-group">
          <label class="form-label" for="attitude">操行</label>
          <input 
          class="form-input" 
          type="text" 
          id="attitude" 
          placeholder="操行"
          v-model="value.attitude">
        </div>  
      </div>
      <div class="column col-3">
        <div class="form-group">
          <label class="form-label" for="average-score">全年总平均</label>
          <input 
          class="form-input" 
          type="text" 
          id="average-score" 
          placeholder="全年总平均"
          v-model="value.score">
        </div>
      </div>
      <div class="column col-6">
        <div class="form-group">
          <label class="form-label" for="financial-aid">今年所获得的助学金</label>
          <input 
            class="form-input" 
            type="text" 
            id="financial-aid" 
            placeholder="今年所获得的助学金"
            v-model="value.aid">
        </div>
      </div>
      <div class="column col-12">
        <div class="form-group">
          <label class="form-label" for="address">住址</label>
          <textarea
          class="form-input" 
          type="text" 
          id="address" 
          rows="3"
          placeholder="住址"
          v-model="value.address"></textarea>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    getData: Object
  },
  beforeMount() {
    this.value = this.getData;
  },
  data() {
    return {
      value: {
        cn_name: '',
        en_name: '',
        number: null,
        classroom: '',
        gender: null,
        ic_num: '',
        contact: null,
        ancestor: '',
        birth: null,
        attitude: null,
        score: null,
        aid: '',
        address: ''
      }
    }
  }
}
</script>

<style>

</style>

