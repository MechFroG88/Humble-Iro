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
        <label class="form-label" for="cn_name">中文姓名：</label>
        <input class="form-input" type="text" id="cn_name" placeholder="中文姓名...">
      </div>
      <div class="form-group en_name">
        <label class="form-label" for="en_name">英文名字：</label>
        <input class="form-input" type="text" id="en_name" placeholder="英文名字...">
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
