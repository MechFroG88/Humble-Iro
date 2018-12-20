<template>
  <div id="_basic" class="student-form">
    <h2>个人资料</h2>
    <form class="basic-form">
      <div class="form-group">
        <label class="form-label" for="cn_name">中文姓名</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('cn_name')}"
        type="text" 
        name="cn_name"
        id="cn_name" 
        placeholder="中文姓名"
        v-validate="'required'"
        v-model="value.cn_name">
        <div class="toast toast-error mt-1" v-if="errors.has('cn_name')">
          {{errors.first('cn_name')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="en_name">英文姓名</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('en_name')}"
        type="text" 
        id="en_name" 
        name="en_name"
        placeholder="英文姓名"
        v-validate="{
          required: true,
          regex: /^[a-zA-Z ]+$/i
        }"
        v-model="value.en_name">
        <div class="toast toast-error mt-1" v-if="errors.has('en_name')">
          {{errors.first('en_name')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="number">学号</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('number')}"
        type="text" 
        id="number" 
        name="number"
        v-validate="'required|numeric|length:6'"
        placeholder="学号"
        v-model.number="value.number">
        <div class="toast toast-error mt-1" v-if="errors.has('number')">
          {{errors.first('number')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="class">班级</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('class')}"
        type="text" 
        id="class" 
        name="class"
        v-validate="'required'"
        placeholder="班级"
        v-model="value.classroom">
        <div class="toast toast-error mt-1" v-if="errors.has('class')">
          {{errors.first('class')}}
        </div>
      </div>
      <div class="form-group columns col-gapless">
        <label class="form-label col-12">性别</label>
        <label class="form-radio col-2">
          <input type="radio" name="gender"
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
        <label class="form-label" for="icNumber">身份证号码</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('icNumber')}"
        type="text" 
        name="icNumber"
        id="icNumber" 
        v-validate="{
          required: true,
          regex: /^\d{6}-\d{2}-\d{4}$/
        }"
        placeholder="身份证号码"
        v-model="value.ic">
        <div class="toast toast-error mt-1" v-if="errors.has('icNumber')">
          {{errors.first('icNumber')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="phonenum">联络号码</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('phonenum')}"
        type="text" 
        name="phonenum"
        id="phonenum" 
        v-validate="{
          required: true,
          regex: /^(\+6)?0(1(1|5)-?\d{8}|1[02-46-9]-?\d{7}|[2-79]-?\d{8}|8[0-9]-?\d{6})$/
        }"
        placeholder="联络号码"
        v-model="value.contact">
        <div class="toast toast-error mt-1" v-if="errors.has('phonenum')">
          {{errors.first('phonenum')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="ancestral">祖籍</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('ancestral')}"
        type="text" 
        id="ancestral" 
        name="ancestral"
        v-validate="'required'"
        placeholder="祖籍"
        v-model="value.ancestor">
        <div class="toast toast-error mt-1" v-if="errors.has('ancestral')">
          {{errors.first('ancestral')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="birthdate">出生日期</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('birthdate')}"
        type="date" 
        id="birthdate" 
        name="birthdate"
        v-validate="'required'"
        placeholder="出生日期"
        v-model="value.birthdate">
        <div class="toast toast-error mt-1" v-if="errors.has('birthdate')">
          {{errors.first('birthdate')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="attitude">操行</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('attitude')}"
        type="text" 
        id="attitude" 
        name="attitude"
        v-validate="'required|numeric|between:0,100'"
        placeholder="操行"
        v-model.number="value.attitude">
        <div class="toast toast-error mt-1" v-if="errors.has('attitude')">
          {{errors.first('attitude')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="averageScore">全年总平均</label>
        <input 
        class="form-input" 
        :class="{'error': errors.has('averageScore')}"
        type="text" 
        id="averageScore" 
        name="averageScore"
        v-validate="'required|between:0,100|decimal:3'"
        placeholder="全年总平均"
        v-model.number="value.score">
        <div class="toast toast-error mt-1" v-if="errors.has('averageScore')">
          {{errors.first('averageScore')}}
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="address">住址</label>
        <textarea
        class="form-input" 
        :class="{'error': errors.has('address')}"
        type="text" 
        id="address" 
        name="address"
        v-validate="'required'"
        rows="3"
        placeholder="住址"
        v-model="value.address"/>
        <div class="toast toast-error mt-1" v-if="errors.has('address')">
          {{errors.first('address')}}
        </div>
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
        gender: 0,
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