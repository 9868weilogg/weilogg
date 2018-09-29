
<template>
	<div>
		<a href="/wages/transaction">Transaction</a> | <a href="/wages/watchlist">Watchlist</a>
		<h1 class="pageTitle">Transaction<span>TRANSACTION</span></h1>
		<button v-on:click="toggleTransaction">Display Transaction</button>
		<div id="transactionRecord" v-if="showTransaction">
			{{remindPayment}}
			<table>
				<thead>
					<th>ID</th>
					<th>Stock</th>
					<th>Type</th>
					<th>Price</th>
					<th>Unit</th>
					<th>Gross Amount</th>
					<th>Brokerage</th>
					<th>Clearing Fee</th>
					<th>SST Payable</th>
					<th>Stamp Duty</th>
					<th>Total Amount Due</th>
					<th>Payment Due Date</th>
				</thead>
				<tbody>
					<tr v-for="transaction in transactions" :key="transaction.id">
						<td>{{ transaction.id }}</td>
						<td>{{ transaction.name.name }} - {{ transaction.stock_id }}</td>
						<td>{{ transaction.type }}</td>
						<td>{{ transaction.price }}</td>
						<td>{{ transaction.unit }}</td>
						<td>{{ transaction.gross_amount }}</td>
						<td>{{ transaction.brokerage }}</td>
						<td>{{ transaction.clearing_fee }}</td>
						<td>{{ transaction.sst_payable }}</td>
						<td>{{ transaction.stamp_duty }}</td>
						<td>{{ transaction.total_amount_due }}</td>
						<td>{{ transaction.payment_due_date }}</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div id="transactionForm">
			<label>Transaction Type</label>
			<select v-model="buySell">
				<option>Buy</option>
				<option>Sell</option>
			</select>
			<label>Stock Code</label>
			<input type="text" v-model="stock_id" v-on:input="searchStock(stock_id)">
			<div v-for="stock_code in stocks_code" v-if="showSearch">
				<a v-on:click="returnValue(stock_code.id)">{{stock_code.name}} - {{stock_code.id}}</a>
			</div>
			<label>Buy / Sell Price</label>
			<input type="text" v-model="price">
			<label>Buy / Sell Unit</label>
			<input type="text" v-model="unit">
			<button v-on:click="calculateContractPrice">Calculate</button>
			
		</div>
		<div id="result" v-if="showResult">
			<h3>Result</h3>
			<p>Gross Amount: {{gross_amount}}</p>
			<p>Brokerage: {{brokerage}}</p>
			<p>Clearing Fee: {{clearing_fee}}</p>
			<p>SST Payable: {{sst_payable}}</p>
			<p>Stamp Duty: {{stamp_duty}}</p>
			<p>Total Amount Due: {{total_amount_due}}</p>
			<p>Payment Due Date: {{payment_due_date}}</p>
			<button v-on:click="submitTransaction">{{buySell}}</button>
		</div>
		
		
	</div>

</template>

<script>
	import axios from 'axios';
	
	export default{
		
	data() {
		return {
			//  v-model declare
			price:'1.3',
			unit:'1000',
			stock_id:'AAPL',
			buySell:'',

			//  {{ }} declare
			gross_amount:0,
			brokerage:0,
			clearing_fee:0,
			sst_payable:0,
			stamp_duty:0,
			total_amount_due:0,
			payment_due_date:'',
			remindPayment:'',


			//  v-for declare
			stocks_code:[],
			transactions:[],
			
			//  show/hide declare
			showResult:false,
			showSearch:false,
			showTransaction:false,
		}
	},
			
	methods:{
		showStock: function () {
		  axios.get("/api/wages")
		  .then((response) => {
		    console.log('get showStock_ohlc success');
		    this.stocks_ohlc = response.data;
		  }
		  ,(error) => {
		  	console.log(error);
		  });

		},

		calculateContractPrice:function(){
			var today = new Date();
			today.setDate(today.getDate()+3);
			this.payment_due_date = today.toDateString();
			this.gross_amount = this.price * this.unit;
			if(this.price * this.unit >= 3000)
			{
				this.brokerage = Number(this.price * this.unit * 0.0042).toFixed(2);
				
			}
			else
			{
				this.brokerage = 12;
				
			}
			this.clearing_fee = this.price * this.unit * 0.0003;
			this.sst_payable = (this.brokerage + this.clearing_fee) * 0.06;
			this.stamp_duty = Math.ceil(this.gross_amount / 1000);
			this.total_amount_due = this.gross_amount + this.brokerage + this.clearing_fee + this.sst_payable + this.stamp_duty;
			this.buySell = this.buySell;
			this.showResult = true;
		},

		submitTransaction: function(){
			axios.post("/wages/transaction",{
				'type':this.buySell,
				'unit':this.unit,
				'price':this.price,
				'stock_id':this.stock_id,
				'gross_amount':this.gross_amount,
				'brokerage':this.brokerage,
				'clearing_fee':this.clearing_fee,
				'sst_payable':this.sst_payable,
				'stamp_duty':this.stamp_duty,
				'total_amount_due':this.total_amount_due,
				'payment_due_date':this.payment_due_date,
			})
			.then(function(response){
				console.log(response.data);
			})
			.catch(function(error){
				console.log(error.response);
			})
		},

		searchStock: function (id) {
			console.log(id);
		  axios.get("/api/wages/"+id)
		  .then((response) => {
		    console.log('get searchStock success');
		    console.log(response.data);
		    this.stocks_code = response.data;
		  }
		  ,(error) => {
		  	console.log(error);
		  });
		  this.showSearch = true;
		},

		returnValue: function(id){
			this.stock_id = id;
			this.showSearch = false;
		},

		toggleTransaction:function(){
			if(this.showTransaction === true)
			{
				this.showTransaction = false;
			}
			else
			{
				this.showTransaction = true;
				axios.get("/wages/transaction/api")
				.then((response) =>{
					console.log('toggleTransaction success');
					var a = response.data;
					this.transactions = response.data;
					var today = "Mon Oct 01 2018";
					for(var key in a){
						
						if(a[key].payment_due_date === today)
						{
							this.remindPayment += "make payment " + a[key].stock_id + "\n";
						}
					}
				},(error)=> {
					console.log(error.response);
				})
			}
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