<template>
  <div class="login-container">
    <div class="login-box">
    <h1>账户登入</h1>

    <label for="username">用户名：</label>
    <el-input
    class="el-input-box"
    placeholder="username">
      <i slot="prefix" class="el-input__icon icon icon-user"></i>
    </el-input>
      
    <label for="password">密码:</label>
    <el-input
    class="el-input-box"
    placeholder="password">
      <i slot="prefix" class="el-input__icon icon icon-lock"></i>
    </el-input>

    <div class="rmb"> 
      <input 
      type="checkbox" 
      class="input-checkbox">   
      <span class="rmb-me">记得我</span>
    </div>
      <button class="button-signin">登入</button>

    </div>
  </div>
</template>

<script>
export default {

};
</script>

<style>
</style>
