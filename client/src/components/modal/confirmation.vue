<template>
  <div class="modal" id="editGroup" :class="{'active': active }">
    <a @click="active = false" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container">
      <div class="modal-header">
        <a @click="active = false" class="btn btn-clear float-right" aria-label="Close"></a>
        <div class="modal-title h5">确认删除？</div>
      </div>
      <div class="modal-body">
        删除后将无法恢复，请确认。
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" @click="active = false">取消</button>
        <button class="btn btn-primary btn-error" @click="confirmClick">确认</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['confirm'],
  data() {
    return {
      active: false,
    }
  },
  methods: {
    confirmClick() {
      this.confirm()
      this.active = false
    }
  }
}
</script>
