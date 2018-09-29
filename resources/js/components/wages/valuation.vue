
<template>
	<div>
		<a href="/wages/transaction">Transaction</a> | <a href="/wages/watchlist">Watchlist</a> | <a href="/wages/valuation">Valuation</a>
		<h1 class="pageTitle">Valuation<span>VALUATION</span></h1>
		
		<div id="searchStockForm">
			<input type="text" v-model="stock_id" placeholder="Search Stock Here" v-on:input="searchStock(stock_id)">
			<button v-on:click="getData(stock_id)">Search</button>
			<div id="searchResult" v-if="showSearch" v-for="s_c in stocks_code">
				<a v-on:click="returnValue(s_c.id)">{{ s_c.name }} - {{s_c.id }}</a>
			</div>
		</div>

		<div id="stockFundamental" v-if="showFundamental">
			<table>
				<thead>
					<th>Report Date</th>
					<th>Net Profit</th>
				</thead>
				<tbody>
					<tr v-for="s_f in stock_fundamental.fundamental.financials">
						<td>{{ s_f.reportDate }}</td>
						<td>{{ s_f.netIncome }}</td>
					</tr>
				</tbody>
			</table>
			<table>
				<thead>
					<th>Payment Date</th>
					<th>Dividend</th>
				</thead>
				<tbody>
					<tr v-for="s_f in stock_fundamental.dividends">
						<td>{{ s_f.paymentDate }}</td>
						<td>{{ s_f.amount }}</td>
					</tr>
				</tbody>
			</table>
			<table>
				<thead>
					<th>PE</th>
					<th>52 Week Low</th>
					<th>52 Week High</th>
					<th>Market Cap</th>
					<th>Price</th>

				</thead>
				<tbody>
					<tr>
						<td>{{ stock_fundamental.today_earning.bto.quote.peRatio }}</td>
						<td>{{ stock_fundamental.today_earning.bto.quote.week52High }}</td>
						<td>{{ stock_fundamental.today_earning.bto.quote.week52Low }}</td>
						<td>{{ stock_fundamental.today_earning.bto.quote.marketCap }}</td>
						<td>{{ stock_fundamental.today_earning.bto.quote.latestPrice }}</td>
					</tr>
				</tbody>
			</table>
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
			stock_id:'',

			//  {{ }} declare


			//  v-for declare
			stocks_code:[],
			stock_fundamental:[],

			
			//  show/hide declare
			showSearch:false,
			showFundamental:false,
		}
	},
			
	methods:{
		getData: function (stock_id) {
		  axios.get("/wages/valuation/api/"+stock_id)
		  .then((response) => {
		    console.log('get getData success');
		    this.stock_fundamental = response.data;
		    var a = response.data.dividends;
		    this.showFundamental = true;
		    for(var x in a)
		    {
		    	if(a[x].paymentDate.includes('2017')){
		    		console.log(a[x].amount);
		    	}
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
		  this.showSearch = true;
		},

		returnValue: function(stock_id){
			this.stock_id = stock_id;
			this.showSearch = false;
		},

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