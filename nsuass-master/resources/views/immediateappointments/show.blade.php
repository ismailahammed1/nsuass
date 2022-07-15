@extends('layouts.ap')

@section('title', 'Immediate Appointments')

@section('body')

<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="fa fa-home" aria-hidden="true"></i> Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="{{ route('immediateappointments.index') }}" class="current">Immediate Appointments</a></div>
		{{-- <h1>Visitors</h1> --}}
	</div>
	
	<div class="container-fluid">
		{{-- <hr> --}}
		<br><br>
		<div class="row-fluid">
			<div class="span12">
				
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="fa fa-th"></i></span>
						<h5>Immediate Appointments</h5>
					</div>

					<div class="widget-content nopadding">
						@if($ias->isEmpty())
							<div class="alert alert-warning">No immediate visits found!</div>
						@else
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>Sl</th>
									<th>Avatar</th>
									<th>Visitor</th>
									<th>Occupation</th>
									<th>To</th>
									<th>Purpose</th>
									<th>Schedule</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@php($count=0)
								@foreach($ias as $ia)
								@php($count++)
								<tr>
									<td>{{ $count }}</td>
									<td><img src="{{ asset('images/avatar/'.$ia->avatar) }}" width="50px" height="50px" alt=""></td>
									<td>Name: <b>{{ $ia->name }}</b><br>Email: {{ $ia->email }}<br>Phone: {{ $ia->phone }}</td>
									<td>{{ ucwords($ia->occupation) }}</td>
									<td><a href="{{ route('profiles.show', $ia->hostId) }}">{{ $ia->host->name }}</a></td>
									<td>{{ ucwords($ia->purpose) }}</td>
									<td>{{ date('F j, Y, g:i a', strtotime($ia->created_at)) }}</td>
									<td>
										@if($ia->status==1)
										<span class="label label-success">Completed</span>
										@elseif($ia->status==0)
										<span class="label label-warning">Not Completed</span>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@endif
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection