@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Portfolio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- template -->
                    <!-- You are logged in! -->

                    <!-- my portfolio -->
                    <div>
                        <a href="/dishmotion" title="DishMotion-homepage">DishMotion.com</a>
                    </div>
                    <div>
                        <a href="/gateready" title="gateready-homepage">gateready.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
