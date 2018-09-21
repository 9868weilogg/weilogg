@extends('layouts.dishmotion-app')

@section('title')
Unsuccessful Order
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>
				Upcoming Menu (17th November 2015) - peanut-lotusroot-soup 花生莲藕汤 + rice cook with long bean and ham 火腿豆角焖饭 
			</h2>
			<img src="image/dishmotion/peanut lotus soup.jpg">
		</div>
		<div class="col-md-4">
			<h4>
				Operating Hour 
			</h4>
			<p>
				Every Tuesday and Thursday
			</p>
			<h4>
				How it works?
			</h4>
			<p>
				DishMotion is using reusable food containers with keep warm feature, which allow customer enjoy the food in warm condition.
				DishMotion will contact the customer to collect the food containers during customer free time.
			</p>
			<h4>
				Payment Method
			</h4>
			<p>
				RM6.00 per set (Cash On Delivery)
			</p>
			<h4>
				Whatsapp Us 
			</h4>
			<p>
				017-1234567
			</p>
			<h4>
				Products
			</h4>
			<p>
				(17th November 2015) - peanut-lotusroot-soup <a href="/dishmotion/soup">+more soup</a>
			</p>
		</div>
	</div>

	<div class="row form">
		@if(count($errors)>0)
		<h3 class="col-md-12">
			Order Unsuccessful
		</h3>

		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>

		@endif
		<form class="col-md-12" action="/dishmotion/orders" method="post">
			@csrf
			<div class="form-group">
				<label for="menu">Menu:</label>
				<input type="text" name="menu" readonly required class="form-control" value="chicken rice">
			</div>
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" required class="form-control">
			</div>
			<div class="form-group">
				<label for="contact">Contact:</label>
				<input type="text" name="contact" required class="form-control">
			</div>
			<div class="form-group">
				<label for="quantity">Quantity:</label>
				<select name="quantity" required="true" class="form-control">
					<!--<option selected>Please select quantity</option>-->
					<option></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
				</select>
			</div>
			<div class="form-group">
				<label for="kolej">Kolej:</label>
				<select name="kolej" required="true" class="form-control">
					<!--<option selected>Please select Kolej</option>-->
					<option></option>
					<option value="KMR (Kolej Mohammad Rashid)">KMR (Kolej Mohammad Rashid)</option>
					<option value="K2 (Kolej Dua)">K2 (Kolej Dua)</option>
					<option value="KTDI (Kolej Tun Dr. Ismail)">KTDI (Kolej Tun Dr. Ismail)</option>
					<option value="KC (Kolej Canselor)">KC (Kolej Canselor)</option>
					<option value="K5 (Kolej Lima)">K5 (Kolej Lima)</option>
					<option value="K6 (Kolej Enam)">K6 (Kolej Enam)</option>
					<option value="KOSASS (Kolej Sultan Alaeddin Suleiman Shah)">KOSASS (Kolej Sultan Alaeddin Suleiman Shah)</option>
					<option value="KPZ (Kolej Pendita Za'ada)">KPZ (Kolej Pendita Za'ada)</option>
					<option value="KTP (Kolej Tun Perak)">KTP (Kolej Tun Perak)</option>
					<option value="K10 (Kolej Sepuluh)">K10 (Kolej Sepuluh)</option>
					<option value="K11 (Kolej Sebelas)">K11 (Kolej Sebelas)</option>
					<option value="Serumpun (K12,K14,K15,K16)">Serumpun (K12,K14,K15,K16)</option>
					<option value="K13 (Kolej Tiga Belas)">K13 (Kolej Tiga Belas)</option>
					<option value="K17 (Kolej Tujuh Belas)">K17 (Kolej Tujuh Belas)</option>
					<option value="Old Flat">Old Flat</option>
				</select>
			</div>
			<button type="submit" value="Order" class="btn btn-primary">Order</button>
		</form>
	</div>
</div>
@endsection

