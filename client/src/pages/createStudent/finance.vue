<template>
  <div id="_finance">
    <div class="financial_detail">
      <form class="income form-horizontal">
        <div class="income-title">家庭总收入</div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="dad_income">父亲收入</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="dad_income" 
            v-model.number="income.dad" 
            @keyup="updateIncomeTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="mom_income">母亲收入</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="mom_income" 
            v-model.number="income.mom" 
            @keyup="updateIncomeTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="guardian_income">监护人收入</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="guardian_income" 
            v-model.number="income.guardian" 
            @keyup="updateIncomeTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="other_income">其他家庭成员收入</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="other_income" 
            v-model.number="income.other_member" 
            @keyup="updateIncomeTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 aid-title mb-2">
            <label class="form-label" for="other_aid">其他福利支援</label>
            <div class="control-buttons mr-2">
              <div class="btn btn-sm btn-primary ml-2" @click="addAid">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltAid">
                <i class="icon icon-minus"></i>
              </div>
            </div>
          </div>
          <div class="aid-inputs col-12" v-for="(i, index) in income.other_aid.length" :key="i">
            <div class="col-7 col-sm-12 aid-name">
              {{i}}
              <input 
              class="form-input input-sm ml-2 mr-2" 
              type="text" 
              v-model="income.other_aid[index].title">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon addon-sm">RM</span>
              <input 
              class="form-input input-sm" 
              type="number" 
              id="other_aid" 
              v-model.number="income.other_aid[index].value" 
              @keyup="updateIncomeTotal">
            </div>
          </div>
        </div>
        
      </form>

      <form class="expenditure form-horizontal columns">
        <div class="expenditure-title">家庭总开销</div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="food">食品+厨房用品</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="food" 
            v-model.number="expenditure.food"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="rent">房租+房贷</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="rent" 
            v-model.number="expenditure.house"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="car">车贷</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="car" 
            v-model.number="expenditure.car"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="transport">交通费（车油费用）</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="transport" 
            v-model.number="expenditure.transport"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="utility">水电费</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="utility" 
            v-model.number="expenditure.utility"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="telecomm">电话+网络费</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="telecomm" 
            v-model.number="expenditure.telecomm"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="medic">医疗费（长期）/惯性疾病治疗费用</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="medic" 
            v-model.number="expenditure.medic"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 col-sm-12">
            <label class="form-label" for="astro">ASTRO月费</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon">RM</span>
            <input 
            class="form-input" 
            type="number" 
            id="astro" 
            v-model.number="expenditure.astro"
            @keyup="updateExpenditureTotal">
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 fee-title mb-2">
            <label class="form-label" for="school">学费</label>
            <div class="control-buttons mr-2">
              <div class="btn btn-sm btn-primary ml-2" @click="addFee">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltFee">
                <i class="icon icon-minus"></i>
              </div>
            </div>
          </div>
          <div class="fee-inputs col-12" v-for="(f, index) in expenditure.school.length" :key="f">
            <div class="col-7 col-sm-12 fee-name">
              {{f}}
              <input 
              class="form-input input-sm ml-2 mr-2" 
              type="text" 
              v-model="expenditure.school[index].title">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon addon-sm">RM</span>
              <input 
              class="form-input input-sm" 
              type="number" 
              id="school" 
              v-model.number="expenditure.school[index].value"
              @keyup="updateExpenditureTotal">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 talent-title mb-2">
            <label class="form-label" for="talent">补习费/才艺学费</label>
            <div class="control-buttons mr-2">
              <div class="btn btn-sm btn-primary ml-2" @click="addTalent">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltTalent">
                <i class="icon icon-minus"></i>
              </div>
            </div>
          </div>
          <div class="talent-inputs col-12" v-for="(t, index) in expenditure.tuition.length" :key="t">
            <div class="col-7 col-sm-12 talent-name">
              {{t}}
              <input 
              class="form-input input-sm ml-2 mr-2" 
              type="text" 
              v-model="expenditure.tuition[index].title">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon addon-sm">RM</span>
              <input 
              class="form-input input-sm" 
              type="number" 
              id="talent" 
              v-model.number="expenditure.tuition[index].value"
              @keyup="updateExpenditureTotal">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-7 other-title mb-2">
            <label class="form-label" for="other">其他</label>
            <div class="control-buttons mr-2">
              <div class="btn btn-sm btn-primary ml-2" @click="addOther">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltOther">
                <i class="icon icon-minus"></i>
              </div>
            </div>
          </div>
          <div class="other-inputs col-12" v-for="(o, index) in expenditure.other_spend.length" :key="o">
            <div class="col-7 col-sm-12 other-name">
              {{o}}
              <input 
              class="form-input input-sm ml-2 mr-2" 
              type="text" 
              v-model="expenditure.other_spend[index].title">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon addon-sm">RM</span>
              <input 
              class="form-input input-sm" 
              type="number" 
              id="other" 
              v-model.number="expenditure.other_spend[index].value"
              @keyup="updateExpenditureTotal">
            </div>
          </div>
        </div>
      </form>

      <div class="details">
        <div class="divider"></div>
        <div class="total_income form-group">
          <div class="title col-7 col-sm-12">
            <label class="form-label" for="total_income">家庭总收入</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon addon-sm">RM</span>
            <span 
            class="form-input input-sm" 
            type="number" 
            id="total_income">{{income.total}}</span>
          </div>
        </div>
        <div class="total_expenditure form-group">
          <div class="title col-7 col-sm-12">
            <label class="form-label" for="total_expenditure">家庭总支出</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon addon-sm">RM</span>
            <span 
            class="form-input input-sm" 
            type="number" 
            id="total_expenditure">{{expenditure.total}}</span>
          </div>
        </div>
        <div class="total_balance form-group">
          <div class="title col-7 col-sm-12">
            <label class="form-label" for="total_balance">净余额</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon addon-sm">RM</span>
            <span 
            class="form-input input-sm" 
            type="number" 
            id="total_balance">{{finance.balance}}</span>
          </div>
        </div>
      </div>
      <form class="extra">
        <div class="form-group auto_transfer">
          <label class="form-label">申请学校自动转账服务</label>
          <label class="form-radio">
            <input type="radio" name="auto_transfer" checked :value="1">
            <i class="form-icon"></i> 是
          </label>
          <label class="form-radio">
            <input type="radio" name="auto_transfer" :value="0">
            <i class="form-icon"></i> 否
          </label>
        </div>
        <div class="form-group remarks">
          <label class="form-label" for="remarks">备注</label>
          <textarea class="form-input" id="remarks" placeholder="备注" rows="3"></textarea>
        </div>
      </form>

      <form class="house">
        <div class="house-title">其他</div>
        <div class="form-group house-detail">
          <label class="form-label col-12">房屋种类</label>
          <select class="form-select house_state" v-model="house.house_state">
            <option :value="0">租赁</option>
            <option :value="1">已供完</option>
            <option :value="2">正供着</option>
          </select>
          <select class="form-select house_type" v-model="house.house_type">
            <option :value="0">独立式</option>
            <option :value="1">半独立式</option>
            <option :value="2">双层排屋</option>
            <option :value="3">单层排屋</option>
            <option :value="4">高级公寓</option>
            <option :value="5">公管公寓</option>
            <option :value="6">普通公寓</option>
            <option :value="7">组屋</option>
            <option :value="8">板屋</option>
            <option :value="9">其他</option>
          </select>
          <input 
          class="form-input mt-2" 
          type="text" 
          id="other_house_type" 
          placeholder="其他房屋种类"
          v-if="house.house_type == 9">
        </div>
        <div class="form-group aircond">
          <label class="form-label" for="aircond">冷气机数量</label>
          <input class="form-input" type="number" id="aircond" placeholder="冷气机数量">
        </div>
        <div class="form-group">
          <div class="col-7 transport-title mb-2">
            <label class="form-label" for="transport">汽车/摩托</label>
            <div class="control-buttons mr-2">
              <div class="btn btn-sm btn-primary ml-2" @click="addTransport">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltTransport">
                <i class="icon icon-minus"></i>
              </div>
            </div>
          </div>
          <div class="transport-inputs col-12" v-for="(tr, index) in transportArr.length" :key="tr">
            <div class="col-7 col-sm-12 transport-name">
              <div 
              class="transport-buttons"
              :class="isTransport(index, 1)"
              @click="transportArr[index].type = 1">
                <i class="fas fa-car mr-2"></i>
              </div>
              <div 
              class="transport-buttons"
              :class="isTransport(index, 0)"
              @click="transportArr[index].type = 0">
                <i class="fas fa-motorcycle"></i>
              </div>
              <input class="form-input input-sm ml-2 mr-2" type="text" placeholder="汽车/摩托款式">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <input class="form-input input-sm" type="text" id="transport" placeholder="（年份）">
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="btn" @click="check">check</div>
  </div>
</template>

<script>
export default {
  beforeMount() {
    var firstTransport = this.transport;
    this.transportArr.push(Object.assign({}, firstTransport));
  },
  data() {
    return {
      talentNum: 0,
      otherNum: 0,
      income: {
        dad: null,
        mom: null,
        guardian: null,
        other_member: null,
        total: 0,
        other_aid: []
      },
      expenditure: {
        car: null,
        food: null,
        house: null,
        medic: null,
        astro: null,
        total: 0,
        utility: null,
        telecomm: null,
        transport: null,
        school: [],
        tuition: [],
        other_spend: []
      },
      finance: {
        balance: 0,
      },
      house: {
        house_state: null,
        house_type: null
      },
      transportArr: [], //output transport

      // object structures
      arrayObject: {
        title: '',
        value: null
      },
      transport: {
        type: null,
        model: '',
        year : null
      },
    }
  },
  methods: {
    check() {
      console.log(this);
    },
    addAid() {
      this.income.other_aid.push(Object.assign({}, this.arrayObject));
    },
    dltAid() {
      if (this.income.other_aid.length != 0) {
        this.income.other_aid.pop();
      }
      this.updateIncomeTotal();
    },
    addFee() {
      this.expenditure.school.push(Object.assign({}, this.arrayObject));
    },
    dltFee() {
      if (this.expenditure.school.length != 1) {
        this.expenditure.school.pop();
      }
      this.updateExpenditureTotal();
    },
    addTalent() {
      this.expenditure.tuition.push(Object.assign({}, this.arrayObject));
    },
    dltTalent() {
      if (this.expenditure.tuition.length != 0) {
        this.expenditure.tuition.pop();
      }
      this.updateExpenditureTotal();
    },
    addOther() {
      this.expenditure.other_spend.push(Object.assign({}, this.arrayObject));
    },
    dltOther() {
      if (this.expenditure.other_spend.length != 0) {
        this.expenditure.other_spend.pop();
      }
      this.updateExpenditureTotal();
    },
    addTransport() {
      this.transportArr.push(Object.assign({}, this.transport));
    },
    dltTransport() {
      if (this.transportArr.length != 0) {
        this.transportArr.pop();
      }
    },
    isTransport(index, type) {
      return this.transportArr[index].type == type ? 'active' : '';
    },
    updateIncomeTotal() {
      this.income.total = this.income.dad 
                        + this.income.mom 
                        + this.income.guardian 
                        + this.income.other_member;

      for (let i = 0; i < this.income.other_aid.length; i++) {
        if (this.income.other_aid[i].value != null) {
          this.income.total += this.income.other_aid[i].value;
        }
      }

      this.finance.balance = this.income.total - this.expenditure.total;
    },
    updateExpenditureTotal() {
      this.expenditure.total  = this.expenditure.car 
                              + this.expenditure.food
                              + this.expenditure.house
                              + this.expenditure.medic
                              + this.expenditure.astro
                              + this.expenditure.utility
                              + this.expenditure.telecomm
                              + this.expenditure.transport;

      for (let i = 0; i < this.expenditure.school.length; i++) {
        if (this.expenditure.school[i].value != null) {
          this.expenditure.total += this.expenditure.school[i].value;
        }
      }
      for (let i = 0; i < this.expenditure.tuition.length; i++) {
        if (this.expenditure.tuition[i].value != null) {
          this.expenditure.total += this.expenditure.tuition[i].value;
        }
      }
      for (let i = 0; i < this.expenditure.other_spend.length; i++) {
        if (this.expenditure.other_spend[i].value != null) {
          this.expenditure.total += this.expenditure.other_spend[i].value;
        }
      }

      this.finance.balance = this.income.total - this.expenditure.total;
    }
  }
}
</script>

<style>

</style>
