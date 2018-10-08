<template>
  <div class="login-container">
    <el-form class="login-box" ref="loginForm" :rules="rules" :model="user">
    <h1>账户登入</h1>
    <el-form-item label="用户名" prop="username">
      <el-input
      class="el-input-box"
      v-model="user.username"
      placeholder="用户名">
        <i slot="prefix" class="el-input__icon icon icon-user"></i>
      </el-input>
    </el-form-item>
    <el-form-item label="密码" prop="password">
      <el-input
      type="password"
      class="el-input-box"
      v-model="user.password"
      placeholder="密码">
        <i slot="prefix" class="el-input__icon icon icon-lock"></i>
      </el-input>
    </el-form-item>
    <el-button style="width: 100%;margin-bottom:1rem;" type="primary" @click="login">登入</el-button>

    </el-form>
  </div>
</template>

<script>
import { loginWithUsername, setToken } from '@/api/user'

export default {
  data: () => ({
    user: {
      username: "",
      password: "",
    },
    rules: {
      username: [
        { required: true, message: "请输入用户名。" },
        { min: 5, message: "用户名至少需5个字符。"   }
      ],
      password: [
        { required: true, message: "请输入密码。" },
      ]
    }
  }),
  methods: {
    login(){
      this.$refs['loginForm'].validate((valid) => {
        if (valid) {
          loginWithUsername(this.user.username, this.user.password).then((res) => {
            if(res.status == 200){
              setToken(res.data.data)
            } else {
              this.$message.error('用户名或密码输入错误。');
            }
          })
        }
      });
      
    }
  }
};
</script>
