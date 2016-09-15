@extends('crud')
@section('content')
<h2> Create Form </h2>
<div class="container">
<div class="row">
	<div class="col-sm-12">
		{!!Form::open(['method' => 'POST', 'url' => (!empty($student->id) ? route('update', $student->id) 
		: route('store')), 'class' => 'form-horizontal']) !!}
		<div class="form-group">
			{!!Form::label('firstname', 'First Name')!!}
			{!!Form::text('firstname',(!empty($student->id) ? $student->firstname : Null),['class' => 'form-control', 'placeholder' => 'First Name'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('lastname', 'Last Name')!!}
			{!!Form::text('lastname',(!empty($student->id) ? $student->lastname : Null),['class' => 'form-control', 'placeholder' => 'Last Name'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('dob', 'Date of Birth')!!}
			{!!Form::text('dob',(!empty($student->id) ? $student->dob : Null),['class' => 'form-control', 'placeholder' => 'Date of Birth'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('pob', 'Place of Birth')!!}
			{!!Form::text('pob',(!empty($student->id) ? $student->pob : Null),['class' => 'form-control', 'placeholder' => 'Place of Birth'])!!}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary"> Submit </button>
		</div>
		{!! Form::close() !!}
</div>
</div>
</div>

@stop