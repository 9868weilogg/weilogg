@extends('layouts.gateready.gateready-app')

@section('title')
Admin
@endsection

@section('content')

<!-- if signed in user is weilogg mean he is admin, show the content -->
@if(Auth::user()->id == 'DQ0D')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid top">
    
    
    <!-- all record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/Logg5843/show-all-records">
            <button class="btn btn-default">
                All records
            </button>
        </a>
        
    </div>
    <!-- created today fitler client record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/Logg5843/show-today-records">
            <button class="btn btn-default">
                Created today records
            </button>
        </a>
        
    </div>
    <!-- today delivery record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/Logg5843/show-today-delivery">
            <button class="btn btn-default">
                Today delivery
            </button>
        </a>
        
    </div>
    <!-- today remaining delivery record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/Logg5843/show-today-remaining-delivery">
            <button class="btn btn-default">
                Today remaining delivery
            </button>
        </a>
        
    </div>
    
    <!-- search client record using tracking_number -->
    <form class="search_tracking_number_form" method="get" action="/gateready/admin/Logg5843/filter-tracking-number">
        @csrf
        <input type="text" name="tracking_number" placeholder="Tracking Number" required>
        <button name="filter_loc" class="btn btn-default" type="submit">Search Tracking Number

            <!-- <a href="{{ url('/gateready/TUFY/administrator/admin/location_filter_client_record') }}">
                Filter Client's record (Location).
            </a> -->
        </button>
    </form>
    <!-- $records->render() -->
    <div class="all_records">
        <table class="table table-striped panel panel-warning">
            <thead class="panel-heading">
                <th>Customer Name & Number</th>
                <th>Tracking Number</th>
                <th>Courier Name</th>
                <th>Order Date</th>
                <th>Schedule Date</th>
                <th>Schedule Time</th>
                <th>Contact Number</th>
                <th>Location</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                @if(!$record)
                <tr>
                    No records.
                </tr>
                @else

                
                <tr>
                	<td>{{ $customer[$record->gateready_user_id]->name }} , {{ $customer[$record->gateready_user_id]->id }}</td>
                	<td>{{ $record->reference_number }}</td>
                	<td>{{ $courier[$record->reference_number]->name }}</td>
                	<td>{{ $record->created_at }}</td>
                	<td>{{ $record->schedule_date }}</td>
                	<td>{{ $time_range[$record->reference_number]->name }}</td>
                	<td>{{ $customer[$record->gateready_user_id]->contact_number }}</td>
                	<!-- if location is within UPM kolej -->
                	@if($location[$record->gateready_user_id]->name != 'Seri Serdang')
                	<td>{{ $location[$record->gateready_user_id]->name }}</td>
                	<!-- if location is in Seri Serdang -->
                	@else
                	<td>
                		{{ $address[$record->gateready_user_id]->address_line_1 }}<br>
                		{{ $address[$record->gateready_user_id]->address_line_2 }}<br>
                		{{ $location[$record->gateready_user_id]->name }}
                	</td>
                	@endif
                	<!-- form to edit customer's delivery status -->
                	<td>
                		{{$status[$record->reference_number]->name}}
	                	<form method="post" action="/gateready/admin/edit-status/{{ $record->reference_number }}">
	                		@csrf
	                		
	                		<select name="status_id">
	                			<option selected>Choose Status</option>
	                			@foreach($status_all as $status_a)
	                			
	                			
	                			<option value="{{ $status_a->id }}">{{ $status_a->name }}</option>
                                
	                			@endforeach
	                			
	                		</select>
	                		<input type="hidden" name="user_id" value="{{$record->gateready_user_id}}">
	                		<input class="btn btn-outline-secondary" role="button" type="submit" value="Edit">
	                	</form>
                	</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>


    
</div>
@endif

@endsection

