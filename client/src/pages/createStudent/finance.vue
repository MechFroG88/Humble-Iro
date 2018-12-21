<template>
  <div id="_finance">
    <div class="financial_detail">
      <form class="income form-horizontal">
        <div class="income-title">家庭总收入</div>
        <div class="form-group">
          <div class="col-12 aid-title mb-2">
            <label class="form-label" for="other_aid">收入来源</label>
            <div class="control-buttons">
              <div class="btn btn-sm btn-primary ml-2" @click="addIncome">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltIncome">
                <i class="icon icon-minus"></i>
              </div>
            </div>
          </div>
          <div class="aid-inputs col-12" v-for="(i, index) in income.length" :key="i">
            <div class="col-7 col-sm-12 aid-name">
              <input 
              class="form-input input-sm mr-2" 
              name="member"
              type="text" 
              placeholder="请输入收入来源..."
              v-validate="'required'"
              v-model="income[index].member">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon addon-sm">RM</span>
              <input 
              class="form-input input-sm" 
              name="income"
              type="number" 
              id="other_aid" 
              data-vv-as="field"
              v-validate="'required|decimal:2'"
              v-model.number="income[index].income" 
              @keyup="updateTotal">
            </div>
          </div>
          <div class="toast toast-error mt-1" v-if="errors.has('member') || errors.has('income')">
            {{errors.first('member') || errors.first('income')}}
          </div>
        </div>
      </form>

      <form class="expenditure form-horizontal">
        <div class="expenditure-title">家庭总开销</div>
        <div class="form-group">
          <div class="col-12 fee-title mb-2">
            <label class="form-label" for="school">开销来源</label>
            <div class="control-buttons">
              <div class="btn btn-sm btn-primary ml-2" @click="addExpend">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="dltExpend">
                <i class="icon icon-minus"></i>
              </div>
            </div>
          </div>
          <div class="fee-inputs col-12" v-for="(f, index) in expenditure.length" :key="f">
            <div class="col-7 col-sm-12 fee-name">
              <input 
              class="form-input input-sm mr-2" 
              name="object"
              type="text" 
              placeholder="请输入开销来源..."
              v-validate="'required'"
              v-model="expenditure[index].object">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <span class="input-group-addon addon-sm">RM</span>
              <input 
              class="form-input input-sm" 
              name="expenditure"
              type="number" 
              id="expenditure" 
              data-vv-as="field"
              v-validate="'required|decimal:2'"
              v-model.number="expenditure[index].expenditure"
              @keyup="updateTotal">
            </div>
          </div>
          <div class="toast toast-error mt-1" v-if="errors.has('object') || errors.has('expenditure')">
            {{errors.first('object') || errors.first('expenditure')}}
          </div>
        </div>
      </form>

      <div class="details">
        <div class="detail-title">概要</div>
        <div class="total_income form-group">
          <div class="title col-7 col-sm-12">
            <label class="form-label" for="total_income">家庭总收入</label>
          </div>
          <div class="col-5 col-sm-12 input-group">
            <span class="input-group-addon addon-sm">RM</span>
            <span 
            class="form-input input-sm" 
            type="number" 
            id="total_income">{{income_total}}</span>
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
            id="total_expenditure">{{expenditure_total}}</span>
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
            <input type="radio" name="auto_transfer" 
            v-model="finance.auto_transfer" :value="1">
            <i class="form-icon"></i> 是
          </label>
          <label class="form-radio">
            <input type="radio" name="auto_transfer" 
            v-model="finance.auto_transfer" :value="0">
            <i class="form-icon"></i> 否
          </label>
        </div>
        <div class="form-group remarks">
          <label class="form-label" for="remarks">备注</label>
          <textarea 
          class="form-input" 
          id="remarks" 
          name="remarks"
          placeholder="备注" 
          rows="3"
          v-model="finance.remarks"></textarea>
        </div>
      </form>

      <form class="house">
        <div class="house-title">其他</div>
        <div class="form-group house-detail">
          <div class="home-title col-12 mb-2">
            <label class="form-label">房屋</label>
            <div class="control-buttons">
              <div class="btn btn-sm btn-primary ml-2" @click="addHouse">
                <i class="icon icon-plus"></i>
              </div>
              <div class="btn btn-sm btn-primary ml-2" @click="deleteHouse">
                <i class="icon icon-minus"></i>
              </div>
            </div> 
          </div>
          <div class="house-form col-12" v-for="(h, index) in houseNum" :key="h">
            <div class="col-12 form-selects" v-once>
              <select 
              class="form-select house_state col-5" 
              name="house_state"
              v-validate="'required'"
              v-model.number="house[index].house_state">
                <option value="" disabled>房子状态</option>
                <option :value="0">租赁</option>
                <option :value="1">已供完</option>
                <option :value="2">正供着</option>
              </select>
              <input 
              class="form-input house_type col-7" 
              type="text" 
              name="house_type"
              id="house_type" 
              placeholder="房屋种类"
              v-validate="'required'"
              v-model="house[index].house_type">
            </div>
            <div class="toast toast-error mt-1" v-if="errors.has('house_state') || errors.has('house_type')">
              {{errors.first('house_state') || errors.first('house_type')}}
            </div>
          </div>
        </div>
        <div class="form-group aircond">
          <label class="form-label" for="aircond">冷气机数量</label>
          <input class="form-input" 
          type="number" 
          id="aircond" 
          name="aircond"
          placeholder="冷气机数量" 
          v-validate="'required|numeric'"
          v-model="aircond.amount">
          <div class="toast toast-error mt-1" v-if="errors.has('aircond')">
            {{errors.first('aircond')}}
          </div>
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
              class="transport-buttons col-1"
              :class="isTransport(index, 1)"
              @click="transportArr[index].transport_type = 1">
                <i class="fas fa-car mr-2"></i>
              </div>
              <div 
              class="transport-buttons col-1"
              :class="isTransport(index, 0)"
              @click="transportArr[index].transport_type = 0">
                <i class="fas fa-motorcycle"></i>
              </div>
              <input 
              class="form-input input-sm ml-2 mr-2" 
              type="text" 
              id="model"
              name="model"
              placeholder="汽车/摩托款式"
              v-validate="'required'"
              v-model="transportArr[index].model">
            </div>
            <div class="col-5 col-sm-12 input-group">
              <input 
              class="form-input input-sm" 
              type="number"
              id="year" 
              name="year"
              placeholder="（年份）"
              v-validate="'required|digits:4'"
              v-model="transportArr[index].year">
            </div>
          </div>
          <div class="toast toast-error mt-1" v-if="errors.has('model') || errors.has('year')">
            {{errors.first('model') || errors.first('year')}}
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { 
  getIncome, createIncome, deleteIncome,
  getExpenditure, createExpenditure, deleteExpenditure,
  getFinance,
  getHouse, createHouse, deleteHouse,
  getAircond,
  getTransport, createTransport, deleteTransport
} from "@/api/student";
export default {
  beforeMount() {
    getIncome(this.$route.params.id).then(({data}) => {
      if (data.data.length != 0) {
        this.income = data.data;
        for (let i = 0; i < data.data.length; i++) {
          this.income_total += parseFloat(this.income[i].income);
        }
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getExpenditure(this.$route.params.id).then(({data}) => {
      if (data.data.length != 0) {
        this.expenditure = data.data
        for (let i = 0; i < data.data.length; i++) {
          this.expenditure_total += parseFloat(this.expenditure[i].expenditure);
        }
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getFinance(this.$route.params.id).then(({data}) => {
      if (data.data.length != 0) {
        this.finance = data.data;
      } else {
        this.finance.balance = this.income_total - this.expenditure_total;
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getHouse(this.$route.params.id).then(({data}) => {
      if (data.data.length != 0) {
        this.house = data.data;
        this.houseNum = this.house.length;
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getAircond(this.$route.params.id).then(({data}) => {
      if (data.data.length != 0) {
        this.aircond.amount = data.data[0].amount;
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
    getTransport(this.$route.params.id).then(({data}) => {
      if (data.data.length != 0) {
        this.transportArr = data.data;
      }
    }).catch(() => {
      this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
    })
  },
  data() {
    return {
      income: [],
      expenditure: [],
      finance: {
        auto_transfer: 1,
        remarks: '',
        balance: 0,
      },
      house: [],
      aircond: {
        amount: null
      },
      transportArr: [], //output transport

      income_total: 0,
      expenditure_total: 0,
      houseNum: 0,

      // object structures
      incomeObject: {
        finance_income_id: null,
        member: '',
        income: null
      },
      expenditureObject: {
        finance_expenditure_id: null,
        object: '',
        expenditure: null,
      },
      houseObject: {
        house_state: null,
        house_type: '',
        house_id: null
      },
      transport: {
        transport_id: null,
        transport_type: 0,
        model: '',
        year : null
      },
    }
  },
  methods: {
    addIncome() {
      createIncome(this.$route.params.id).then(({data}) => {
        this.income.push(Object.assign({}, this.incomeObject));
        this.income[this.income.length - 1].finance_income_id = data.data;
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    dltIncome() {
      if (this.income.length != 0) {
        deleteIncome(this.income[this.income.length - 1].finance_income_id).then(() => {
          this.income.pop();
          this.updateTotal();
        }).catch(() => {
          this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
        })
      }
    },
    addExpend() {
      createExpenditure(this.$route.params.id).then(({data}) => {
        this.expenditure.push(Object.assign({}, this.expenditureObject));
        this.expenditure[this.expenditure.length - 1].finance_expenditure_id = data.data;
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    dltExpend() {
      if (this.expenditure.length != 0) {
        deleteExpenditure(this.expenditure[this.expenditure.length - 1].finance_expenditure_id).then(() => {
          this.expenditure.pop();
          this.updateTotal();
        }).catch(() => {
          this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
        })
      }
    },
    addHouse() {
      createHouse(this.$route.params.id).then(({data}) => {
        this.houseNum++;
        this.house.push(this.houseObject);
        this.house[this.house.length - 1].house_id = data.data;
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    deleteHouse() {
      if (this.houseNum != 0) {
        deleteHouse(this.house[this.house.length - 1].house_id).then(() => {
          this.houseNum--;
          this.house.pop();
        }).catch(() => {
          this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
        })
      }
    },
    addTransport() {
      createTransport(this.$route.params.id).then(({data}) => {
        this.transportArr.push(Object.assign({}, this.transport));
        this.transportArr[this.transportArr.length - 1].transport_id = data.data;
      }).catch(() => {
        this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
      })
    },
    dltTransport() {
      if (this.transportArr.length != 0) {
        deleteTransport(this.transportArr[this.transportArr.length - 1].transport_id).then(() => {
          this.transportArr.pop();
        }).catch(() => {
          this.$message.error('哎哟！出现了某些问题，请刷新页面重试。')
        })
      }
    },
    isTransport(index, type) {
      return this.transportArr[index].transport_type == type ? 'active' : '';
    },
    updateTotal() {
      this.income_total = 0;
      for (let i = 0; i < this.income.length; i++) {
        if (this.income[i].income != null) {
          this.income_total += parseFloat(this.income[i].income);
        }
      }

      this.expenditure_total = 0;
      for (let i = 0; i < this.expenditure.length; i++) {
        if (this.expenditure[i].expenditure != null) {
          this.expenditure_total += parseFloat(this.expenditure[i].expenditure);
        }
      }
      this.finance.balance = this.income_total - this.expenditure_total;
    }
  }
}
</script>
