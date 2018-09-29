
<template>
	<div>
		<a href="/wages/transaction">Transaction</a> | <a href="/wages/watchlist">Watchlist</a>
		<h1 class="pageTitle">Watchlist<span>WATCHLIST</span></h1>
		
		<div>
			<table>
				<thead>
					<th>Stock Code</th>
					<th>Stock Name</th>
					<th>Current Price</th>
				</thead>
				<tbody>
					<tr v-if="completeUpdate">Loading</tr>
					<tr v-for="stock in stocks_ohlc">
						<td>{{stock.id}}</td>
						<td>{{stock.name}}</td>
						<td>{{stock.current_price}}</td>
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
			price:'',
			unit:'',
			stock_id:'',
			buySell:'',

			//  {{ }} declare
			conclusion:'',


			//  v-for declare
			stocks_ohlc:[],
			stocks_code:[],
			
			//  show/hide declare
			completeUpdate:false,
			showSearch:false,
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
			this.cost = this.price*this.unit;
			this.conclusion = "Total cost for " + this.buySell + "ing " + this.stock_id + " : RM " + this.cost + "<button>buy</button";
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

	},

	created : function () {
		this.completeUpdate = true;
	  axios.get("/api/wages")
	  .then((response) => {
	    console.log('get showStock_ohlc success');
	    this.stocks_ohlc = response.data;
	    this.completeUpdate = false;
	  }
	  ,(error) => {
	  	console.log(error);
	  });
	  
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