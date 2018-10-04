<template>
  <div class="studentform-container">
    <div class="studentform-box">
      <h2>个人资料</h2>
      <div class="name-container">
        <div class="name name1 form-group">
          <label class="form-label" for="cn-name">中文姓名:</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="cn-name" 
          placeholder="中文姓名">
        </div>
        <div class="name form-group">
          <label class="form-label" for="eng-name">英文姓名</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="eng-name" 
          placeholder="英文姓名">
        </div>
      </div>
        
      <div class="info1-container">   
        <div class="info1 small form-group">  
          <label class="form-label" for="student-id">学号</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="student-id" 
          placeholder="学号">
        </div>  

        <div class="info1 small form-group">
          <label class="form-label" for="class">班级</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="class" 
          placeholder="班级">
        </div>  

        <div class="info1 small form-group">
          <label class="form-label" for="sex">性别</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="sex" 
          placeholder="性别">
        </div>

        <div class="info1 big form-group">  
          <label class="form-label" for="ic-number">身份证号码</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="ic-number" 
          placeholder="身份证号码">
        </div>  
      </div>  

      <div class="info2-container">   
        <div class="info2 short form-group">
          <label class="form-label" for="age">年龄</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="age" 
          placeholder="年龄">
        </div>  

        <div class="info2 short form-group">
          <label class="form-label" for="date-of-birth">出生日期</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="date-of-birth" 
          placeholder="出生日期">
        </div> 

        <div class="info2 short form-group">
          <label class="form-label" for="ancestral">祖籍</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="ancestral" 
          placeholder="祖籍">
        </div>  

        <div class="info2 long form-group">
          <label class="form-label" for="phonenum">联络号码</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="phonenum" 
          placeholder="联络号码">
        </div>  
      </div>

      <div class="info3-container">   
        <div class="info3 short form-group">
          <label class="form-label" for="attitude">操行</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="attitude" 
          placeholder="操行">
        </div>  

        <div class="info3 long form-group">
          <label class="form-label" for="average-score">全年总平均</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="average-score" 
          placeholder="全年总平均">
        </div> 

        <div class="info3 long form-group">
          <label class="form-label" for="financial-aid">今年所获得的助学金</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="financial-aid" 
          placeholder="今年所获得的助学金">
        </div>  
      </div>

      <div class="info4-container">   
        <div class="info4 form-group">
          <label class="form-label" for="address">住址</label>
          <input 
          class="form-input studentform" 
          type="text" 
          id="address" 
          placeholder="住址">
        </div>  
      </div>
      
    </div>
  </div>
</template>


<script>
export default {

}
</script>

<style>

</style>
