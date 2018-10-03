<template>
 <layout>
   <div class="login-container">
     <div class="login-box">
      <h1>账户登入</h1>
      <label for="username">用户名：</label>
      <input 
      class="input-box"
      type="text" 
      name="username"
      placeholder="username">
        
      <label for="password">密码:</label>
      <input 
      class="input-box"
      type="text" 
      name="password"
      placeholder="password">

      <div class="rmb">    
       <input 
       class="input-checkbox"
       type="checkbox"
       name="checkbox">
       <span class="rmb-me">记得我</span>
      </div>
       <button class="button-signin">登入</button>

     </div>
   </div>
 </layout>
</template>

<script>
export default {

};
</script>

<style>
</style>
