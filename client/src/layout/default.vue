<template>
  <div id="_default">
    <div class="header-container">
      <div class="nav-header">
        <h3 class="title">
          <img src="../assets/logo/chkl-logo.jpg">
          <span>隆中华学生福利处</span>
        </h3>
        <el-dropdown 
        class="dropdown"
        trigger="click"
        @command="goTo">
          <span class="el-dropdown-link">
            <i class="icon icon-user"></i>
            {{user.username}} <i class="el-icon-arrow-down el-icon--right"></i>
          </span>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item command="a">
              <i class="icon icon-lock"></i> 更换密码
            </el-dropdown-item>
            <el-dropdown-item command="login">
              <i class="icon icon-log-out"></i> 登出
            </el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>
      </div>
    </div>
    <div class="body">
      <el-col class="sidebar" :span="5" :sm="3">
        <ol>
          <li class="student">
            <router-link :to="{'name': 'student'}">
              <i class="icon icon-list"></i> 学生管理 
            </router-link>
          </li>
          <li class="aid">
            <router-link :to="{'name': 'aid'}">
              <i class="icon icon-trending-up"></i> 助学金申请
            </router-link>
          </li>
          <li class="list">
            <router-link :to="{'name': 'list'}">
              <i class="icon icon-file-text"></i> 助学金列表
            </router-link>
          </li>
          <li class="users">
            <router-link :to="{'name': 'users'}">
              <i class="icon icon-users"></i>用户管理
            </router-link>
          </li>
        </ol>
      </el-col>

      <el-col class="content" :span="19" :sm="21">
        <slot></slot>
      </el-col>
    </div>
  </div>
</template>

<script>
import { getCurrentUser } from '@/api/user'
import { deleteToken } from '@/utils/auth'

export default {
  data: () => ({
    user: {
      username: ""
    }
  }),
  mounted() {
    getCurrentUser().then(({data}) => {
      this.user.username = data.data.username;
    }) 
  },
  methods: {
    goTo(command) {
      const url = command;
      if (url == "login") {
        deleteToken();
        console.log("logged out");
      }
      this.$nextTick(function() {
        this.$router.push({ path: `/${url}` });
      })
    }
  }
};
</script>