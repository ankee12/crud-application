<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> CRUD </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/shop-homepage.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/font-awesome.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
   
  

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">CRUD</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('create')}}">Customer List</a>
                    </li>
                    <li>
                        <a href="{{route('form')}}"> <i class="fa fa-plus"> </i> Registration</a>
                    </li>
                    <li>
                        <a href="{{route('login')}}" style="float:right;"> Log In </a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->

@if(Session::has('message')) 
<div class="alert alert-info"> 
    {{Session::get('message')}} 
</div> 
@endif


    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-lg-12 col-md-12">
              <h2> List of Customer </h2>  
              <p id="message" style="color:red;"> </p>
              <div class="table-responsive">
                <table class="table" id="example" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th> <input type="checkbox" id="checkAll"> </th>
                    <th> Name </th>
                    <th> Date of Birth </th>
                    <th> Gender </th>
                    <th> Country </th>
                    <th> Address </th>
                    <th> Email </th>
                    <th> Food </th>
                    <th> Photo </th>
                    <th> Action </th>
                  </tr>
                </thead>
            
                <tbody>
                   @foreach($customers as $customerss) 
                  <tr id="customerss{{$customerss->id}}">
                    <td> <input type="checkbox" name="checkbox[]" data-id="checkbox" class="cb" value="{{$customerss->id}}"/> </td>
                    <td> {{$customerss->name}} </td>
                    <td> {{$customerss->dob}} </td>
                    <td> {{$customerss->gender}} </td>
                    <td> {{$customerss->country}} </td>
                    <td> {{$customerss->address}} </td>
                    <td> {{$customerss->email}} </td>
                    <td> {{$customerss->favourite}} </td>
                    <td> <img src="{{URL::to('/image',$customerss->image)}}" width="50px" height="40px"> </td>
                    <td>  
                      <a href="{{route('edit', $customerss->id)}}"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>  &nbsp; &nbsp;
                     <!-- <a href="{{route('destroy', $customerss->id)}}" class="delete" id="btn-del"> <i class="fa fa-trash" aria-hidden="true"></i> </a> -->
                    </td>
                    
                  </tr>
                   @endforeach
                 
                <tbody>
                 
                </table>
                    <button type="button" id="btn-del" class="btn-del"> Delete </button>
              </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright crud 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    
    
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>

    {!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
    
    <!-- Bootstrap Core JavaScript -->
    
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

    {!!Html::script('//code.jquery.com/jquery-1.10.2.js')!!}
    {!!Html::script('//code.jquery.com/ui/1.11.2/jquery-ui.js')!!}
    {!!Html::script('//code.jquery.com/jquery-1.12.3.js')!!}
    {!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
    
    <script type="text/javascript">
      $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
    </script>

    <script type="text/javascript">
        $('#btn-del').click(function(){
           //  $('#btn-del').on('click', function(){
        //var uid = [];

          $(':checkbox:checked').each(function(){
           // $('tbody').delegate('.btn-del','click',function(){
            var id = $(this).val(); 
            var url = '{{URL::to('destroy')}}'; 
            
            //return;
            //$.get("{{route('destroy', 'id')}}", function(data){
              // console.log(data);
            //});
            if(confirm('Are you sure to delete?')==true){
             $.ajax({
               type    : "get",
               url    : url,
               data   : {'id':id},
              // async   : false,
               success: function(data)
               {
                $("#message").html(data.sms);
                //alert(data.sms);
                $('#customerss'+id).remove();
               } 
      });
      } 
        });
      });
    </script>

    <script>
    $(document).ready(function() {
    $('#example').DataTable();
    });
    </script>

</body>
</html>
 