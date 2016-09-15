<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CRUD</title>

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
                        <a href="{{route('form')}}"> <i class="fa fa-plus"> </i> Form</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $message) 
            <li> {{ $message }} </li>
          @endforeach
        </ul>
      </div>
    @endif


    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
              <h2> Add Customer </h2> <hr>
              <form method="post" enctype="multipart/form-data" action="store">
                  <div class="form-group">
                    <label for="name"> Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{Request::old('name')}}">
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="dob"> Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="{{Request::old('dob')}}">
                  </div>

                  <div class="form-group">
                    <label for="gender"> Gender </label> <br />
                    <input type="radio" name="gender" id="gender" value="Male" checked> Male
                    <input type="radio" name="gender" id="gender" value="Female"> Female
                  </div>

                  <div class="form-group">
                    <label for="country"> Country </label> <br />
                    <select class="form-control" name="country" id="country" value="{{Request::old('country')}}">
                    <option>India</option>
                    <option>USA</option>
                    <option>Australia</option>
                    <option>Canada</option>
                    <option>UK</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="address"> Mailing Address </label> <br />
                    <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"> {{Request::old('address')}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="email"> Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{Request::old('email')}}">
                  </div>

                  <div class="form-group">
                    <label for="address"> Favourite Food </label> <br />
                    <label class="checkbox-inline">
                      <input type="checkbox" id="favourite" name="favourite[]" value="North"> North
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox"  id="favourite" name="favourite[]" value="East"> East
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox"  id="favourite" name="favourite[]" value="West"> West
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox"  id="favourite" name="favourite[]" value="South"> South
                    </label>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile"> Profile Photo </label>
                    <input type="file" id="exampleInputFile" name="image" id="image">
                  </div>

                  <div class="checkbox">
                    <label>
                    <input type="checkbox"> Check me out
                  </label>                
                  </div>

                  <button type="submit" class="btn btn-default">Submit</button>

             </form>



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
    
    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>
 