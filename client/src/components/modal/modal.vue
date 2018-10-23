<template>
  <div class="modal" id="editGroup" :class="{'active': active }">
    <a @click="closeClick" class="modal-overlay" aria-label="Close"></a>
    <div class="modal-container loading-lg" :class="{ 'loading' : loading }">
      <div class="modal-header">
        <a @click="closeClick" class="btn btn-clear float-right" aria-label="Close"></a>
        <div class="modal-title h5">{{title}}</div>
      </div>
      <div class="modal-body">
        <div class="toast toast-error" v-if="error">
          {{ errorMessage }}
        </div>
        <slot name="content"></slot>
      </div>
      <div class="modal-footer">
        <slot name="footer"></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String
    }
  },
  data() {
    return {
      active : false,
      loading: false,
      error  : false,
      errorMessage: "发生错误，请检查表单。"
    }
  },
  methods: {
    closeClick() {
      this.active  = false;
      this.loading = false;
      this.error   = false;
      this.errors.clear();
      this.$emit('close');
    }
  }
}
</script>
