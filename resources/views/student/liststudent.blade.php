@extends('crud')
@section('content')
  <h2> Student List </h2>
 <div class="container>
 <div class="row">
 <div class="col-sm-12">
 <a href="{{route('create')}}"> <i class="fa fa-plus"> </i> Add  </i></a>
 <table class="table">
 <thead>
 <tr>
 <th> First Name </th>
 <th> Last Name </th>
 <th> Date of Birth </th>
 <th> Place of Birth </th>
 <th> Action </th>
 </tr>
 </thead>
 <tbody>
 @foreach($student as $students)
 <tr>
 <td> {{ $students->firstname }} </td>
  <td> {{ $students->lastname }} </td>
   <td> {{ $students->dob }} </td>
    <td> {{ $students->pob }} </td>
     <td>  <a href="{{route('edit', $students->id)}}"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>  &nbsp; &nbsp;
       <a href="{{route('delete', $students->id)}}"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 
 </div>
 </div>
 </div>
 

 
 
@stop