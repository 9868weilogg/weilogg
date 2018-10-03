
<template>
	<div>
		
		<h1 class="pageTitle">Valuation<span>VALUATION</span></h1>
		
		<div id="searchStockForm">
			<input type="text" v-model="stock_id" placeholder="Search Stock Here" v-on:input="searchStock(stock_id)">
			<button v-on:click="getData(stock_id)">Search</button>
			<div id="searchResult" v-if="showSearch" v-for="s_c in stocks_code">
				<a v-on:click="returnValue(s_c.id)">{{ s_c.name }} - {{s_c.id }}</a>
			</div>

		</div>
		<div id="uploadFundamental" v-if="showUploadForm">
			<h2>Upload Fundamental Data for Analyse</h2>
			
				<table>
					<tr>
						<td><label>Stock</label></td>
						<td><input type="text" v-model="stock_id"></td>
						<td><label>Financial Year End</label></td>
						<td><input type="text" v-model="fye"></td>
					</tr>
					<tr>
						<td><label>PE ratio</label></td>
						<td><input type="text" v-model="pe"></td>
						<td><label>Net Margin</label></td>
						<td><input type="text" v-model="net_margin"></td>
					</tr>
					<tr>
						
						
						<td><label>ROE</label></td>
						<td><input type="text" v-model="roe"></td>
						<td><label>Gearing Ratio</label></td>
						<td><input type="text" v-model="gearing"></td>
						
					</tr>
					<tr>
						<td><label>Grandpine Cash Flow</label></td>
						<td><input type="text" v-model="gp_cashflow"></td>
						<td><label>Dividend Yield</label></td>
						<td><input type="text" v-model="dy"></td>

					</tr>
					<tr>
						
						<td><label>Revenue</label></td>
						<td><input type="text" v-model="revenue"></td>
						<td><label>Earning Per Share</label></td>
						<td><input type="text" v-model="eps"></td>
					</tr>
					<tr>
						
						<td><label>Dividend Per Share</label></td>
						<td><input type="text" v-model="dps"></td>
						<td><label>Cash & Equivalent</label></td>
						<td><input type="text" v-model="cash_eq"></td>
						
					</tr>
					<tr>
						
						<td><label>Short Term Loan</label></td>
						<td><input type="text" v-model="stl"></td>
						<td><label>Long Term Loan</label></td>
						<td><input type="text" v-model="ltl"></td>
					</tr>
					<tr>
						
						<td><label>Debt-Equity Ratio</label></td>
						<td><input type="text" v-model="debt_equity"></td>
						<td><label>Book Value</label></td>
						<td><input type="text" v-model="bv"></td>
						
					</tr>
					<tr>
						<td><label>Free Cash Flow</label></td>
						<td><input type="text" v-model="fcf"></td>
						<td><label>ROA</label></td>
						<td><input type="text" v-model="roa"></td>
					</tr>
					<tr>
						
						<td><label>Asset Turnover</label></td>
						<td><input type="text" v-model="asset_turnover"></td>
						<td><label>Net Profit Growth Rate</label></td>
						<td><input type="text" v-model="np_gr"></td>
					</tr>
				</table>
				<button v-on:click="uploadForm">Upload</button>
			
		</div>

		<div id="stockFundamental" v-if="showFundamental">
			<h2>Fundamental Data</h2>
			<button v-on:click="showUploadForm = true">Update Data</button>
			<button v-on:click="toggleValuation(stock_id)">Valuation</button>
			<table>
				<thead>
					<th>FYE</th>
					<th>Stock</th>
					<th>PE</th>
					<th>DY</th>
					<th>EPS</th>
					<th>DPS</th>
					<th>Net Profit GR</th>
					<th>Revenue</th>
					<th>Cash & Equivalent</th>
					<th>Short Term Loan</th>
					<th>Long Term Loan</th>
					<th>Book Value</th>
					<th>Gearing</th>
					<th>Debt/Equity</th>
					<th>FCF</th>
					<th>GP Cashflow</th>
					<th>Net Margin</th>
					<th>ROE</th>
					<th>ROA</th>
					<th>Asset Turnover</th>
				</thead>
				<tbody>
					<tr v-for="s_f in stock_fundamental">
						<td>{{ s_f.FYE }}</td>
						<td>{{ s_f.stock_id }}</td>
						<td>{{ s_f.PE }}</td>
						<td>{{ s_f.DY }}</td>
						<td>{{ s_f.EPS }}</td>
						<td>{{ s_f.DPS }}</td>
						<td>{{ s_f.net_profit_gr }}</td>
						<td>{{ s_f.revenue }}</td>
						<td>{{ s_f.cash_equivalent }}</td>
						<td>{{ s_f.short_term_loan }}</td>
						<td>{{ s_f.long_term_loan }}</td>
						<td>{{ s_f.book_value }}</td>
						<td>{{ s_f.gearing }}</td>
						<td>{{ s_f.debt_equity }}</td>
						<td>{{ s_f.FCF }}</td>
						<td>{{ s_f.gp_cashflow }}</td>
						<td>{{ s_f.net_margin }}</td>
						<td>{{ s_f.roe }}</td>
						<td>{{ s_f.roa }}</td>
						<td>{{ s_f.asset_turnover }}</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<div id="valuationResult" v-if="showValuation">
			<h2>Valuation</h2>
			<input type="text" v-model="earning_growth_rate" v-on:input="getValuation(stock_id)">
			<table>
				<thead>
					<th>FYE</th>
					<th>EPS (E)</th>
				</thead>
				<tbody>
					<tr v-for="(pje,key) in projectedEPS">
						<td>{{ key }}</td>
						<td>{{ pje }}</td>
					</tr>
					<tr>
						<td>Total</td>
						<td>{{ sumPJE }}</td>
					</tr>
				</tbody>
			</table>
			<h4>Intrinsic Value</h4>
			<p>5 yrs average EPS: {{ avg_EPS }}</p>
			<p>5 yrs average PE: {{ avg_PE }}</p>
			<p>5 yrs average DY: {{ avg_DY }}</p>
			
			<p>Total 5Y Projected Dividend: {{ projectedDiv }}</p>
			<p>Total 5Y Projected Return: {{ projectedReturn }}</p>
			<p>Estimate Price: {{ estimatePrice }}</p>
			<p>Current Intrinsic Value: {{ currentIntrinsicValue }}</p>
			<h4>Fair Value</h4>
			<p>52 week High: <input type="text" v-model="w52h" v-on:input="getValuation(stock_id)"></p>
			<p>52 week Low: <input type="text" v-model="w52l" v-on:input="getValuation(stock_id)"></p>
			<p>Current Price: {{currentPrice}}</p>
			<p>Fair Value: {{fairValue}}</p>
			<h4>Fundamental Analysis</h4>
			<p>ROE(>15%): Avg - {{avg_roe}} | Current - {{current_roe}}</p>
			<p>EPS Growth Rate(>15%): {{eps_gr}}%</p>
			<p>Debt/Equity Ratio(<0.5): Avg - {{avg_debt_equity}} | Current - {{current_debt_equity}}</p>
			<p>Net Margin(>15%): Avg - {{avg_net_margin}} | Current - {{current_net_margin}}</p>
			<p>GP Cashflow(>0.88): Avg - {{avg_gp_cashflow}} | Current - {{current_gp_cashflow}}</p>
			<p>Gearing(<1.5): Avg - {{avg_gearing}} | Current - {{current_gearing}}</p>
		</div>
		
	</div>

</template>

<script>
	import axios from 'axios';
	
	export default{
		
	data() {
		return {
			//  v-model declare
			stockName:'',
			stock_id:'9334',
			fye:'2017',
			pe:'15.17',
			net_margin:'13.02',
			roe:'13.37',
			gearing:'1.40',
			gp_cashflow:'2.12',
			dy:'0.81',
			bv:'7.6517',
			revenue:'337988000',
			eps:102.30,
			dps:'12.50',
			cash_eq:'127576000',
			stl:'31875000',
			ltl:'37604000',
			debt_equity:'0.11',
			fcf:'-0.02',
			roa:'9.24',
			asset_turnover:'0.71',
			np_gr:'43.38',
			earning_growth_rate: 1.15,
			w52h:0,
			w52l:0,
			
			//  {{ }} declare
			avg_EPS:'',
			avg_PE:'',
			avg_DY:'',
			sumPJE:'',
			projectedDiv:'',
			projectedReturn:'',
			estimatePrice:'',
			currentIntrinsicValue:'',
			fairValue:'',
			currentPrice:'',
			avg_roe:'',
			current_roe:'',
			avg_debt_equity:'',
			current_debt_equity:'',
			avg_net_margin:'',
			current_net_margin:'',
			avg_gp_cashflow:'',
			current_gp_cashflow:'',
			avg_gearing:'',
			current_gearing:'',
			eps_gr:'',

			//  v-for declare
			stocks_code:[],
			stock_fundamental:[],
			projectedEPS:[],

			
			//  show/hide declare
			showSearch:false,
			showFundamental:false,
			showUploadForm:false,
			showValuation:false,
		}
	},
			
	methods:{
		getData: function (stock_id) {
		  axios.get("/wages/valuation/api/show/"+stock_id)
		  .then((response) => {
		    console.log('get getData success');
		    this.stock_fundamental = response.data;
		    if(response.data.length == 0){
		    	this.showUploadForm = true;
		    }else{
		    	this.showFundamental = true;
		    }
		  }
		  ,(error) => {
		  	console.log(error.response);
		  });
		  
		},


		searchStock: function (stock_id) {
			console.log(stock_id);
		  axios.get("/api/wages/"+stock_id)
		  .then((response) => {
		    console.log('get searchStock success');
		    console.log(response.data);
		    this.stocks_code = response.data;
		  }
		  ,(error) => {
		  	console.log(error);
		  });
		  if(stock_id == '')
		  {
		  	this.showSearch = false;
		  }
		  else
		  {
		  	this.showSearch = true;
		  }
		},

		returnValue: function(stock_id){
			this.stock_id = stock_id;
			this.showSearch = false;
		},

		uploadForm: function(){
			axios.post("/wages/valuation/api/upload-fundamental",{
				'stock_id':this.stock_id,
				'fye':this.fye,
				'pe':this.pe,
				'net_margin':this.net_margin,
				'roe':this.roe,
				'gearing':this.gearing,
				'gp_cashflow':this.gp_cashflow,
				'dy':this.dy,
				'revenue':this.revenue,
				'eps':this.eps,
				'dps':this.dps,
				'cash_eq':this.cash_eq,
				'stl':this.stl,
				'ltl':this.ltl,
				'debt_equity':this.debt_equity,
				'bv':this.bv,
				'fcf':this.fcf,
				'roa':this.roa,
				'asset_turnover':this.asset_turnover,
				'np_gr':this.np_gr,
			})
			.then(function(response){
				console.log(response.data);
			})
			.catch(function(error){
				console.log(error.response);
			});

			this.getData(this.stock_id);
		},

		toggleValuation:function(stock_id){
			if(this.showValuation == true)
			{
				this.showValuation = false;
			}
			else
			{
				this.showValuation = true;
				this.getValuation(stock_id);
			}
		},

		getValuation:function (stock_id) {
		  axios.get("/wages/valuation/api/show/"+stock_id)
		  .then((response) => {
		    console.log('get getValuation success');
		    var x = response.data;
		    var EPS = [];
		    var PE = [];
		    var DY = [];
		    var aROE = [];
		    var cROE = '';
		    var aDebtEquity = [];
		    var cDebtEquity = '';
		    var aNetMargin = [];
		    var cNetMargin = '';
		    var aGPCashflow = [];
		    var cGPCashflow = '';
		    var aGearing = [];
		    var cGearing = '';
		    var eps_gr = '';
		    var projectedEPS = [];
		    for(var i in x){
		    	EPS[i] = Number(x[i]['EPS']);
		    	PE[i] = Number(x[i]['PE']);
		    	DY[i] = Number(x[i]['DY']);
		    	projectedEPS[0] = Number(x[0]['EPS']);
		    	aROE[i] = Number(x[i]['roe']);
		    	cROE = Number(x[0]['roe']);
		    	aDebtEquity[i] = Number(x[i]['debt_equity']);
		    	cDebtEquity = Number(x[0]['debt_equity']);
		    	aNetMargin[i] = Number(x[i]['net_margin']);
		    	cNetMargin = Number(x[0]['net_margin']);
		    	aGPCashflow[i] = Number(x[i]['gp_cashflow']);
		    	cGPCashflow = Number(x[0]['gp_cashflow']);
		    	aGearing[i] = Number(x[i]['gearing']);
		    	cGearing = Number(x[0]['gearing']);
		    	eps_gr = (Number(x[0]['net_profit_gr']) - Number(x[4]['net_profit_gr'])) / Number(x[4]['net_profit_gr']) * 100;
		    }
		    

		    for(let i=0; i<5 ; i++){
		    	projectedEPS[i+1] = projectedEPS[i] * this.earning_growth_rate;
		    }
		    this.avg_EPS = Number(this.avgArray(EPS)).toFixed(2);
		    this.avg_PE = Number(this.avgArray(PE)).toFixed(2);
		    this.avg_DY = Number(this.avgArray(DY)).toFixed(2);
		    this.avg_roe = Number(this.avgArray(aROE)).toFixed(2);
		    this.current_roe = Number(cROE).toFixed(2);
		    this.avg_debt_equity = Number(this.avgArray(aDebtEquity)).toFixed(2);
		    this.current_debt_equity = Number(cDebtEquity).toFixed(2);
		    this.avg_net_margin = Number(this.avgArray(aNetMargin)).toFixed(2);
		    this.current_net_margin = Number(cNetMargin).toFixed(2);
		    this.avg_gp_cashflow = Number(this.avgArray(aGPCashflow)).toFixed(2);
		    this.current_gp_cashflow = Number(cGPCashflow).toFixed(2);
		    this.avg_gearing = Number(this.avgArray(aGearing)).toFixed(2);
		    this.current_gearing = Number(cGearing).toFixed(2);
		    this.eps_gr = Number(eps_gr).toFixed(2);
		    this.projectedEPS = projectedEPS;
		    this.sumPJE = this.sumArray(projectedEPS);
		    this.projectedDiv = this.sumPJE * this.avgArray(DY);
		    this.projectedReturn = this.projectedDiv + this.sumPJE;
		    this.estimatePrice = this.projectedEPS[5] * this.avgArray(PE);
		    this.currentIntrinsicValue = this.estimatePrice/(Math.pow(this.earning_growth_rate,5));
		    this.getFairValue(stock_id);
		  }
		  ,(error) => {
		  	console.log(error.response);
		  });
		  
		},

		sumArray: function(array){
			var sum = 0;
			for(var i=array.length; i--;){
				sum += array[i];
			}
			return sum;
		},

		avgArray:function(array){
			var sum = 0;
			var avg = 0;
			for(var i=array.length; i--;){
				sum += array[i];
			}
			avg = sum/(array.length);

			return avg;
		},

		getFairValue:function(stock_id){
			var a = (this.currentIntrinsicValue/100) * 0.75;
			var b = ((this.w52h - this.w52l)*0.33)+this.w52l;
			if(a > b){
				this.fairValue = b;
			}
			else{
				this.fairValue = a;
			}
			axios.get('/wages/watchlist/api/show-watchlist/'+stock_id)
			.then((response)=>{
				this.currentPrice = response.data.current_price;
			},(error)=>{
				console.log(error.response);
			})
		}

	},

	
	
	

}
</script>

<style>
/* page title (about) style */

h1.pageTitle{
    border-bottom: 2px solid #DED5C7;
    position: relative;
    font-size: 80px;
    color:#DED5C7;
    margin-left:50px;
    width:210px;
    font-weight:normal;
}

h1.pageTitle span{
    position: absolute;
    font-size: 20px;
    color:#000;
    bottom: 40%;
    left:0;
}

</style>