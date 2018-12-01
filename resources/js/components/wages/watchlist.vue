
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
			<h3>Buffett Approach</h3>
			<b-table bordered small :items="itemBuffett" >
				<template slot="b4" slot-scope="row">
					<b-form-input size="sm" v-model="row.item.b4" v-on:input="computeBuffett(stock_id)"></b-form-input>
				</template>
				<template slot="b3" slot-scope="row">	
					<b-form-input size="sm" v-model="row.item.b3" v-on:input="computeFisher(stock_id)"></b-form-input>
				</template>
				<template slot="table-caption">
					Buffett Approach Mark : {{buffettMark}}
				</template>
			</b-table>
		</div>
		<!-- 
		*
		*
		*   Fisher approach
		*
		*
		-->
		<div v-if="showFisher">
			<h3>Fisher Approach</h3>
			<b-table bordered small :items="itemFisher" >
				
				<template slot="f3" slot-scope="row">	
					<b-form-input size="sm" v-model="row.item.f3" v-on:input="computeFisher(stock_id)"></b-form-input>
				</template>
				<template slot="table-caption">
					Fisher Approach Mark : {{fisherMark}}
				</template>
			</b-table>
			
		</div>
		<!-- 
		*
		*
		*   Watchlist
		*
		*
		-->
		<div>
			<b-table bordered small :items="itemWatchlist">

			</b-table>
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
			//  bootstrap declare
			itemBuffett : [
				{'b1':'1)','b2':'Business Sexiness','b3':'','b4':'0'},
				{'b1':'1-1)','b2':'Supplier No.','b3':'0','b4':''},
				{'b1':'1-2)','b2':'Customer Choices','b3':'0','b4':''},
				{'b1':'1-3)','b2':'Barrier of Entry','b3':'0','b4':''},
				{'b1':'1-4)','b2':'Substitute','b3':'0','b4':''},
				{'b1':'1-5)','b2':'Competition No.','b3':'0','b4':''},
				{'b1':'2)','b2':'Competitiveness (1st/2nd)','b3':'','b4':'0'},
				{'b1':'3)','b2':'FPE<25','b3':'','b4':'0'},
				{'b1':'4)','b2':'Gearing<1.5','b3':'','b4':'0'},
				{'b1':'5)','b2':'GP Cashflow>0.88','b3':'','b4':'0'},
				{'b1':'6)','b2':'Good Will','b3':'','b4':'0'},
				{'b1':'7)','b2':'Customer Loyalty','b3':'','b4':'0'},
			],
			itemFisher : [
				{'f1':'1)','f2':'Future Grow Opportunity','f3':'0'},
				{'f1':'2)','f2':'Competitiveness (1st/2nd)','f3':'0'},
				{'f1':'3)','f2':'Net Margin>15','f3':'0'},
				{'f1':'4)','f2':'GP Cashflow>0.88','f3':'0'},
				{'f1':'5)','f2':'Marginal Cost (R&D Important)','f3':'0'},
				{'f1':'6)','f2':'Leadership','f3':'0'},
				{'f1':'7)','f2':'Talent','f3':'0'},
			],
			itemWatchlist : [
				{'stock':'','code':'','name':'','currentPrice':''},
			],

			//  v-model declare
			price:'',
			unit:'',
			stock_id:'',
			buySell:'',
			

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
					
					this.buffettMark = response.data.buffettMark;
					this.fisherMark = response.data.fisherMark;
					this.itemBuffett[0]['b4'] = response.data.ba1 ;
					this.itemBuffett[1]['b3'] = response.data.ba1_1 ;
					this.itemBuffett[2]['b3'] = response.data.ba1_2 ;
					this.itemBuffett[3]['b3'] = response.data.ba1_3 ;
					this.itemBuffett[4]['b3'] = response.data.ba1_4 ;
					this.itemBuffett[5]['b3'] = response.data.ba1_5 ;
					this.itemBuffett[6]['b4'] = response.data.ba2 ;
					this.itemBuffett[7]['b4'] = response.data.ba3 ;
					this.itemBuffett[8]['b4'] = response.data.ba4 ;
					this.itemBuffett[9]['b4'] = response.data.ba5 ;
					this.itemBuffett[10]['b4'] = response.data.ba6 ;
					this.itemBuffett[11]['b4'] = response.data.ba7 ;
					this.itemFisher[0]['f3'] = response.data.fa1 ;
					this.itemFisher[1]['f3'] = response.data.fa2 ;
					this.itemFisher[2]['f3'] = response.data.fa3 ;
					this.itemFisher[3]['f3'] = response.data.fa4 ;
					this.itemFisher[4]['f3'] = response.data.fa5 ;
					this.itemFisher[5]['f3'] = response.data.fa6 ;
					this.itemFisher[6]['f3'] = response.data.fa7 ;
				}else{
					
					this.buffettMark = 0;
					this.fisherMark = 0;
					this.itemBuffett[0]['b4'] = 0 ;
					this.itemBuffett[1]['b3'] = 0 ;
					this.itemBuffett[2]['b3'] = 0 ;
					this.itemBuffett[3]['b3'] = 0 ;
					this.itemBuffett[4]['b3'] = 0 ;
					this.itemBuffett[5]['b3'] = 0 ;
					this.itemBuffett[6]['b4'] = 0 ;
					this.itemBuffett[7]['b4'] = 0 ;
					this.itemBuffett[8]['b4'] = 0 ;
					this.itemBuffett[9]['b4'] = 0 ;
					this.itemBuffett[10]['b4'] = 0 ;
					this.itemBuffett[11]['b4'] = 0 ;
					this.itemFisher[0]['f3'] = 0 ;
					this.itemFisher[1]['f3'] = 0 ;
					this.itemFisher[2]['f3'] = 0 ;
					this.itemFisher[3]['f3'] = 0 ;
					this.itemFisher[4]['f3'] = 0 ;
					this.itemFisher[5]['f3'] = 0 ;
					this.itemFisher[6]['f3'] = 0 ;
				}
				

			}, (error)=>{
				console.log(error.response);
			});
			this.stock_id = stock_id;
			this.showBuffett = true;
			this.showFisher = true;
			
			
		},

		computeBuffett:function(stock_id){
			this.itemBuffett[0]['b4'] = (this.itemBuffett[1]['b3'] || 0 )+ (this.itemBuffett[2]['b3'] || 0 )+ (this.itemBuffett[3]['b3'] || 0 )+ (this.itemBuffett[4]['b3'] || 0 )+ (this.itemBuffett[5]['b3'] || 0 );
			this.buffettMark = (this.itemBuffett[0]['b4'] || 0 ) + (this.itemBuffett[6]['b4'] || 0 ) + (this.itemBuffett[7]['b4'] || 0 ) + (this.itemBuffett[8]['b4'] || 0 ) + (this.itemBuffett[9]['b4'] || 0 ) + (this.itemBuffett[10]['b4'] || 0 ) + (this.itemBuffett[11]['b4'] || 0 );
			axios.post('/wages/watchlist/api/compute-buffett',{
				'stock_id':stock_id,
				'ba1':this.itemBuffett[0]['b4'],
				'ba1_1':this.itemBuffett[1]['b3'],
				'ba1_2':this.itemBuffett[2]['b3'],
				'ba1_3':this.itemBuffett[3]['b3'],
				'ba1_4':this.itemBuffett[4]['b3'],
				'ba1_5':this.itemBuffett[5]['b3'],
				'ba2':this.itemBuffett[6]['b4'],
				'ba3':this.itemBuffett[7]['b4'],
				'ba4':this.itemBuffett[8]['b4'],
				'ba5':this.itemBuffett[9]['b4'],
				'ba6':this.itemBuffett[10]['b4'],
				'ba7':this.itemBuffett[11]['b4'],
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
			this.fisherMark = (this.itemFisher[0]['f3'] || 0 ) + (this.itemFisher[1]['f3'] || 0 ) + (this.itemFisher[2]['f3'] || 0 ) + (this.itemFisher[3]['f3'] || 0 ) + (this.itemFisher[4]['f3'] || 0 ) + (this.itemFisher[5]['f3'] || 0 ) + (this.itemFisher[7]['f3'] || 0 );	
			
			axios.post('/wages/watchlist/api/compute-fisher',{
				'stock_id':stock_id,
				'fa1':this.itemFisher[0]['f3'],
				'fa2':this.itemFisher[1]['f3'],
				'fa3':this.itemFisher[2]['f3'],
				'fa4':this.itemFisher[3]['f3'],
				'fa5':this.itemFisher[4]['f3'],
				'fa6':this.itemFisher[5]['f3'],
				'fa7':this.itemFisher[6]['f3'],
				'fisherMark': this.fisherMark,
			})
			.then(function(response){
				console.log('fisher success');
			})
			.catch(function(error){
				console.log(error.response);
			});
		},

		console:function(item){
			console.log(this.itemBuffett[0]['th4']);
		},

	},

	created : function () {
	  axios.get("/wages/watchlist/api/index-watchlist")
	  .then((response) => {
	    console.log('get showWatchlist success');
	    this.watchlist = response.data;
	    var a = response.data;
	    //this.itemWatchlist[0]['stock'] = '0012';
	    //this.itemWatchlist[0]['code'] = '3A';
	    //this.itemWatchlist[0]['name'] = '3A Bhd';
	    //this.itemWatchlist[0]['currentPrice'] = '0.8400';
	    var b = [{'stock':''}];
	    for(let i=0;i<a.length;i++){
	    	var pointer = this.itemWatchlist;
	    	(function(i,pointer){
	    		//console.log(a[i].id);
	    		pointer[i]['stock'] = a[i].id;
	    	})(i,a);
	    	
	    };

	    console.log(this.itemWatchlist);
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