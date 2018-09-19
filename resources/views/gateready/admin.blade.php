@extends('layouts.gateready.gateready-app')

@section('title')
Admin
@endsection

@section('js-code')
<script>
    $(document).ready(function(){
        $('#statusButton').click(function(){
            $.ajax({
                url:'/test',
                type:'GET',
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    // console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show all records using AJAX
    $(document).ready(function(){
        $('#showAllRecordsAjaxBtn').click(function(){
            $.ajax({
                url:'/gateready/admin/show-all-records-ajax',
                type:'GET',
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show today records using AJAX
    $(document).ready(function(){
        $('#showTodayRecordsAjaxBtn').click(function(){
            $.ajax({
                url:'/gateready/admin/show-today-records-ajax',
                type:'GET',
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show today delivery using AJAX
    $(document).ready(function(){
        $('#showTodayDeliveryAjaxBtn').click(function(){
            $.ajax({
                url:'/gateready/admin/show-today-delivery-ajax',
                type:'GET',
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // show today remaining delivery using AJAX
    $(document).ready(function(){
        $('#showTodayRemainingDeliveryAjaxBtn').click(function(){
            $.ajax({
                url:'/gateready/admin/show-today-remaining-delivery-ajax',
                type:'GET',
                success:function(data){
                    
                    $('#ajaxResult').html(data.html);
                    console.log(data);
                }
            })
            // console.log('button works');
        });
        
    });

    // filter tracking number using AJAX
    $(document).ready(function(){
        $('#filterTrackingNumberAjaxBtn').click(function(){
            var trackingNumber = $('#trackingNumberInput').val();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                url:"/gateready/admin/filter-tracking-number-ajax",
                type:'GET',
                data: trackingNumber,
                success:function(data){
                    
                    // $('#ajaxResult').html(data.html);
                    // console.log(trackingNumber);
                }
                
            });
            // console.log('button works');


            
        });

        
    });
    
    
    
</script>
@endsection

@section('content')

<!-- if signed in user is weilogg mean he is admin, show the content -->
@if(Auth::user()->id == '1234')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid top">
    
    
    <!-- all record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/show-all-records">
            <button class="btn btn-default">
                All records
            </button>
        </a>
        <!-- <a href="/gateready/admin/show-all-records-ajax"> -->
            <button id="showAllRecordsAjaxBtn" class="btn btn-default">
                All records (AJAX)
            </button>
        <!-- </a> -->
        
    </div>
    <!-- created today fitler client record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/show-today-records">
            <button class="btn btn-default">
                Created today records
            </button>
        </a>
        <button class="btn btn-default" id="showTodayRecordsAjaxBtn">
            Created today records (AJAX)
        </button>
        
    </div>
    <!-- today delivery record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/show-today-delivery">
            <button class="btn btn-default">
                Today delivery
            </button>
        </a>
        <button class="btn btn-default" id="showTodayDeliveryAjaxBtn">
            Today delivery (AJAX)
        </button>
        
    </div>
    <!-- today remaining delivery record button -->
    <div class="filter_btn">
        
        <a href="/gateready/admin/show-today-remaining-delivery">
            <button class="btn btn-default">
                Today remaining delivery
            </button>
        </a>
        <button class="btn btn-default" id="showTodayRemainingDeliveryAjaxBtn">
            Today remaining delivery (AJAX)
        </button>
        
    </div>
    
    <!-- search client record using tracking_number -->
    <form class="search_tracking_number_form" method="get" action="/gateready/admin/filter-tracking-number">
        @csrf
        <input type="text" name="tracking_number" placeholder="Tracking Number" required>

        <button name="filter_tracking_number" class="btn btn-default" type="submit" >Search Tracking Number

            <!-- <a href="{{ url('/gateready/TUFY/administrator/admin/location_filter_client_record') }}">
                Filter Client's record (Location).
            </a> -->
        </button>

        
    </form>

    <!-- search client record using tracking_number (for AJAX)-->
    <!-- <form class="search_tracking_number_form" method="get" action="/gateready/admin/filter-tracking-number-ajax"> -->
        <!-- @csrf -->
        <input id="trackingNumberInput" type="text" name="tracking_number" placeholder="Tracking Number" required>

        <button name="filter_tracking_number" class="btn btn-default" id="filterTrackingNumberAjaxBtn" >Search Tracking Number (AJAX)

            <!-- <a href="{{ url('/gateready/TUFY/administrator/admin/location_filter_client_record') }}">
                Filter Client's record (Location).
            </a> -->
        </button>

        
    <!-- </form> -->

    <!-- button and div to test ajax trigger -->
    <button id="statusButton">get status</button>

    <!-- div to innerHTML -->
    <div id="ajaxResult"></div>

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
                	<td>{{ $record->tracking_number }}</td>
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
                		<p>{{$status[$record->reference_number]->name}}</p>
                        
                        
	                	<form method="post" action="/gateready/admin/edit-status/{{ $record->reference_number }}">
	                		@csrf
	                		
	                		<select name="status_id">
	                			<option >Choose Status</option>
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
@else
<div>
    <h1>Sorry, you are not admin.</h1>
</div>
@endif

@endsection

