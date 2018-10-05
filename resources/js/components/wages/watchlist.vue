
<template>
	<div>
		
		<h1 class="pageTitle">Watchlist<span>WATCHLIST</span></h1>
		
		<div>
			<label>Stock Code</label>
			<input type="text" v-model="stock_id" v-on:input="searchStock(stock_id)">
			<div v-for="stock_code in stocks_code" v-if="showSearch">
				<a v-on:click="addWatchStock(stock_code.id)">{{stock_code.name}} - {{stock_code.id}}</a>
			</div>
		</div>
		<!-- 
		*
		*
		*   Buffett approach
		*
		*
		-->
		<div v-if="showBuffett">
			<table>
				<thead>
					<th colspan="4">Buffett Approach - {{buffettMark}}/35</th>

				</thead>
				<tr>
					<td>1</td>
					<td>Business Sexiness</td>
					<td></td>
					<td><input type="text" v-model.number="ba1" v-on:input="computeBuffett(stock_id)"></td>
				</tr>
				<tr>
					<td></td>
					<td>Supplier No.</td>
					<td><input type="text" v-model.number="ba1_1" v-on:input="computeBuffett(stock_id)"></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>Customer Choices</td>
					<td><input type="text" v-model.number="ba1_2" v-on:input="computeBuffett(stock_id)"></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>Barrier of Entry</td>
					<td><input type="text" v-model.number="ba1_3" v-on:input="computeBuffett(stock_id)"></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>Substitute</td>
					<td><input type="text" v-model.number="ba1_4" v-on:input="computeBuffett(stock_id)"></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>Competition No.</td>
					<td><input type="text" v-model.number="ba1_5" v-on:input="computeBuffett(stock_id)"></td>
					<td></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Competitiveness(1st/2nd)</td>
					<td></td>
					<td><input type="text" v-model.number="ba2" v-on:input="computeBuffett(stock_id)"></td>
				</tr>
				<tr>
					<td>3</td>
					<td>FPE<25</td>
					<td></td>
					<td><input type="text" v-model.number="ba3" v-on:input="computeBuffett(stock_id)"></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Gearing<1.5</td>
					<td></td>
					<td><input type="text" v-model.number="ba4" v-on:input="computeBuffett(stock_id)"></td>
				</tr>
				<tr>
					<td>5</td>
					<td>GP Cashflow>0.8</td>
					<td></td>
					<td><input type="text" v-model.number="ba5" v-on:input="computeBuffett(stock_id)"></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Good Will</td>
					<td></td>
					<td><input type="text" v-model.number="ba6" v-on:input="computeBuffett(stock_id)"></td>
				</tr>
				<tr>
					<td>7</td>
					<td>Customer Loyalty</td>
					<td></td>
					<td><input type="text" v-model.number="ba7" v-on:input="computeBuffett(stock_id)"></td>
				</tr>
			</table>
		</div>
		<!-- 
		*
		*
		*   Fisher approach
		*
		*
		-->
		<div v-if="showFisher">
			<table>
				<thead>
					<th colspan="3">Fisher Approach - {{fisherMark}}/35</th>
					
				</thead>
				<tr>
					<td>1</td>
					<td>Future Grow Opportunity</td>
					<td><input type="text" v-model.number="fa1" v-on:input="computeFisher(stock_id)"></td>
				</tr>
				
				<tr>
					<td>2</td>
					<td>Competitiveness(1st/2nd)</td>
					<td><input type="text" v-model.number="fa2" v-on:input="computeFisher(stock_id)"></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Net Margin>15</td>
					<td><input type="text" v-model.number="fa3" v-on:input="computeFisher(stock_id)"></td>
				</tr>
				<tr>
					<td>4</td>
					<td>GP Cashflow>0.8</td>
					<td><input type="text" v-model.number="fa4" v-on:input="computeFisher(stock_id)"></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Marginal Cost (R&D Important)</td>
					<td><input type="text" v-model.number="fa5" v-on:input="computeFisher(stock_id)"></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Leadership</td>
					<td><input type="text" v-model.number="fa6" v-on:input="computeFisher(stock_id)"></td>
				</tr>
				<tr>
					<td>7</td>
					<td>Talent</td>
					<td><input type="text" v-model.number="fa7" v-on:input="computeFisher(stock_id)"></td>
				</tr>
			</table>
		</div>
		<!-- 
		*
		*
		*   Watchlist
		*
		*
		-->
		<div>
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
						<td><a v-on:click="showApproach(stock.id)">{{stock.name}}</a></td>
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
			ba1:'',
			ba1_1:'',
			ba1_2:'',
			ba1_3:'',
			ba1_4:'',
			ba1_5:'',
			ba2:'',
			ba3:'',
			ba4:'',
			ba5:'',
			ba6:'',
			ba7:'',
			fa1:'',
			fa2:'',
			fa3:'',
			fa4:'',
			fa5:'',
			fa6:'',
			fa7:'',

			//  {{ }} declare
			conclusion:'',
			buffettMark:'',
			fisherMark:'',


			//  v-for declare
			watchlist:[],
			stocks_code:[],
			
			//  show/hide declare
			completeUpdate:false,
			showSearch:false,
			showBuffett:false,
			showFisher:false,
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

		showApproach:function(stock_id){
			axios.get('/wages/watchlist/api/show-gis-rank/'+stock_id)
			.then((response)=>{
				console.log('showApproach success');
				if(response.data){
					this.ba1 = response.data.ba1 ;
					this.ba1_1 = response.data.ba1_1 ;
					this.ba1_2 = response.data.ba1_2 ;
					this.ba1_3 = response.data.ba1_3 ;
					this.ba1_4 = response.data.ba1_4 ;
					this.ba1_5 = response.data.ba1_5 ;
					this.ba2 = response.data.ba2 ;
					this.ba3 = response.data.ba3 ;
					this.ba4 = response.data.ba4 ;
					this.ba5 = response.data.ba5 ;
					this.ba6 = response.data.ba6 ;
					this.ba7 = response.data.ba7 ;
					this.fa1 = response.data.fa1 ;
					this.fa2 = response.data.fa2 ;
					this.fa3 = response.data.fa3 ;
					this.fa4 = response.data.fa4 ;
					this.fa5 = response.data.fa5 ;
					this.fa6 = response.data.fa6 ;
					this.fa7 = response.data.fa7 ;
					this.buffettMark = response.data.buffettMark;
					this.fisherMark = response.data.fisherMark;
				}else{
					this.ba1 = 0 ;
					this.ba1_1 = 0 ;
					this.ba1_2 = 0 ;
					this.ba1_3 = 0 ;
					this.ba1_4 = 0 ;
					this.ba1_5 = 0 ;
					this.ba2 = 0 ;
					this.ba3 = 0 ;
					this.ba4 = 0 ;
					this.ba5 = 0 ;
					this.ba6 = 0 ;
					this.ba7 = 0 ;
					this.fa1 = 0 ;
					this.fa2 = 0 ;
					this.fa3 = 0 ;
					this.fa4 = 0 ;
					this.fa5 = 0 ;
					this.fa6 = 0 ;
					this.fa7 = 0 ;
					this.buffettMark = 0;
					this.fisherMark = 0;
					
				}
				

			}, (error)=>{
				console.log(error.response);
			});
			this.stock_id = stock_id;
			this.showBuffett = true;
			this.showFisher = true;
			
			
		},

		computeBuffett:function(stock_id){
			
			this.ba1 = (this.ba1_1 || 0 )+ (this.ba1_2 || 0 )+ (this.ba1_3 || 0 )+ (this.ba1_4 || 0 )+ (this.ba1_5 || 0 );
			this.buffettMark = (this.ba1 || 0 ) + (this.ba2 || 0 ) + (this.ba3 || 0 ) + (this.ba4 || 0 ) + (this.ba5 || 0 ) + (this.ba6 || 0 ) + (this.ba7 || 0 );
			axios.post('/wages/watchlist/api/compute-buffett',{
				'stock_id':stock_id,
				'ba1':this.ba1,
				'ba1_1':this.ba1_1,
				'ba1_2':this.ba1_2,
				'ba1_3':this.ba1_3,
				'ba1_4':this.ba1_4,
				'ba1_5':this.ba1_5,
				'ba2':this.ba2,
				'ba3':this.ba3,
				'ba4':this.ba4,
				'ba5':this.ba5,
				'ba6':this.ba6,
				'ba7':this.ba7,
				'buffettMark': this.buffettMark,
			})
			.then(function(response){
				console.log('buffett success');
			})
			.catch(function(error){
				console.log(error.response);
			});
		},

		computeFisher:function(stock_id){
			this.fisherMark = (this.fa1 || 0 ) + (this.fa2 || 0 ) + (this.fa3 || 0 ) + (this.fa4 || 0 ) + (this.fa5 || 0 ) + (this.fa6 || 0 ) + (this.fa7 || 0 );
			axios.post('/wages/watchlist/api/compute-fisher',{
				'stock_id':stock_id,
				'fa1':this.fa1,
				'fa2':this.fa2,
				'fa3':this.fa3,
				'fa4':this.fa4,
				'fa5':this.fa5,
				'fa6':this.fa6,
				'fa7':this.fa7,
				'fisherMark': this.fisherMark,
			})
			.then(function(response){
				console.log('fisher success');
			})
			.catch(function(error){
				console.log(error.response);
			});
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