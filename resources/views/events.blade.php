@extends('layouts.master')


@section('breadcrumb')
<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Home</a><span>|</span></li>
				<li>Events</li>
			</ul>
		</div>
</div>
@stop


@section('content')
<div class="events">
<h3>Events</h3>
<!---728x90--->
  <div class="w3agile_event_grids">
  	<div class="col-md-6 w3agile_event_grid">
  		<div class="col-md-3 w3agile_event_grid_left">
  			<i class="fa fa-bullhorn" aria-hidden="true"></i>
  		</div>
  		<div class="col-md-9 w3agile_event_grid_right">
  			<h4>cum soluta nobis eligendi</h4>
  			<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
  				voluptatibus.</p>
  		</div>
  		<div class="clearfix"> </div>
  	</div>
  	<div class="col-md-6 w3agile_event_grid">
  		<div class="col-md-3 w3agile_event_grid_left">
  			<i class="fa fa-bullseye" aria-hidden="true"></i>
  		</div>
  		<div class="col-md-9 w3agile_event_grid_right">
  			<h4>rerum hic tenetur a sapiente</h4>
  			<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
  				voluptatibus.</p>
  		</div>
  		<div class="clearfix"> </div>
  	</div>
  	<div class="clearfix"> </div>
  </div>
  <div class="w3agile_event_grids">
  	<div class="col-md-6 w3agile_event_grid">
  		<div class="col-md-3 w3agile_event_grid_left">
  			<i class="fa fa-credit-card" aria-hidden="true"></i>
  		</div>
  		<div class="col-md-9 w3agile_event_grid_right">
  			<h4>earum rerum tenetur sapiente</h4>
  			<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
  				voluptatibus.</p>
  		</div>
  		<div class="clearfix"> </div>
  	</div>
  	<div class="col-md-6 w3agile_event_grid">
  		<div class="col-md-3 w3agile_event_grid_left">
  			<i class="fa fa-eye" aria-hidden="true"></i>
  		</div>
  		<div class="col-md-9 w3agile_event_grid_right">
  			<h4>quibu aut officiis debitis</h4>
  			<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
  				voluptatibus.</p>
  		</div>
  		<div class="clearfix"> </div>
  	</div>
  	<div class="clearfix"> </div>
  </div>
  <div class="w3agile_event_grids">
  	<div class="col-md-6 w3agile_event_grid">
  		<div class="col-md-3 w3agile_event_grid_left">
  			<i class="fa fa-cog" aria-hidden="true"></i>
  		</div>
  		<div class="col-md-9 w3agile_event_grid_right">
  			<h4>necessitatibus saepe eveniet</h4>
  			<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
  				voluptatibus.</p>
  		</div>
  		<div class="clearfix"> </div>
  	</div>
  	<div class="col-md-6 w3agile_event_grid">
  		<div class="col-md-3 w3agile_event_grid_left">
  			<i class="fa fa-trophy" aria-hidden="true"></i>
  		</div>
  		<div class="col-md-9 w3agile_event_grid_right">
  			<h4>repudiandae sint et molestiae</h4>
  			<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
  				voluptatibus.</p>
  		</div>
  		<div class="clearfix"> </div>
  	</div>
  	<div class="clearfix"> </div>
  </div>
<!---728x90--->
  <div class="events-bottom">

    @foreach($events as $event)
  	 <div class="col-md-6 events_bottom_left">
  		<div class="col-md-4 events_bottom_left1">
  			<div class="events_bottom_left1_grid">

  				<h4>{{ $event->event_datetime->day }}</h4>
  				<p>{{  $event->event_datetime->format('F') }}, {{  $event->event_datetime->year }}</p>
  			</div>
  		</div>
  		<div class="col-md-8 events_bottom_left2">
  			<img src='{{ asset("images/$event->image") }}' alt=" " class="img-responsive">
  			<h4>{{$event->title}}</h4>
  			<ul>
  				<li><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $event->event_datetime->format('g:i A')}}</li>
  				<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>
  			</ul>
  			<p>{{ $event->description }}.</p>
  		</div>
  		<div class="clearfix"> </div>
  	</div>
  	@endforeach
  	<div class="clearfix"> </div>
  </div>
</div>
@stop
