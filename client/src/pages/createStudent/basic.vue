<template>
  <div id="_basic" class="student-form">
    <h2>个人资料</h2>
    <form class="basic-form">
      <div class="form-group">
        <label class="form-label" for="cn_name">中文姓名</label>
        <input 
          class="form-input" 
          type="text" 
          id="cn_name" 
          placeholder="中文姓名"
          v-model="value.cn_name">
      </div>
      <div class="form-group">
        <label class="form-label" for="en_name">英文姓名</label>
        <input 
          class="form-input" 
          type="text" 
          id="en_name" 
          placeholder="英文姓名"
          v-model="value.en_name">
      </div>
      <div class="form-group">
        <label class="form-label" for="number">学号</label>
        <input 
          class="form-input" 
          type="number" 
          id="number" 
          placeholder="学号"
          v-model.number="value.number">
      </div>
      <div class="form-group">
        <label class="form-label" for="class">班级</label>
        <input 
          class="form-input" 
          type="text" 
          id="class" 
          placeholder="班级"
          v-model="value.classroom">
      </div>
      <div class="form-group columns col-gapless">
        <label class="form-label col-12">性别</label>
        <label class="form-radio col-2">
          <input type="radio" name="gender" checked
          v-model="value.gender" :value="0">
          <i class="form-icon"></i> 男
        </label>
        <label class="form-radio col-10">
          <input type="radio" name="gender"
          v-model="value.gender" :value="1">
          <i class="form-icon"></i> 女
        </label>
      </div>
      <div class="form-group">  
        <label class="form-label" for="ic-number">身份证号码</label>
        <input 
        class="form-input" 
        type="text" 
        id="ic-number" 
        placeholder="身份证号码"
        v-model="value.ic">
      </div>
      <div class="form-group">
        <label class="form-label" for="phonenum">联络号码</label>
        <input 
          class="form-input" 
          type="text" 
          id="phonenum" 
          placeholder="联络号码"
          v-model="value.contact">
      </div>
      <div class="form-group">
        <label class="form-label" for="ancestral">祖籍</label>
        <input 
          class="form-input" 
          type="text" 
          id="ancestral" 
          placeholder="祖籍"
          v-model="value.ancestor">
      </div>
      <div class="form-group">
        <label class="form-label" for="date-of-birth">出生日期</label>
        <input 
          class="form-input" 
          type="date" 
          id="date-of-birth" 
          placeholder="出生日期"
          v-model="value.birthdate">
      </div>
      <div class="form-group">
        <label class="form-label" for="attitude">操行</label>
        <input 
        class="form-input" 
        type="text" 
        id="attitude" 
        placeholder="操行"
        v-model.number="value.attitude">
      </div>
      <div class="form-group">
        <label class="form-label" for="average-score">全年总平均</label>
        <input 
        class="form-input" 
        type="text" 
        id="average-score" 
        placeholder="全年总平均"
        v-model.number="value.score">
      </div>
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
    </form>
  </div>
</template>

<script>
import { getStudent } from '@/api/student'
export default {
  mounted() {
    getStudent(this.$route.params.id).then(({data}) => {
      if (Object.keys(data.data).length != 0) {
        this.value = Object.assign({}, data.data)
      }
    })
  },
  data() {
    return {
      value: {
        cn_name: '',
        en_name: '',
        number: null,
        classroom: '',
        gender: null,
        ic: '',
        contact: null,
        ancestor: '',
        birthdate: null,
        attitude: null,
        score: null,
        address: ''
      }
    }
  }
}
</script>

<style>

</style>

