import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Link} from 'react-router-dom';

const FormErrors = ({formErrors}) =>
	<div className="formErrors">
		{Object.keys(formErrors).map((fieldName,i) => {
			if(formErrors[fieldName].length > 0){
				return(
					<p key={i} className="text-danger border border-danger rounded">
						{fieldName}: {formErrors[fieldName]}
					</p>
				)
			}else{
				return '';
			}
		})}
	</div>

export default class Transaction extends Component {
	constructor(props){
		super(props);
		this.state = {
			//  input
			buySell:'Buy',
			stock_id:'0012',
			price:'12.3',
			unit:'1000',

			//  bind
			gross_amount:'',
			brokerage:'',
			clearing_fee:'',
			sst_payable:'',
			stamp_duty:'',
			total_amount_due:'',
			payment_due_date:'',
			tRecord:[],

			//  validation
			formErrors:{buySell:'', stock_id:'', price:'', unit:'',},
			buySellValid:false,
			stock_idValid:false,
			priceValid:false,
			unitValid:false,
			formValid:false,
			buySellBtn:false,
		};

		this.handleUserInput = this.handleUserInput.bind(this);
		this.calculateTransaction = this.calculateTransaction.bind(this);
		this.validateField = this.validateField.bind(this);
		this.validateForm = this.validateForm.bind(this);
		this.submitTransaction = this.submitTransaction.bind(this);
		this.transactionRecord = this.transactionRecord.bind(this);
	}

	handleUserInput(e){
		const name = e.target.name;
		const value = e.target.value;
		this.setState({
			[name]:value,
		}, () => {this.validateField(name,value)}
		);

		if(e.target.value === 'Buy' && e.target.name === 'buySell'){
			document.getElementById('buySellBtn').classList.remove('btn-success');
			document.getElementById('buySellBtn').classList.add('btn-success');
		}
		if(e.target.value === 'Sell' && e.target.name === 'buySell'){
			document.getElementById('buySellBtn').classList.remove('btn-success');
			document.getElementById('buySellBtn').classList.add('btn-danger');
		}
	}

	validateField(fieldName,value){
		let fieldValidationErrors = this.state.formErrors;
		let buySellValid = this.state.buySellValid;
		let stock_idValid = this.state.stock_idValid;
		let priceValid = this.state.priceValid;
		let unitValid = this.state.unitValid;

		switch(fieldName){
			case 'buySell':
				buySellValid = (value !== null && value !== '');
				fieldValidationErrors.buySell = buySellValid ? '' : 'Not select method';
				break;

			case 'stock_id':
				stock_idValid = (value !== null && value !== '');
				fieldValidationErrors.stock_id = stock_idValid ? '' : 'Please fill in stock code';
				break;

			case 'price':
				priceValid = (value !== null && value !== '' && !isNaN(value));
				fieldValidationErrors.price = priceValid ? '' : 'Please fill in stock price (it must be numeric)';
				break;

			case 'unit':
				unitValid = (value !== null && value !== '' && !isNaN(value));
				fieldValidationErrors.unit = unitValid ? '' : 'Please fill in unit';
				break;

			default:
				break;
		}
		this.setState({
			formErrors : fieldValidationErrors,
			buySellValid : buySellValid,
			stock_idValid : stock_idValid,
			priceValid : priceValid,
			unitValid : unitValid
		}, this.validateForm);
	}

	validateForm(){
		this.setState({
			formValid: this.state.buySellValid && this.state.stock_idValid
				 && this.state.priceValid && this.state.unitValid
		})
	}

	calculateTransaction(e){
		e.preventDefault();
		if(this.state.buySell == null){

		}
		let b = '';
		let ga = this.state.price * this.state.unit;
		let cf = 0.0003 * this.state.price * this.state.unit;
		let sd = Math.ceil(this.state.price * this.state.unit / 1000);
		if(ga >= 3000)
		{
			b = ga * 0.0042;
			
		}
		else
		{
			b = 12;
			
		}
		let sst = (b + cf) * 0.06;
		let today = new Date();
		let payday = new Date();
		let payment_date = '';
		// to test if today is Saturday or Sunday how the flow goes
		today.setDate(today.getDate()+2);
		// console.log(today.getDay());
		if(today.getDay() == 6){
			payment_date = 'Saturday and Sunday cannot trade.';
		}
		else if(today.getDay() == 0)
		{
			payment_date = 'Saturday and Sunday cannot trade.';
			
		}
		else
		{
			payday.setDate(today.getDate()+3);
			// console.log(payday.getDay());
			if(payday.getDay() == 6){
				payday.setDate(today.getDate()+5);
			}
			if(payday.getDay() == 0){
				payday.setDate(today.getDate()+5);
			}
			if(payday.getDay() == 1){
				payday.setDate(today.getDate()+5);
			}
			payment_date = payday.toDateString();
			this.state.buySellBtn = true;
		}
		// console.log(payment_date);
		
		this.setState({
			gross_amount : ga,
			brokerage : b,
			clearing_fee : cf,
			stamp_duty : sd,
			total_amount_due : ga + b + cf + sst + sd,
			sst_payable : sst, 
			payment_due_date : payment_date,
		});
	}

	submitTransaction(e){
		e.preventDefault();
		const txs = {
			id:'3',
			type:this.state.buySell,
			unit:this.state.unit,
			price:this.state.price,
			stock_id:this.state.stock_id,
			user_id:'123',
			gross_amount:this.state.gross_amount,
			brokerage:this.state.brokerage,
			clearing_fee:this.state.clearing_fee,
			sst_payable:this.state.sst_payable,
			stamp_duty:this.state.stamp_duty,
			total_amount_due:this.state.total_amount_due,
			payment_due_date:this.state.payment_due_date,

		}
		console.log(txs);

		axios.post("/wages/transaction/api/post-transaction",txs)
		.then((response)=>{
			console.log(response);
			this.transactionRecord();
		})
		.catch(function(error){
			console.log(error.response);
		});
	}

	transactionRecord(){
		axios.get("/wages/transaction/api/show-transaction/user_id/123")
		.then((response)=>{
			this.setState({
				tRecord:response.data,
			});
		})
		.catch((error)=>{
			console.log(error.response);
		});
	}

	componentDidMount(){
		this.transactionRecord();
	}
	
	render(){
		return (
			<div className="container">
			<div className="row">

			<div className="col-md-12">
				<h1 className="pageTitle">Transaction<span>TRANSACTION</span></h1>
				<Link to="/wages"><i className="fa fa-home" aria-hidden="true"></i></Link>
			</div>
			<div className="col-md-6">
					<h3>Buy / Sell</h3>
					<div className="panel panel-default">
						<FormErrors formErrors={this.state.formErrors}/>
					</div>
					<div className='form-group'>
						<label>Transaction Type</label>
						<select className="form-control" 
							name="buySell" 
							onChange={(e) => this.handleUserInput(e)}
							value={this.state.buySell}
							required>
							<option></option>
							<option value="Buy">Buy</option>
							<option value="Sell">Sell</option>
						</select>
					</div>
					<div className='form-group'>
						<label>Stock Code</label>
						<input className="form-control" type="text" 
							name="stock_id" 
							onChange={(e) => this.handleUserInput(e)}
							value={this.state.stock_id}
							required/ >
					</div>
					<div className='form-group'>
						<label>Buy / Sell Price</label>
						<input className="form-control" 
						type="text" name="price" 
						onChange={(e) => this.handleUserInput(e)}
						value={this.state.price}
						required/>
					</div>
					<div className='form-group'>
						<label>Buy / Sell Unit</label>
						<input className="form-control" type="text" 
						name="unit" onChange={(e) => this.handleUserInput(e)}
						value={this.state.unit}
						required/>
					</div>
					<div className="form-group">
						<button className="btn btn-primary"
						type="submit" onClick={this.calculateTransaction}>
							Calculate
						</button>
					</div>
				
		    </div>
		    <div className="col-md-6">
		    	
				<div id="result">
					<h3>Cost for {this.state.buySell}ing {this.state.stock_id} : </h3>
					<p>Gross Amount: RM {this.state.gross_amount}</p>
					<p>Brokerage: RM {this.state.brokerage}</p>
					<p>Clearing Fee: RM {this.state.clearing_fee}</p>
					<p>SST Payable: RM {this.state.sst_payable}</p>
					<p>Stamp Duty: RM {this.state.stamp_duty}</p>
					<p>Total Amount Due: RM {this.state.total_amount_due}</p>
					<p>Payment Due Date:{this.state.payment_due_date}</p>
					<button id="buySellBtn" className="btn btn-success" 
					disabled={!this.state.buySellBtn}
					onClick={this.submitTransaction} >
						{this.state.buySell}
					</button>
				</div>
		    </div>
		    <div className="col-md-12">
		    	<h3>Transaction Record</h3>
		    	<table className="table bordered">
		    		<thead>
		    			<th>Date</th>
		    			<th>Type</th>
		    			<th>Unit</th>
		    			<th>Price</th>
		    			<th>Stock ID</th>
		    			<th>Total Cost</th>
		    		</thead>
		    		<tbody>
			    	{this.state.tRecord.map((value,i)=>{
			    		return (
			    			<tr key={i}>
			    				<td>{value.created_at}</td>
			    				<td>{value.type}</td>
			    				<td>{value.unit}</td>
			    				<td>{value.price}</td>
			    				<td>{value.stock_id}</td>
			    				<td>{value.total_amount_due}</td>
			    			</tr>
			    		)
			    		
			    	})}
			    	</tbody>
			    </table>
		    </div>
		    </div>
		    </div>
		);
	}
}

