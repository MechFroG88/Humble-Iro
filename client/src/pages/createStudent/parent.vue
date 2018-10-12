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
      <!-- <div>{{output_value}}</div> -->
      <div class="form-group cn_name">
        <label class="form-label" for="cn_name">中文姓名：</label>
        <input 
        class="form-input" 
        type="text" 
        id="cn_name" 
        placeholder="中文姓名"
        v-model="output_value[num - 1].cn_name">
      </div>
      <div class="form-group en_name">
        <label class="form-label" for="en_name">英文名字：</label>
        <input 
        class="form-input" 
        type="text" 
        id="en_name" 
        placeholder="英文名字"
        v-model="output_value[num - 1].en_name">
      </div>
      <div class="form-group relationship">
        <label class="form-label" for="relationship">关系：</label>
        <select class="form-select" id="relationship" v-model="output_value[num - 1].relation">
          <option :value="null" disabled>请选择关系</option>
          <option :value="0">父亲</option>
          <option :value="1">母亲</option>
          <option :value="2">监护人</option>
        </select>
      </div>
      <div class="form-group contact">
        <label class="form-label" for="contact">联络号码：</label>
        <input 
        class="form-input" 
        type="text" 
        id="contact" 
        placeholder="联络号码"
        v-model="output_value[num - 1].contact">
      </div>
      <div class="form-group ic_num">
        <label class="form-label" for="ic_num">身份证号码：</label>
        <input 
        class="form-input" 
        type="text" 
        id="ic_num" 
        placeholder="身份证号码"
        v-model="output_value[num - 1].ic">
      </div>
      <div class="form-group age">
        <label class="form-label" for="age">年龄：</label>
        <input 
        class="form-input" 
        type="number" 
        id="age" 
        placeholder="年龄"
        v-model="output_value[num - 1].age">
      </div>
      <div class="form-group occupation">
        <label class="form-label" for="occupation">职业：</label>
        <input 
        class="form-input" 
        type="text" 
        id="occupation" 
        placeholder="职业"
        v-model="output_value[num - 1].occupation">
      </div>
      <div class="form-group work_place">
        <label class="form-label" for="work_place">雇主/公司/工作单位名称：</label>
        <input 
        class="form-input" 
        type="text" 
        id="work_place" 
        placeholder="雇主/公司/工作单位名称"
        v-model="output_value[num - 1].work_place">
      </div>
      <div class="form-group boss_contact">
        <label class="form-label" for="boss_contact">雇主联络号码：</label>
        <input 
        class="form-input" 
        type="text" 
        id="boss_contact" 
        placeholder="雇主联络号码"
        v-model="output_value[num - 1].boss_contact">
      </div>

      <div class="form-group occupation-address">
        <label class="form-label" for="occupation-address">工作地址</label>
        <textarea 
        class="form-input" 
        id="occupation-address" 
        placeholder="工作地址" 
        rows="3"
        v-model="output_value[num - 1].work_address"></textarea>
      </div>
    </form>
  </div>
</template>

<script>
import { getParent, getParentBasic, createParent, editParent, deleteParent } from '@/api/student'
export default {
  props: {
    getData: Array
  },
  mounted() {
    getParentBasic(this.$route.params.id).then(({data}) => {
      if (data.data.length == 0) {
        createParent(this.$route.params.id).then(({data}) => {
          if (data.status == 200) {
            this.output_value.push(Object.assign({}, this.value));
            this.output_value[0].parent_id = data.data;
          }
        })
      } else {
        getParent(this.$route.params.id).then(({data}) => {
          for (let i = 0; i < data.data.length; i++) {
            this.output_value.push(Object.assign({}, data.data[i]));
            // this.output_value[i].parent_id = data.data[i].parent_id;
          }
        }).then(() => {
          this.quantity = this.output_value.length;
        })
        // this.output_value = data.data;
        // this.quantity = data.data.length;
      }
    })
  },
  data() {
    var value = {
      cn_name: '',
      en_name: '',
      relation: null,
      contact: null,
      ic: '',
      age: null,
      occupation: '',
      work_place: '',
      boss_contact: null,
      work_address: '',
      parent_id: null
    };
    return {
      quantity: 0,
      value,
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
      if (this.quantity != 1) {
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
