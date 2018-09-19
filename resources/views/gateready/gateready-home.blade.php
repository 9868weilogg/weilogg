@extends('layouts.gateready.gateready-app')

@section('title')
Home
@endsection



@section('content')
<div class="container">
<div class="cover">
    
    <h1>
        Schedule Package Delivery in UPM
    </h1>
    @guest
    <a class="btn btn-outline-primary" role="button" href="/register">Experience GateReady now</a>
    @else
    <a class="btn btn-outline-primary" role="button" href="/gateready/record/{{ Auth::user()->id }}/schedule-delivery">Experience GateReady now</a>
    @endguest
</div>
<div class="what-is-gateready">
    <h1>
        What is GateReady?
    </h1>
    <p>
        Do you like to shop online? Are you worry about missing your online purchases delivery? 
        Send your online purchases to GateReady! 
        Schedule the date and time of your convenient, we will keep your packages safe and delivery to you at the time.
    </p>
    <a class="btn btn-outline-primary" role="button" href="/gateready/about">More About GateReady</a>
</div>
<div class="how-it-works row">
    <div class="col-md-12">
        <h1>
            How It Works?
        </h1>
    </div>
    <div class="col-md-4">
        <h2>
            Send Your Online Purchases To GateReady
        </h2>
        <p>
            Checkout your online purchases and fill in the address given, as shipment address. 
            Then inform GateReady here.
        </p>
    </div>
    <div class="col-md-4">
        <h2>
            Schedule A Time To Receive Package
        </h2>
        <p>
            You will be notified when your packages arrived at GateReady. 
            Schedule the time you are convenient to receive packages from GateReady.


        </p>
    </div>
    <div class="col-md-4">
        <h2>
            Sign And Enjoy
        </h2>
        <p>
            Sign and enjoy your online purchases. 
            GateReady is always ready to receive feedback from you.
        </p>
    </div>
    <a class="btn btn-outline-primary" role="button" href="/gateready/about">Entire Process</a>
</div>
<div class="what-does-gateready-help row">
    <div class="col-md-12">
        <h1>
            What does GateReady help?
        </h1>
    </div>
    <div class="col-md-3">
        <h2>
            Be Effective
        </h2>
        <p>
            Spare only the time you have scheduled to receive your packages.
        </p>
    </div>
    <div class="col-md-3">
        <h2>
            Save Money
        </h2>
        <p>
            No self collect is needed, save the cost of transportation.
        </p>
    </div>
    <div class="col-md-3">
        <h2>
            Be Happy
        </h2>
        <p>
            No worry if you are not available at the scheduled time, you can always reschedule the time.
        </p>
    </div>
    <div class="col-md-3">
        <h2>
            Enjoy Shopping Online
        </h2>
        <p>
            Let GateReady helps you and do not worry about missing your online purchases delivery.
        </p>
    </div>
    @guest
    <a class="btn btn-outline-primary" role="button" href="/register">Experience GateReady now</a>
    @else
    <a class="btn btn-outline-primary" role="button" href="/gateready/record/{{ Auth::user()->id }}/schedule-delivery">Experience GateReady now</a>
    @endguest
</div>
<div class="pricing-and-rewards row">
    <div class="col-md-12">
        <h1>
            Pricing and Rewards
        </h1>
    </div>
    
    <div class="col-md-6">
        <h2>
            Pricing
        </h2>
        <p>
            RM 3.50 for each delivery (total weight less than 5kg)
        </p>
        <a class="btn btn-outline-primary" role="button" href="gateready/pricing">More about Pricing</a>
        <p>
            GateReady offers you free delivery for the first time.
        </p>
    </div>
    <div class="col-md-6">
        <h2>
            Rewards
        </h2>
        <p>
            Share this to your friends. After they have experienced the free delivery offered by GateReady, both of you will enjoy free credit. (worth RM 3.50 each)
        </p>
        <a class="btn btn-outline-primary" role="button" href="#">Share this to your friends</a>
    </div>
</div>
</div>



@endsection

