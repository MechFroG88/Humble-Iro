<template>
  <div id="_parent">
    <el-button type="primary" class="btnn" size="medium" @click="addParent()">
      <i class="icon icon-user-plus"></i> 添加监护人
    </el-button>
    <el-button type="primary" class="btnn" size="medium" @click="dltParent()">
      <i class="icon icon-user-minus"></i> 删除监护人
    </el-button>


    <form class="parent-form" v-for="num in quantity" :key="num">
      <h4>监护人{{num}}</h4>
      <div class="form-group cn_name">
        <label class="form-label" for="cn_name">中文姓名</label>
        <input 
        class="form-input" 
        type="text" 
        name="cn_name"
        id="cn_name" 
        placeholder="中文姓名"
        v-validate="'required'"
        v-model="output_value[num - 1].cn_name">
        <div class="toast toast-error mt-1" v-if="errors.has('cn_name')">
          {{errors.first('cn_name')}}
        </div>
      </div>
      <div class="form-group en_name">
        <label class="form-label" for="en_name">英文名字</label>
        <input 
        class="form-input" 
        type="text" 
        name="en_name"
        id="en_name" 
        placeholder="英文名字"
        v-validate="{
          required: true,
          regex: /^[a-zA-Z ]+$/i
        }"
        v-model="output_value[num - 1].en_name">
        <div class="toast toast-error mt-1" v-if="errors.has('en_name')">
          {{errors.first('en_name')}}
        </div>
      </div>
      <div class="form-group relationship">
        <label class="form-label" for="relationship">关系</label>
        <select 
        class="form-select" 
        name="relationship"
        id="relationship" 
        v-validate="'required'"
        v-model="output_value[num - 1].relation">
          <option :value="null" disabled>请选择关系</option>
          <option :value="0">父亲</option>
          <option :value="1">母亲</option>
          <option :value="2">监护人</option>
        </select>
        <div class="toast toast-error mt-1" v-if="errors.has('relationship')">
          {{errors.first('relationship')}}
        </div>
      </div>
      <div class="form-group phonenum">
        <label class="form-label" for="phonenum">联络号码</label>
        <input 
        class="form-input" 
        type="text" 
        name="phonenum"
        id="phonenum" 
        placeholder="联络号码"
        v-validate="{
          required: true,
          regex: /^(\+6)?0(1(1|5)-?\d{8}|1[02-46-9]-?\d{7}|[2-79]-?\d{8}|8[0-9]-?\d{6})$/
        }"
        v-model="output_value[num - 1].contact">
        <div class="toast toast-error mt-1" v-if="errors.has('phonenum')">
          {{errors.first('phonenum')}}
        </div>
      </div>
      <div class="form-group icNumber">
        <label class="form-label" for="icNumber">身份证号码</label>
        <input 
        class="form-input" 
        type="text" 
        name="icNumber"
        id="icNumber" 
        placeholder="身份证号码"
        v-validate="{
          required: true,
          regex: /\d{6}-\d{2}-\d{4}/
        }"
        v-model="output_value[num - 1].ic">
        <div class="toast toast-error mt-1" v-if="errors.has('icNumber')">
          {{errors.first('icNumber')}}
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
        v-validate="'required|numeric'"
        v-model="output_value[num - 1].age">
        <div class="toast toast-error mt-1" v-if="errors.has('age')">
          {{errors.first('age')}}
        </div>
      </div>
      <div class="form-group occupation">
        <label class="form-label" for="occupation">职业</label>
        <input 
        class="form-input" 
        type="text" 
        name="occupation"
        id="occupation" 
        placeholder="职业"
        v-model="output_value[num - 1].occupation">
      </div>
      <div class="form-group work_place">
        <label class="form-label" for="work_place">雇主/公司/工作单位名称</label>
        <input 
        class="form-input" 
        type="text" 
        name="work_place"
        id="work_place" 
        placeholder="雇主/公司/工作单位名称"
        v-model="output_value[num - 1].work_place">
      </div>
      <div class="form-group boss_contact">
        <label class="form-label" for="boss_contact">雇主联络号码</label>
        <input 
        class="form-input" 
        type="text" 
        name="boos_contact"
        id="boss_contact" 
        placeholder="雇主联络号码"
        v-validate="{
          regex: /^(\+6)?0(1(1|5)-?\d{8}|1[02-46-9]-?\d{7}|[2-79]-?\d{8}|8[0-9]-?\d{6})$/
        }"
        v-model="output_value[num - 1].boss_contact">
        <div class="toast toast-error mt-1" v-if="errors.has('boss_contact')">
          {{errors.first('boss_contact')}}
        </div>
      </div>

      <div class="form-group occupation_address">
        <label class="form-label" for="occupation_address">工作地址</label>
        <textarea 
        class="form-input" 
        name="occupation_address"
        id="occupation_address" 
        placeholder="工作地址" 
        rows="3"
        v-model="output_value[num - 1].work_address"/>
      </div>
    </form>
  </div>
</template>

<script>
import { getParent, getParentBasic, createParent, deleteParent } from '@/api/student'
export default {
  beforeMount() {
    getParentBasic(this.$route.params.id).then(({data}) => {      
      if (data.data.length == 0) {
        createParent(this.$route.params.id).then(({data}) => {
          if (data.status == 200) {
            this.output_value.push(Object.assign({}, this.value));
            this.output_value[0].parent_id = data.data;
          }
        }).then(() => {
          this.quantity = this.output_value.length;
        }).catch(() => {
          this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
        })
      } else {
        getParent(this.$route.params.id).then(({data}) => {
          for (let i = 0; i < data.data.length; i++) {
            this.output_value.push(Object.assign(this.value, data.data[i]));
            // this.output_value[i].parent_id = data.data[i].parent_id;
          }
        }).then(() => {
          this.quantity = this.output_value.length;
        }).catch(() => {
          this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
        })
      }
    })
  },
  data() {
    return {
      quantity: 0,
      value: {
        cn_name: '',
        en_name: '',
        relation: null,
        contact: null,
        ic: '',
        age: null,
        occupation: '',
        work_place: '',
        boss_contact: '',
        work_address: '',
        parent_id: null
      },
      output_value: [],
    }
  },
  methods: {
    addParent() {
      createParent(this.$route.params.id).then(({data}) => {
        this.output_value.push(Object.assign({}, this.value));
        this.output_value[this.quantity].parent_id = data.data;
      }).then(() => {
        this.quantity++;
      })
    },
    dltParent() {
      if (this.quantity != 0) {
        deleteParent(this.output_value[this.output_value.length - 1].parent_id).then(() => {
          this.output_value.pop();
          this.quantity--;
        })
      }
    }
  }
}
</script>

<style>

</style>
