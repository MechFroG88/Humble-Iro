<template>
  <div id="_finance">
    <div class="financial_detail columns">
      <div class="column">
        <form class="income form-horizontal">
          <div class="income-title">家庭总收入</div>
          <div class="form-group">
            <div class="col-7 col-sm-12">
              <label class="form-label" for="dad_income">父亲收入</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <input class="form-input" type="text" id="dad_income">
            </div>
          </div>
          <div class="form-group">
            <div class="col-7 col-sm-12">
              <label class="form-label" for="mom_income">母亲收入</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <input class="form-input" type="text" id="mom_income">
            </div>
          </div>
          <div class="form-group">
            <div class="col-7 col-sm-12">
              <label class="form-label" for="guardian_income">监护人收入</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <input class="form-input" type="text" id="guardian_income">
            </div>
          </div>
          <div class="form-group">
            <div class="col-7 col-sm-12">
              <label class="form-label" for="other_income">其他家庭成员收入</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <input class="form-input" type="text" id="other_income">
            </div>
          </div>
          <div class="form-group">
            <div class="col-12 aid-title mb-2">
              <label class="form-label" for="other_aid">其他福利支援</label>
              <div class="control-buttons">
                <div class="btn btn-sm btn-primary ml-2" @click="addAid">
                  <i class="icon icon-plus"></i>
                </div>
                <div class="btn btn-sm btn-primary ml-2" @click="dltAid">
                  <i class="icon icon-minus"></i>
                </div>
              </div>
            </div>
            <div class="aid-inputs" v-for="i in aidNum" :key="i">
              <div class="col-7 col-sm-12 aid-name">
                {{i}}
                <input class="form-input input-sm ml-2 mr-2" type="text">
              </div>
              <div class="col-5 col-sm-12 input-group">
                <span class="input-group-addon addon-sm">RM</span>
                <input class="form-input input-sm" type="text" id="other_aid">
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="total_income">
            <div class="title col-7 col-sm-12">
              <label class="form-label" for="total_income">总额</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <span class="form-input" type="text" id="total_income"></span>
            </div>
          </div>
        </form>
      </div>
      <div class="divider-vert"></div>
      <div class="column">
        <form class="expenditure form-horizontal columns">
          <div class="expenditure-title">家庭总开销</div>
          <div class="form-group">
            <div class="col-7 col-sm-12">
              <label class="form-label" for="food">食品+厨房用品</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <input class="form-input" type="text" id="food">
            </div>
          </div>
          <div class="form-group">
            <div class="col-7 col-sm-12">
              <label class="form-label" for="rent">房租+房贷</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <input class="form-input" type="text" id="rent">
            </div>
          </div>
          <div class="form-group">
            <div class="col-7 col-sm-12">
              <label class="form-label" for="car">车贷</label>
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon">RM</span>
              <input class="form-input" type="text" id="car">
            </div>
          </div>
          <div class="form-group">
            <div class="col-12 fee-title mb-2">
              <label class="form-label" for="school">学费</label>
              <div class="control-buttons">
                <div class="btn btn-sm btn-primary ml-2" @click="addFee">
                  <i class="icon icon-plus"></i>
                </div>
                <div class="btn btn-sm btn-primary ml-2" @click="dltFee">
                  <i class="icon icon-minus"></i>
                </div>
              </div>
            </div>
            <div class="fee-inputs" v-for="f in feeNum" :key="f">
              <div class="col-7 col-sm-12 fee-name">
                {{f}}
                <input class="form-input input-sm ml-2 mr-2" type="text">
              </div>
              <div class="col-5 col-sm-12 input-group">
                <span class="input-group-addon addon-sm">RM</span>
                <input class="form-input input-sm" type="text" id="school">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-12 talent-title mb-2">
              <label class="form-label" for="talent">补习费/才艺学费</label>
              <div class="control-buttons">
                <div class="btn btn-sm btn-primary ml-2" @click="addTalent">
                  <i class="icon icon-plus"></i>
                </div>
                <div class="btn btn-sm btn-primary ml-2" @click="dltTalent">
                  <i class="icon icon-minus"></i>
                </div>
              </div>
            </div>
            <div class="talent-inputs" v-for="t in talentNum" :key="t">
              <div class="col-7 col-sm-12 talent-name">
                {{t}}
                <input class="form-input input-sm ml-2 mr-2" type="text">
              </div>
              <div class="col-5 col-sm-12 input-group">
                <span class="input-group-addon addon-sm">RM</span>
                <input class="form-input input-sm" type="text" id="talent">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      aidNum: 0,
      feeNum: 1,
      talentNum: 1
    }
  },
  methods: {
    addAid() {
      this.aidNum++;
    },
    dltAid() {
      if (this.aidNum != 0) {
        this.aidNum--;
      }
    },
    addFee() {
      this.feeNum++;
    },
    dltFee() {
      if (this.feeNum != 1) {
        this.feeNum--;
      }
    },
    addTalent() {
      this.talentNum++;
    },
    dltTalent() {
      if (this.talentNum != 0) {
        this.talentNum--;
      }
    }
  }
}
</script>

<style>

</style>
