import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Link, Switch} from 'react-router-dom';
import Cash from './Cash';
import Transaction from './Transaction';


const H = () => {
	return(
		<div className="container">
			<div className="row">
				<div className="col-md-6">
					<Link to="/wages/cash"><button className="btn btn-primary">Cash</button></Link>
				</div>
				<div className="col-md-6">
					<Link to="/wages/transaction"><button className="btn btn-primary">Transaction</button></Link>
				</div>
				<div className="col-md-6">
					<Link to="/wages/watch"><button className="btn btn-primary">Watchlist</button></Link>
				</div>
				<div className="col-md-6">
					<Link to="/wages/valuation"><button className="btn btn-primary">Valuation</button></Link>
				</div>
			</div>
		</div>

	)
	
	
}


export default class Home extends Component {
	

	render(){
		return (
			<div className="container">
				
				<div>
					<Switch>
						<Route exact path="/wages" component={H}/>
						<Route path="/wages/cash" component={Cash}/>
						<Route path="/wages/transaction" component={Transaction}/>
					</Switch>
				</div>
			</div>

		)
	}
}


