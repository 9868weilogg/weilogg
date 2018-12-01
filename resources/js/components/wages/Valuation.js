import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Link} from 'react-router-dom';
var style = {
	
}

export default class Watchlist extends Component {
	

	constructor(props){
		super(props);
		this.state = {
			stock_id:'',
			stock_list:[],
			stock_fundamental:[],
			searchStock:'',
		}

		this.handleUserInput = this.handleUserInput.bind(this);
	}

	handleUserInput(e){
		const name = e.target.name;
		const value = e.target.value;
		this.setState({
			[name]:value,
		});
		if(name === 'searchStock'){
			axios.get("/wages/watchlist/api/search-stock/"+value)
			.then((response)=>{
				this.setState({
					stock_list:response.data,
				})
				console.log(response.data);
			})
			.catch(function(error){
				console.log(error.response);
			});
		}
	}

	getFundamental(e,id){
		e.preventDefault();
		axios.get("/wages/valuation/api/show/"+id)
		.then((response)=>{
			this.setState({
				stock_fundamental:response.data,
			})
			console.log(response.data);
		})
		.catch(function(error){
			console.log(error.response);
		});
	}

	render(){
		return (
			<div className="container">
			<div className="row">
			<div className="col-md-12">
				<h1 className="pageTitle">Valuation<span>VALUATION</span></h1>
				<Link to="/wages"><i className="fa fa-home" aria-hidden="true"></i></Link>
			</div>
			<div className="col-md-8">
				<div className="form-group">
					<label>Stock Code</label>
					<input className="form-control" type="text" 
						name="searchStock" 
						ref="searchInput"
						onChange={(e) => this.handleUserInput(e)}/>
					<div ref="searchResult">
						<ul className="list-group">
						{this.state.stock_list.map((value,i)=>{
							return(
								<a ><li className="list-group-item" name="selectedStock" onClick={(e) => this.getFundamental(e,value.id) }
									>
									{value.name} - {value.code}({value.id})
								</li></a>
							)
						})}
						</ul>
					</div>
				</div>
			</div>	
			<div id="uploadFundamental" className="col-md-12">
				<h2>Upload Fundamental Data for Analyse</h2>
				
					<table className="table table-bordered">
						<tr>
							<td><label>Stock</label></td>
							<td><input type="text" name="stock_id"/></td>
							<td><label>Financial Year End</label></td>
							<td><input type="text" name="fye"/></td>
						</tr>
						<tr>
							<td><label>PE ratio</label></td>
							<td><input type="text" name="pe"/></td>
							<td><label>Net Margin</label></td>
							<td><input type="text" name="net_margin"/></td>
						</tr>
						<tr>
							
							
							<td><label>ROE</label></td>
							<td><input type="text" name="roe"/></td>
							<td><label>Gearing Ratio</label></td>
							<td><input type="text" name="gearing"/></td>
							
						</tr>
						<tr>
							<td><label>Grandpine Cash Flow</label></td>
							<td><input type="text" name="gp_cashflow"/></td>
							<td><label>Dividend Yield</label></td>
							<td><input type="text" name="dy"/></td>

						</tr>
						<tr>
							
							<td><label>Revenue</label></td>
							<td><input type="text" name="revenue"/></td>
							<td><label>Earning Per Share</label></td>
							<td><input type="text" name="eps"/></td>
						</tr>
						<tr>
							
							<td><label>Dividend Per Share</label></td>
							<td><input type="text" name="dps"/></td>
							<td><label>Cash & Equivalent</label></td>
							<td><input type="text" name="cash_eq"/></td>
							
						</tr>
						<tr>
							
							<td><label>Short Term Loan</label></td>
							<td><input type="text" name="stl"/></td>
							<td><label>Long Term Loan</label></td>
							<td><input type="text" name="ltl"/></td>
						</tr>
						<tr>
							
							<td><label>Debt-Equity Ratio</label></td>
							<td><input type="text" name="debt_equity"/></td>
							<td><label>Book Value</label></td>
							<td><input type="text" name="bv"/></td>
							
						</tr>
						<tr>
							<td><label>Free Cash Flow</label></td>
							<td><input type="text" name="fcf"/></td>
							<td><label>ROA</label></td>
							<td><input type="text" name="roa"/></td>
						</tr>
						<tr>
							
							<td><label>Asset Turnover</label></td>
							<td><input type="text" name="asset_turnover"/></td>
							<td><label>Net Profit Growth Rate</label></td>
							<td><input type="text" name="np_gr"/></td>
						</tr>
					</table>
					<button className="btn btn-primary" onClick="uploadForm">Upload</button>
				
			</div>
			<div id="stockFundamental" className="col-md-12">
				<h2>Fundamental Data</h2>
				<button className="btn btn-primary" >Update Data</button>
				<button className="btn btn-primary" >Valuation</button>
				<table className="table table-striped table-responsive">
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
						
					</tbody>
				</table>
			</div>
			<div id="valuationResult" className="col-md-12">
				<h2>Valuation</h2>
			</div>
			<div className="col-md-6">
				<input type="text" name="earning_growth_rate" />
				<table>
					<thead>
						<th>FYE</th>
						<th>EPS (E)</th>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				<h4>Intrinsic Value</h4>
				<p>5 yrs average EPS: </p>
				<p>5 yrs average PE: </p>
				<p>5 yrs average DY: </p>
				
				<p>Total 5Y Projected Dividend: </p>
				<p>Total 5Y Projected Return: </p>
				<p>Estimate Price: </p>
				<p>Current Intrinsic Value: </p>
			</div>
			<div className="col-md-6">
				<h4>Fair Value</h4>
				<p>52 week High: <input type="text" name="w52h" /></p>
				<p>52 week Low: <input type="text" name="w52l" /></p>
				<p>Current Price: </p>
				<p>Fair Value: </p>
				<h4>Fundamental Analysis</h4>
				<p>ROE(&gt;15%): Avg -  | Current - </p>
				<p>EPS Growth Rate(&gt;15%): %</p>
				<p>Debt/Equity Ratio(&lt;0.5): Avg -  | Current - </p>
				<p>Net Margin(&gt;15%): Avg -  | Current - </p>
				<p>GP Cashflow(&gt;0.88): Avg -  | Current - </p>
				<p>Gearing(&lt;1.5): Avg -  | Current - </p>
			</div>
		    </div>
		    </div>
		)
	}
}

