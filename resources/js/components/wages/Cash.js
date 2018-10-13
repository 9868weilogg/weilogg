import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Link} from 'react-router-dom';

export default class Cash extends Component {
	constructor(props){
		super(props);
		this.state = {
			bank_id:'',
			description:'',
			amount:'',
			flow:'',
			bank_account:[],
			cash_status:[],
			cash_status_id:'',

		}

		this.handleChangeBankId = this.handleChangeBankId.bind(this);
		this.handleChangeDescription = this.handleChangeDescription.bind(this);
		this.handleChangeAmount = this.handleChangeAmount.bind(this);
		this.handleChangeFlow = this.handleChangeFlow.bind(this);
		this.handleSubmit = this.handleSubmit.bind(this);
		this.showCashStatus = this.showCashStatus.bind(this);
		this.showBankStatus = this.showBankStatus.bind(this);
	}

	handleChangeBankId(e){
		this.setState({
			bank_id : e.target.value
		})
	}
	handleChangeDescription(e){
		this.setState({
			description : e.target.value
		})
	}
	handleChangeAmount(e){
		this.setState({
			amount : e.target.value
		})
	}
	handleChangeFlow(e){
		this.setState({
			flow : e.target.value
		})
	}
	handleSubmit(e){
		e.preventDefault();
		const cashes = {
			bank_id:this.state.bank_id,
			description:this.state.description,
			amount:this.state.amount,
			flow:this.state.flow,
		}
		
		axios.post('/wages/cash/api/update-cash',cashes)
		.then((response)=>{
			console.log('update cash success');
			this.showBankStatus();
			this.setState({
				bank_id:'',
				description:'',
				flow:'',
				amount:'',
			});
		})
		.catch(function(error){
			console.log(error.response);
		});
		

	}
	showCashStatus(bank_id){
		axios.get('/wages/cash/api/show-bank-cash/bank_accounts_id/'+bank_id).then((response)=>{
			this.setState({
				cash_status : response.data,
				cash_status_id : bank_id,
			});
			console.log('get cash status success');
		}).catch(function(error){
			console.log(error.response);
		});
		
	}
	showBankStatus(){
		axios.get('/wages/cash/api/index').then((response)=>{
			this.setState({
				bank_account : response.data.acc,
			});
			console.log('get acc success');
		}).catch(function(error){
			console.log(error.response);
		});
	}
	componentDidMount(){
		this.showBankStatus();
	}
	render(){
		return (
			<div className="container">
			<div className="row">
			<div className="col-md-12">
				<h1 className="pageTitle">Cash<span>CASH</span></h1>
				<Link to="/wages"><i class="fa fa-home" aria-hidden="true"></i></Link>
			</div>
			<div className="col-md-6">
				<div id="updateCash">
					
		            <h2>Update</h2>
		            <form onSubmit={this.handleSubmit}>
		                <div className="form-group">
		                <label>Bank Account Number</label>
		                <select className="form-control" onChange={this.handleChangeBankId}>
		                	<option ></option>
		                	{this.state.bank_account.map((listValue,index)=>{
		                		return(
		                			<option value={listValue.id}>{listValue.id}</option>
		                		);
		                	})
		                    
		                	}
		                    

		                </select>
		                </div>
		                <div className="form-group">
		                	<label>Description</label>
		                	<textarea className="form-control" onChange={this.handleChangeDescription} ></textarea>
		                </div>
		                <div className="form-group">
		                	<label>Amount</label>
		                	<input className="form-control" type="text" onChange={this.handleChangeAmount}/>
		                </div>
		                <div className="form-group">
		                	<label>Cash In
		                		<input className="form-control" type="checkbox" onChange={this.handleChangeFlow} value="1"/>
		                	</label>
		                	<label>Cash Out
		                		<input className="form-control" type="checkbox" onChange={this.handleChangeFlow} value="0"/>
		                	</label>
		                </div>
		                <div className="form-group">
		                	<input role="button" className="btn btn-primary" type="submit" value="Update"/>
		                </div>
		            </form>
		        </div>
		    </div>
		    <div className="col-md-6">
		    	
				<h2>Bank Status</h2>
				<table className="table table-bordered">
					<thead>
						<th>Bank Account</th>
						<th>Bank</th>
						<th>Owner</th>
						<th>Balance</th>
					</thead>
					<tbody>
						{this.state.bank_account.map((listValue,index)=>{
							return (
								<tr key={index}>
									<td><button className="btn btn-warning" onClick={ () => this.showCashStatus(listValue.id)}>{listValue.id}</button></td>
									<td>{listValue.bank}</td>
									<td>{listValue.owner_name}</td>
									<td>{listValue.balance}</td>
								</tr>
							);
						})}
					</tbody>
				</table>
			
				<h2>Cash Flow Status in account: {this.state.cash_status_id}</h2>
				<table className="table table-bordered">
					<thead>
						<th>Description</th>
						<th>Cash</th>
						<th>In / Out</th>
					</thead>
					<tbody>
						{this.state.cash_status.map((cash,index)=>{
							return(
								<tr key={index}>
									<td>{cash.description}</td>
									<td>{cash.cash}</td>
									<td>{cash.flow}</td>
								</tr>
							);
						})}
					</tbody>
				</table>
				
		    </div>
		    </div>
		    </div>
		)
	}
}

