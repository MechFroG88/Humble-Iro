<template>
  <layout>
    <form id="_changePassword" class="change-password" @submit.prevent="submit">
      <div class="form-group">
        <label class="form-label">旧密码</label>
        <input v-model="password.old" type="password" name="old_password" class="form-input">
      </div>
      <div class="form-group">
        <label class="form-label">新密码</label>
        <input v-model="password.new" type="password" name="new_password" class="form-input">
      </div>
      <button type="submit" class="btn btn-primary">更改</button>
    </form>
  </layout>
</template>

<script>
import layout from '@/layout/default'
import { changePassword } from '@/api/user'

export default {
  components: {
    layout
  },
  data: () => ({
    password: {
      new: "",
      old: ""
    }
  }),
  methods: {
    submit() {
      this.$validator.validate().then(result => {
        if (result) {
          changePassword(this.password).then(({data}) => {
            if(data.status == 200){
              this.$message({
                message: '成功更改密码！',
                type: 'success'
              });
            }
          }).catch(() => {
            this.$message.error('更改密码失败！');
          })
        }
      });
    }
  }
}
</script>


