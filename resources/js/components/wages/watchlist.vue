
<template>
	<div>
		
		<h1 class="pageTitle">Watchlist<span>WATCHLIST</span></h1>
		
		<div>
			<label>Stock Code</label>
			<input type="text" v-model="stock_id" v-on:input="searchStock(stock_id)">
			<div v-for="stock_code in stocks_code" v-if="showSearch">
				<a v-on:click="addWatchStock(stock_code.id)">{{stock_code.name}} - {{stock_code.id}}</a>
			</div>
			<table>
				<thead>
					<th>Stock Code</th>
					<th>Stock Name</th>
					<th>Current Price</th>
				</thead>
				<tbody>
					<tr v-if="completeUpdate">Loading</tr>
					<tr v-for="stock in watchlist">
						<td>{{stock.id}}</td>
						<td>{{stock.name}}</td>
						<td>{{stock.current_price}}</td>
						<button v-on:click="deleteWatchStock(stock.id)">Delete</button>
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
			watchlist:[],
			stocks_code:[],
			
			//  show/hide declare
			completeUpdate:false,
			showSearch:false,
		}
	},
			
	methods:{
		showWatchlist: function () {
		  axios.get("/wages/watchlist/api/index-watchlist")
		  .then((response) => {
		    console.log('get showWatchlist success');
		    this.watchlist = response.data;
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
		  
		  if(id == '')
		  {
		  	this.showSearch = false;
		  }
		  else
		  {
		  	this.showSearch = true;
		  }
		},

		addWatchStock: function(id){
			axios.post("/wages/watchlist/api/add-watchlist",{
				'id' : id,

			})
			.then(function(response){
				console.log('addWatchStock success');
				console.log(response.data);
			})
			.catch(function(error){
				console.log(error.response);
			});
			this.stock_id = '';
			this.showSearch = false;
			this.showWatchlist();
		},

		deleteWatchStock: function(id){
			axios.delete("/wages/watchlist/api/delete-watchlist/"+id)
			.then(function(response){
				console.log('deleteWatchStock success');
			})
			.catch(function(error){
				console.log(error.response);
			});
			this.showWatchlist();
		},

	},

	created : function () {
	  axios.get("/wages/watchlist/api/index-watchlist")
	  .then((response) => {
	    console.log('get showWatchlist success');
	    this.watchlist = response.data;
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