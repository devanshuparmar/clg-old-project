@extends('students.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
    	<div class="pull-left">
    		<h2>Edit Student</h2>
    	</div>
    	<div class="pull-right">
    		<a class="btn btn-primary" href="{{route('students.index')}}">
    			Back
    		</a>
    	</div>
    </div>
</div>

@if($errors->any())
<div class="alert alert-danger">
	<strong>Whoops!</strong>There were soem problems with the input. <br><br>
	<ul>

		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach

	</ul>
</div>
@endif

<form action="{{route('students.update',$student->id)}}" method="POST">
	
	@csrf

	@method('PUT')


	<div class="row">
		<div class="col-xs col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Student Name :</strong>
				<input type="text" name="Name" value="{{$student->name}}" class="form-control" placeholder="firstname lastname">
			</div>
		</div>
			<!-- <div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group">
			        <strong>Course/Sem :</strong>
			        <select name="Course/Sem" disabled>
			            <option value="IMCA-1">IMCA-1</option>
			            <option value="IMCA-2">IMCA-2</option>
			            <option value="IMCA-3">IMCA-3</option>
			            <option value="IMCA-4">IMCA-4</option>
			            <option value="IMCA-5">IMCA-5</option>
			            <option value="IMCA-6">IMCA-6</option>
			            <option value="IMCA-7">IMCA-7</option>
			            <option value="IMCA-8">IMCA-8</option>
			            <option value="IMCA-9">IMCA-9</option>
			            <option value="IMCA-10">IMCA-10</option>
			            <option value="BCA-1">BCA-1</option>
			            <option value="BCA-2">BCA-2</option>
			            <option value="BCA-3">BCA-3</option>
			            <option value="BCA-4">BCA-4</option>
			            <option value="BCA-5">BCA-5</option>
			            <option value="BCA-6">BCA-6</option>
			            <option value="MCA-1">MCA-1</option>
			            <option value="MCA-2">MCA-2</option>
			            <option value="MCA-3">MCA-3</option>
			            <option value="MCA-4">MCA-4</option>
			            <option value="MCA-5">MCA-5</option>
			            <option value="MCA-6">MCA-6</option>
			        </select>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group">
			        <strong>Division :</strong>
			        <select name="division" disabled>
			            <option value="ICA">ICA</option>
			            <option value="IET">IET</option>
			            <option value="IMS">IMS</option>
			        </select>
			    </div>
			</div> -->
		<div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
		        <strong>Enrollment Number :</strong>
		        <input type="text" name="EnrollNo" value="{{$student->Enrollment Number}}" class="form-control">
		    </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
		        <strong>E-Mail :</strong>
		        <input type="text" name="E-mail" value="{{$student->E-Mail" class="form-control" placeholder="abc@gmail.com">
		    </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
		        <strong>Password :</strong>
		        <input type="password" name="Passwd" value="{{$student->Password" class="form-control">
		    </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		    <button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>

</form>
@endsection