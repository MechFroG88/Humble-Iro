<template>
  <div id="_basic" class="student-form">
    <h2>个人资料</h2>
    <form class="basic-form">
      <div class="form-group">
        <label class="form-label" for="cn_name">中文姓名</label>
        <input 
          class="form-input" 
          type="text" 
          name="cn_name"
          id="cn_name" 
          placeholder="中文姓名"
          v-validate="'required'"
          v-model="value.cn_name">
      </div>
      <div class="form-group">
        <label class="form-label" for="en_name">英文姓名</label>
        <input 
          class="form-input" 
          type="text" 
          id="en_name" 
          name="en_name"
          placeholder="英文姓名"
          v-validate="{
            required: true,
            regex: /^[a-zA-Z ]+$/i
          }"
          v-model="value.en_name">
      </div>
      <div class="form-group">
        <label class="form-label" for="number">学号</label>
        <input 
          class="form-input" 
          type="number" 
          id="number" 
          name="number"
          v-validate="'required|length:6|integer'"
          placeholder="学号"
          v-model.number="value.number">
      </div>
      <div class="form-group">
        <label class="form-label" for="class">班级</label>
        <input 
          class="form-input" 
          type="text" 
          id="class" 
          name="class"
          v-validate="'required'"
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
        name="ic-number"
        id="ic-number" 
        v-validate="{
          required: true,
          regex: /^\d{6}-\d{2}-\d{4}$/
        }"
        placeholder="身份证号码"
        v-model="value.ic">
      </div>
      <div class="form-group">
        <label class="form-label" for="phonenum">联络号码</label>
        <input 
          class="form-input" 
          type="text" 
          name="phonenum"
          v-validate="{
            required: true,
            regex: /^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/
          }"
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
          name="ancestral"
          v-validate="'required'"
          placeholder="祖籍"
          v-model="value.ancestor">
      </div>
      <div class="form-group">
        <label class="form-label" for="date-of-birth">出生日期</label>
        <input 
          class="form-input" 
          type="date" 
          id="date-of-birth" 
          name="date-of-birth"
          v-validate="{
            required: true,
          }"
          placeholder="出生日期"
          v-model="value.birthdate">
      </div>
      <div class="form-group">
        <label class="form-label" for="attitude">操行</label>
        <input 
        class="form-input" 
        type="text" 
        id="attitude" 
        name="attitude"
        v-validate="'required|decimal:2'"
        placeholder="操行"
        v-model.number="value.attitude">
      </div>
      <div class="form-group">
        <label class="form-label" for="average-score">全年总平均</label>
        <input 
        class="form-input" 
        type="text" 
        id="average-score" 
        v-validate="'required|decimal:2'"
        placeholder="全年总平均"
        v-model.number="value.score">
      </div>
      <div class="form-group">
        <label class="form-label" for="address">住址</label>
        <textarea
        class="form-input" 
        type="text" 
        id="address" 
        v-validate="'required'"
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