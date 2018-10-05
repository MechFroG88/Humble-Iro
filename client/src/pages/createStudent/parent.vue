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

      <div class="form-container names columns">
        <div class="form-group cn_name column col-6">
          <label class="form-label" for="cn_name">中文姓名：</label>
          <input class="form-input" type="text" id="cn_name" placeholder="中文姓名">
        </div>
        <div class="form-group en_name column col-6">
          <label class="form-label" for="en_name">英文名字：</label>
          <input class="form-input" type="text" id="en_name" placeholder="英文名字">
        </div>
      </div>

      <div class="form-container personal-info columns">
        <div class="form-group relationship column col-4">
          <label class="form-label" for="relationship">关系：</label>
          <select class="form-select" id="relationship">
            <option>请选择关系</option>
            <option>父亲</option>
            <option>母亲</option>
            <option>监护人</option>
          </select>
        </div>
        <div class="form-group ic_num column col-5">
          <label class="form-label" for="ic_num">身份证号码：</label>
          <input class="form-input" type="text" id="ic_num" placeholder="身份证号码">
        </div>
        <div class="form-group age column col-3">
          <label class="form-label" for="age">年龄：</label>
          <input class="form-input" type="number" id="age" placeholder="年龄">
        </div>
      </div>

      <div class="form-container work-info columns">
        <div class="form-group occupation column col-4">
          <label class="form-label" for="occupation">职业：</label>
          <input class="form-input" type="text" id="occupation" placeholder="职业">
        </div>
        <div class="form-group occupation-name column col-4">
          <label class="form-label" for="occupation-name">雇主/公司/工作单位名称：</label>
          <input class="form-input" type="text" id="occupation-name" placeholder="雇主/公司/工作单位名称">
        </div>
        <div class="form-group head-phone column col-4">
          <label class="form-label" for="head-phone">雇主联络号码：</label>
          <input class="form-input" type="text" id="head-phone" placeholder="雇主联络号码">
        </div>
      </div>

      <div class="form-group occupation-address">
        <label class="form-label" for="occupation-address">工作地址</label>
        <textarea class="form-input" id="occupation-address" placeholder="工作地址" rows="3"></textarea>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      quantity: 1
    }
  },
  methods: {
    addParent() {
      this.quantity++;
    },
    dltParent() {
      this.quantity--;
    }
  }
}
</script>

<style>

</style>
