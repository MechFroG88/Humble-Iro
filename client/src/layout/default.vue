<template>
  <div id="_default" v-once>
    <header class="header">
      <h3 class="title">
        <img src="../assets/logo/chkl-logo.jpg">
        隆中华学生福利处
      </h3>
      <el-dropdown 
      class="dropdown"
      trigger="click">
        <span class="el-dropdown-link">
          某某某 <i class="el-icon-arrow-down el-icon--right"></i>
        </span>
        <el-dropdown-menu slot="dropdown">
          <el-dropdown-item command="a">更换密码</el-dropdown-item>
          <el-dropdown-item command="b">登出</el-dropdown-item>
        </el-dropdown-menu>
      </el-dropdown>
    </header>
    <div class="body">
      <el-col class="sidebar" :span="5">
        <el-menu class="el-menu-vertical">
          <el-menu-item class="student" index="1">
            <span slot="title">学生档案</span>
          </el-menu-item>
          <el-menu-item class="aid" index="2">
            <span slot="title">助学金申请</span>
          </el-menu-item>
          <el-menu-item class="list" index="3">
            <span slot="title">助学金列表</span>
          </el-menu-item>
          <el-menu-item class="users" index="4">
            <span slot="title">用户管理</span>
          </el-menu-item>
        </el-menu>
      </el-col>

      <el-col class="content" :span="19">
        <slot></slot>
      </el-col>
    </div>
  </div>
</template>

<script>
export default {

};
</script>

<style>
</style>
