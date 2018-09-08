@extends('layouts.gateready.gateready-app')

@section('title')
Admin
@endsection

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid top">
    
    <!-- add client record button -->
    <div class="filter_btn">
        <button class="btn btn-default">
            <a href="#">
                Add Client's record.
            </a>
        </button>
    </div>
    <!-- all record button -->
    <div class="filter_btn">
        <button class="btn btn-default">
            <a href="#">
                All records
            </a>
        </button>
    </div>
    <!-- created today fitler client record button -->
    <div class="filter_btn">
        <button class="btn btn-default">
            <a href="#">
                Created today records
            </a>
        </button>
    </div>
    <!-- today delivery record button -->
    <div class="filter_btn">
        <button class="btn btn-default">
            <a href="#">
                Today delivery
            </a>
        </button>
    </div>
    <!-- today remaining delivery record button -->
    <div class="filter_btn">
        <button class="btn btn-default">
            <a href="#">
                Today remaining delivery
            </a>
        </button>
    </div>
    <!-- location fitler client record button -->
    <form class="filter_loc_form" method="post" action="#">
        @csrf
        <select name="location_id">
            <option selected>Select a location</option>
            
        </select>
        <button name="filter_loc" class="btn btn-default" type="submit">Filter Location

            <!-- <a href="{{ url('/gateready/TUFY/administrator/admin/location_filter_client_record') }}">
                Filter Client's record (Location).
            </a> -->
        </button>
    </form>
    <!-- today location fitler client record button -->
    <form class="filter_today_loc_form" method="post" action="@">
        @csrf
        <select name="location_id">
            <option selected>Select a location</option>
            
        </select>
        <button name="filter_loc" class="btn btn-default" type="submit">Filter Today Location

            <!-- <a href="{{ url('/gateready/TUFY/administrator/admin/location_filter_client_record') }}">
                Filter Client's record (Location).
            </a> -->
        </button>
    </form>
    <!-- search client record using tracking_number -->
    <form class="search_tracking_number_form" method="post" action="#">
        @csrf
        <input type="text" name="tracking_number" placeholder="Tracking Number">
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
                		{{ $status[$record->reference_number]->name }}
	                	<form method="post" action="/gateready/admin/edit-status/{{ $record->reference_number }}">
	                		@csrf
	                		
	                		<select name="status_id">
	                			<option selected>Choose Status</option>
	                			@foreach($statuses as $status)
	                			
	                			
	                			<option value="{{ $status->id }}">{{ $status->name }}</option>
	                			@endforeach
	                			
	                		</select>
	                		
	                		<input class="btn btn-outline-secondary" role="button" type="submit" value="Edit">
	                	</form>
                	</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>



<span>{{ $records }}</span>
    
</div>


@endsection

