
<template>
	<div>
		
		<h1 class="pageTitle">Cash<span>CASH</span></h1>
		
		<div id="updateCash">
			<h2>Update</h2>
			<label>Bank</label>
			<select v-model="bank_id">
				<option v-for="acc in bankStatus.acc" >{{acc.id}}</option>
			</select>
			<label>Description</label>
			<textarea v-model="description"></textarea>
			<label>Amount</label>
			<input type="text" v-model="amount">
			<label>In / Out</label>
			<input type="radio" v-model="flow" value="1">Cash In
			<input type="radio" v-model="flow" value="0">Cash Out
			<button v-on:click="updateCash">Update</button>
		</div>

		<div id="bankAccList">
			<h2>Bank Status</h2>
			<table>
				<thead>
					<th>Bank Account</th>
					<th>Bank</th>
					<th>Owner</th>
					<th>Balance</th>
				</thead>
				<tbody>
					<tr v-for="acc in bankStatus.acc">
						<td>{{ acc.id }}</td>
						<a v-on:click="getCashStatus(acc.id)"><td>{{ acc.bank }}</td></a>
						<td>{{ acc.owner_name }}</td>
						<td>{{ acc.balance }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="cashFlowList" v-if="showCashFlow">
			<h2>Cash Flow Status in account: {{acc_id}}</h2>
			<table>
				<thead>
					<th>Description</th>
					<th>Cash</th>
					<th>In / Out</th>
				</thead>
				<tbody>
					<tr v-for="cash in cashStatus">
						<td>{{ cash.description }}</td>
						<td>{{ cash.cash }}</td>
						<template v-if="cash.flow === 1">
							<td>In</td>
						</template>
						<template v-else="cash.flow === 0">
							<td>Out</td>
						</template>
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
			description:'book',
			amount:'20',
			flowIn:'Cash In',
			flowOut:'Cash Out',
			bank_id:'',
			flow:'',

			//  {{ }} declare
			acc_id:'',

			//  v-for declare
			bankStatus:[],
			cashStatus:[],

			
			//  show/hide declare
			showCashFlow : false,
		}
	},
			
	methods:{
		index: function(){
			axios.get("/wages/cash/api/index")
			.then((response) => {
				console.log('index success');
				this.bankStatus = response.data;
			}, (error) => {
				console.log(error.response);
			});
		},
		getCashStatus: function (bank_id) {
		  axios.get("/wages/cash/api/show/"+bank_id)
		  .then((response) => {
		    console.log('get getCashStatus success');
		    this.cashStatus = response.data;
		    this.acc_id = bank_id;
		    this.showCashFlow = true;
		  }
		  ,(error) => {
		  	console.log(error.response);
		  });

		},

		updateCash:function(){
			console.log(this.flow);
			axios.post('/wages/cash/api/update-cash',{
				'amount':this.amount,
				'description':this.description,
				'bank_id':this.bank_id,
				'flow':this.flow,
			})
			.then(function(response){
				console.log('updateCash success');
				console.log(response);
			})
			.catch(function(error){
				console.log(error.response);
			});
			this.index();
		},


	},

	created: function(){
		axios.get("/wages/cash/api/index")
		.then((response) => {
			console.log('index success');
			this.bankStatus = response.data;
		}, (error) => {
			console.log(error.response);
		});
	}

	

	
	

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