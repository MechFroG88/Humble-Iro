<template>
  <div class="student-form">
    <h2>个人资料</h2>
    <form class="columns">
      <div class="column col-6">
        <div class="form-group">
          <label class="form-label" for="cn-name">中文姓名</label>
          <input 
            class="form-input" 
            type="text" 
            id="cn-name" 
            placeholder="中文姓名">
        </div>
      </div>
      <div class="column col-6">
        <div class="form-group">
          <label class="form-label" for="eng-name">英文姓名</label>
          <input 
            class="form-input" 
            type="text" 
            id="eng-name" 
            placeholder="英文姓名">
        </div>
      </div>
      <div class="column col-4">
        <div class="form-group">
          <label class="form-label" for="student-id">学号</label>
          <input 
            class="form-input" 
            type="text" 
            id="student-id" 
            placeholder="学号">
        </div>
      </div>
      <div class="column col-4">
        <div class="form-group">
          <label class="form-label" for="class">班级</label>
          <input 
            class="form-input" 
            type="text" 
            id="class" 
            placeholder="班级">
        </div>
      </div>
      <div class="column col-3">
        <div class="form-group columns col-gapless">
          <label class="form-label col-12">性别</label>
          <label class="form-radio col-6">
            <input type="radio" name="gender" checked>
            <i class="form-icon"></i> 男
          </label>
          <label class="form-radio col-6">
            <input type="radio" name="gender">
            <i class="form-icon"></i> 女
          </label>
        </div>
      </div>
      <div class="column col-12">
        <div class="form-group">  
          <label class="form-label" for="ic-number">身份证号码</label>
          <input 
          class="form-input" 
          type="text" 
          id="ic-number" 
          placeholder="身份证号码">
        </div>  
      </div>
      <div class="column col-5">
        <div class="form-group">
          <label class="form-label" for="phonenum">联络号码</label>
          <input 
            class="form-input" 
            type="text" 
            id="phonenum" 
            placeholder="联络号码">
        </div>
      </div>
      <div class="column col-3">
        <div class="form-group">
          <label class="form-label" for="ancestral">祖籍</label>
          <input 
            class="form-input" 
            type="text" 
            id="ancestral" 
            placeholder="祖籍">
        </div>  
      </div>
      <div class="column col-4">
        <div class="form-group">
          <label class="form-label" for="date-of-birth">出生日期</label>
          <input 
            class="form-input" 
            type="date" 
            id="date-of-birth" 
            placeholder="出生日期">
        </div>
      </div>
      <div class="column col-3">
        <div class="form-group">
          <label class="form-label" for="attitude">操行</label>
          <input 
          class="form-input" 
          type="text" 
          id="attitude" 
          placeholder="操行">
        </div>  
      </div>
      <div class="column col-3">
        <div class="form-group">
          <label class="form-label" for="average-score">全年总平均</label>
          <input 
          class="form-input" 
          type="text" 
          id="average-score" 
          placeholder="全年总平均">
        </div>
      </div>
      <div class="column col-6">
        <div class="form-group">
          <label class="form-label" for="financial-aid">今年所获得的助学金</label>
          <input 
            class="form-input" 
            type="text" 
            id="financial-aid" 
            placeholder="今年所获得的助学金">
        </div>
      </div>
      <div class="column col-12">
        <div class="form-group">
          <label class="form-label" for="address">住址</label>
          <textarea
          class="form-input" 
          type="text" 
          id="address" 
          rows="3"
          placeholder="住址"></textarea>
        </div>
      </div>
    </form>
  </div>
</template>