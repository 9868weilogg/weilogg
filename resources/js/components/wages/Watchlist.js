import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Link} from 'react-router-dom';
var style = {
	'h3color':{
		color:'red',
	},
	'h4color':{
		color:'green',
	},
	'input':{
		width:'50px',
		border:'solid 1px black',
		margin:'0px',
	}
}

export default class Watchlist extends Component {
	

	constructor(props){
		super(props);
		this.state = {
			stock_id:'',
			stock_list:[],
			watchlist:[],
			searchStock:'',
			ba1_1:'',
			ba1_2:'',
			ba1_3:'',
			ba1_4:'',
			ba1_5:'',
			ba1:'',
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
			buffettMark:'',
			fisherMark:'',
		}



		this.handleUserInput = this.handleUserInput.bind(this);
		this.indexWatchlist = this.indexWatchlist.bind(this);
		this.addWatchlist = this.addWatchlist.bind(this);
		this.updatePrice = this.updatePrice.bind(this);
		this.deleteWatchlist = this.deleteWatchlist.bind(this);
		this.notify = this.notify.bind(this);
		this.showGisRank = this.showGisRank.bind(this);
	}

	indexWatchlist(){
		axios.get("/wages/watchlist/api/index-watchlist")
		.then((response)=>{
			this.setState({
				watchlist:response.data,

			});
		})
		.catch(function(error){
			console.log(error.response);
		});
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
		if(name === 'ba1_1' || name === 'ba1_2' || name === 'ba1_3' 
			|| name === 'ba1_4' || name === 'ba1_5' || name === 'ba1' || name === 'ba2' 
			|| name === 'ba3' || name === 'ba4' || name === 'ba5' || name === 'ba6' 
			|| name === 'ba7' ){
			let thisIn = this;
			setTimeout(function(){
				let sum = Number(thisIn.state.ba1_1 || 0) + Number(thisIn.state.ba1_2 || 0) 
						+ Number(thisIn.state.ba1_3 || 0) + Number(thisIn.state.ba1_4 || 0) 
						+ Number(thisIn.state.ba1_5 || 0);
				let mark = sum + Number(thisIn.state.ba2 || 0) 
						+ Number(thisIn.state.ba3 || 0) + Number(thisIn.state.ba4 || 0) 
						+ Number(thisIn.state.ba5 || 0) + Number(thisIn.state.ba6 || 0)
						+ Number(thisIn.state.ba7 || 0);
				thisIn.setState({
					ba1:sum,
					buffettMark:mark,
				});
				const computeBuffett ={
					ba1_1:thisIn.state.ba1_1,
					ba1_2:thisIn.state.ba1_2,
					ba1_3:thisIn.state.ba1_3,
					ba1_4:thisIn.state.ba1_4,
					ba1_5:thisIn.state.ba1_5,
					ba1:thisIn.state.ba1,
					ba2:thisIn.state.ba2,
					ba3:thisIn.state.ba3,
					ba4:thisIn.state.ba4,
					ba5:thisIn.state.ba5,
					ba6:thisIn.state.ba6,
					ba7:thisIn.state.ba7,
					buffettMark:thisIn.state.buffettMark,
					stock_id:thisIn.state.stock_id,
				};
				axios.post("/wages/watchlist/api/compute-buffett",computeBuffett)
				.then((response)=>{
					console.log(response);
				})
				.catch(function(error){
					console.log(error.response);
				});
			},500);
			
			
		}
		if(name === 'fa1' || name === 'fa2' || name === 'fa3' 
			|| name === 'fa4' || name === 'fa5' || name === 'fa6' || name === 'fa7' ){
			let thisIn = this;
			setTimeout(function(){
				
				let mark = Number(thisIn.state.fa1 || 0) + Number(thisIn.state.fa2 || 0) 
						+ Number(thisIn.state.fa3 || 0) + Number(thisIn.state.fa4 || 0) 
						+ Number(thisIn.state.fa5 || 0) + Number(thisIn.state.fa6 || 0)
						+ Number(thisIn.state.fa7 || 0);
				thisIn.setState({
					fisherMark:mark,
				});
				const computeFisher ={
					fa1:thisIn.state.fa1,
					fa2:thisIn.state.fa2,
					fa3:thisIn.state.fa3,
					fa4:thisIn.state.fa4,
					fa5:thisIn.state.fa5,
					fa6:thisIn.state.fa6,
					fa7:thisIn.state.fa7,
					fisherMark:thisIn.state.fisherMark,
					stock_id:thisIn.state.stock_id,
				};
				axios.post("/wages/watchlist/api/compute-fisher",computeFisher)
				.then((response)=>{
					console.log(response);
				})
				.catch(function(error){
					console.log(error.response);
				});
			},500);
			
			
		}
	}

	addWatchlist(e,id){
		const wl = {
			id:id,

		}
		this.setState({
			stock_list:[],
		})
		this.refs.searchInput.value = "";
		axios.post('/wages/watchlist/api/add-watchlist',wl)
		.then((response)=>{
			console.log(response);
			this.notify("Stock added to watchlist",3000);
			this.indexWatchlist();

		})
		.catch(function(error){
			console.log(error.response);
		})

	}

	updatePrice(){
		axios.post('/wages/watchlist/api/update-price')
		.then((response)=>{
			this.indexWatchlist();
		})
		.catch(function(error){
			console.log(error.response);
		});
	}

	deleteWatchlist(id){
		axios.delete('/wages/watchlist/api/delete-watchlist/'+id)
		.then((response)=>{
			console.log(response);
			this.notify("Stock deleted from watchlist",3000);
			this.indexWatchlist();
		})
		.catch(function(error){
			console.log(error.response);
		});
	}

	notify(msg,duration){
		let thisIn = this;
		this.refs.notification.innerHTML = msg;
		setTimeout(function(){
			thisIn.refs.notification.innerHTML = "";
		},duration)
	}

	showGisRank(e,id){
		e.preventDefault();
		this.setState({
			stock_id:id,
		});
		console.log(id);
		axios.get('/wages/watchlist/api/show-gis-rank/'+id)
		.then((response)=>{
			console.log(response.data);
			if(response.data){
				this.setState({
					ba1_1:response.data.ba1_1,
					ba1_2:response.data.ba1_2,
					ba1_3:response.data.ba1_3,
					ba1_4:response.data.ba1_4,
					ba1_5:response.data.ba1_5,
					ba1:response.data.ba1,
					ba2:response.data.ba2,
					ba3:response.data.ba3,
					ba4:response.data.ba4,
					ba5:response.data.ba5,
					ba6:response.data.ba6,
					ba7:response.data.ba7,
					fa1:response.data.fa1,
					fa2:response.data.fa2,
					fa3:response.data.fa3,
					fa4:response.data.fa4,
					fa5:response.data.fa5,
					fa6:response.data.fa6,
					fa7:response.data.fa7,
					buffettMark:response.data.buffettMark,
					fisherMark:response.data.fisherMark,
				})
			}

			if(Object.keys(response.data).length === 0){
				this.setState({
					ba1_1:'',
					ba1_2:'',
					ba1_3:'',
					ba1_4:'',
					ba1_5:'',
					ba1:'',
					ba2:"",
					ba3:"",
					ba4:"",
					ba5:"",
					ba6:"",
					ba7:"",
					fa1:"",
					fa2:"",
					fa3:"",
					fa4:"",
					fa5:"",
					fa6:"",
					fa7:"",
					buffettMark:'',
					fisherMark:'',
				});
			}
		})
		.catch(function(error){
			console.log(error.response);
		});
	}

	componentWillMount(){
		this.indexWatchlist();
	}

	componentDidMount(){
		// this.updatePrice();
	}

	render(){
		return (
			<div className="container">
			<div className="row">
			<div className="col-md-12">
				<h1 className="pageTitle">Watchlist<span>WATCHLIST</span></h1>
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
									<a ><li className="list-group-item" name="selectedStock" onClick={(e) => this.addWatchlist(e,value.id) }
										>
										{value.name} - {value.code}({value.id})
									</li></a>
								)
							})}
							</ul>
						</div>
					</div>
					
				</div>
				<div className="col-md-6">
					<h3 style={style.h3color}>Buffett Approach ({this.state.buffettMark})</h3>
					<table className="table table-bordered">
						<tr>
							<td>Business Sexiness</td>
							<td></td>
								
							<td><input type="text" name="ba1" className="form-control" 
									style={style.input} value={this.state.ba1} disabled
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Supplier No.</td>
							<td><input type="text" name="ba1_1" className="form-control" 
									style={style.input} value={this.state.ba1_1}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Customer Choices</td>
							<td><input type="text" name="ba1_2" className="form-control" 
									style={style.input} value={this.state.ba1_2}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Barrier of Entry</td>
							<td><input type="text" name="ba1_3" className="form-control" 
									style={style.input} value={this.state.ba1_3}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Substitute</td>
							<td><input type="text" name="ba1_4" className="form-control" 
									style={style.input} value={this.state.ba1_4}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Competition No.</td>
							<td><input type="text" name="ba1_5" className="form-control" 
									style={style.input} value={this.state.ba1_5}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Competitiveness (1st/2nd)</td>
							<td></td>
							<td><input type="text" name="ba2" className="form-control" 
									style={style.input} value={this.state.ba2}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>FPE&lt;25</td>
							<td></td>
							<td><input type="text" name="ba3" className="form-control" 
									style={style.input} value={this.state.ba3}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Gearing&lt;1.5</td>
							<td></td>
							<td><input type="text" name="ba4" className="form-control" 
									style={style.input} value={this.state.ba4}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>GP Cashflow&gt;0.88</td>
							<td></td>
							<td><input type="text" name="ba5" className="form-control" 
									style={style.input} value={this.state.ba5}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Good Will</td>
							<td></td>
							<td><input type="text" name="ba6" className="form-control" 
									style={style.input} value={this.state.ba6}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Customer Loyalty</td>
							<td></td>
							<td><input type="text" name="ba7" className="form-control" 
									style={style.input} value={this.state.ba7}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
					</table>
				</div>
				<div className="col-md-6">
					<h3 style={style.h4color}>Fisher Approach ({this.state.fisherMark})</h3>
					<table className="table table-bordered">
						<tr>
							<td>Future Grow Opportunity</td>
							<td><input type="text" name="fa1" className="form-control" 
									style={style.input} value={this.state.fa1}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Competitiveness (1st/2nd)</td>
							<td><input type="text" name="fa2" className="form-control" 
									style={style.input} value={this.state.fa2}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Net Margin&gt;15</td>
							<td><input type="text" name="fa3" className="form-control" 
									style={style.input} value={this.state.fa3}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>GP Cashflow&gt;0.88</td>
							<td><input type="text" name="fa4" className="form-control" 
									style={style.input} value={this.state.fa4}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Marginal Cost (R&D Important)</td>
							<td><input type="text" name="fa5" className="form-control" 
									style={style.input} value={this.state.fa5}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Leadership</td>
							<td><input type="text" name="fa6" className="form-control" 
									style={style.input} value={this.state.fa6}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
						<tr>
							<td>Talent</td>
							<td><input type="text" name="fa7" className="form-control" 
									style={style.input} value={this.state.fa7}
									onChange={(e) => this.handleUserInput(e)}/>
							</td>
						</tr>
					</table>
				</div>
				<div className="col-md-12">
					<h4 ref="notification"></h4>
					<table className="table table-striped">
						<thead>
							<th>Stock Code</th>
							<th>Stock Name</th>
							<th>Current Price</th>
							<th>Last Update</th>
						</thead>
						<tbody>
						
								
							{this.state.watchlist.map((value,i)=>{
								return(
									<tr key={i}>
										<td>
											<button className="btn btn-danger" 
												onClick={()=>this.deleteWatchlist(value.id)}>
												<i class="fa fa-trash" aria-hidden="true"></i>
											</button>
											{value.code}
										</td>
										<td><a href="#" onClick={(e)=>this.showGisRank(e,value.id)}>{value.name}</a></td>
										<td>{value.current_price}</td>
										<td>{value.updated_at}</td>
									</tr>
								)
								
							})}
							
						</tbody>
					</table>
				</div>
		    </div>
		    </div>
		)
	}
}

