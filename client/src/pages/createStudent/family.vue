<template>
  <div id="_family">
    <form class="family-form">
      <div class="form-container single-family columns">
        <div class="form-group single_parent column col-3 columns col-gapless">
          <label class="form-label col-12">单亲家庭</label>
          <label class="form-radio col-6">
            <input type="radio" name="single_parent" checked
            v-model="value.single_parent" :value="1">
            <i class="form-icon"></i> 是
          </label>
          <label class="form-radio col-6">
            <input type="radio" name="single_parent"
            v-model="value.single_parent" :value="0">
            <i class="form-icon"></i> 否
          </label>
        </div>
        <div class="form-group single_reason column col-3">
          <label class="form-label" for="single_reason">单亲原因</label>
          <input 
          class="form-input" 
          type="text" 
          id="single_reason" 
          placeholder="单亲原因">
        </div>
        <div class="form-group disable_member column col-3 columns col-gapless">
          <label class="form-label col-12">残障家人</label>
          <label class="form-radio col-6">
            <input type="radio" name="disable_member" checked
            v-model="value.disable_member" :value="1">
            <i class="form-icon"></i> 有
          </label>
          <label class="form-radio col-6">
            <input type="radio" name="disable_member"
            v-model="value.disable_member" :value="0">
            <i class="form-icon"></i> 无
          </label>
        </div>
        <div class="form-group disable_relation column col-3">
          <label class="form-label" for="disable_relation">与残障家人的关系</label>
          <input 
          class="form-input" 
          type="text" 
          id="disable_relation" 
          placeholder="与残障家人的关系">
        </div>
      </div>
      <div class="form-container noofpax columns">
        <div class="form-group family_size column col-3">
          <label class="form-label" for="family_size">家庭人数</label>
          <input class="form-input" type="number" id="family_size" placeholder="家庭人数">
        </div>
        <div class="form-group column col-2">
          <label class="form-label" for="work_people">就业人数</label>
          <input class="form-input" type="number" id="work_people" placeholder="就业人数">
        </div>
        <div class="form-group column col-2">
          <label class="form-label" for="primary_people">就读小学人数</label>
          <input class="form-input" type="number" id="primary_people" placeholder="就读小学人数">
        </div>
        <div class="form-group column col-2">
          <label class="form-label" for="smk_people">就读国中人数</label>
          <input class="form-input" type="number" id="smk_people" placeholder="就读国中人数">
        </div>
        <div class="form-group column col-3">
          <label class="form-label" for="smp_people">就读独中/私立学校人数</label>
          <input class="form-input" type="number" id="smp_people" placeholder="就读独中/私立学校人数">
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      value: {
        single_parent: '',
        disabled_member: ''
      }
    }
  }
}
</script>

<style>

</style>
