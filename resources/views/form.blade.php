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
    <link rel="stylesheet" href="{{ URL::asset('assets/sweetalert/dist/sweetalert.css') }}">
    {!!Html::style('//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css')!!}
     

    <!-- Javascript Form Validations Starts -->
    <script>

      function validateForm() {

    //name text field validate
      var name = document.forms["form"]["name"].value;
        if (name == null || name == "") {
            document.getElementById('name').style.borderColor = "red";
            return false;
        }
      
      //dob calender validate
      var dob = document.forms["form"]["dob"].value;
        if (dob == null || dob == "") {
            alert("DOB must be select");
           return false;
        }

      //gender radio button validate
      ErrorText= ""; 
        if ((form.gender[0].checked == false ) && ( form.gender[1].checked == false ) ) { alert ( "Please choose your Gender: Male or Female" ); return false; }
      
      //favourite food checkboxes validate
      var fields = $("input[name='favourite[]']").serializeArray(); 
          if (fields.length === 0) 
          { 
              alert('Selected Favourite Food'); 
              // cancel submit
              return false;
          } 

      //input file image validate
      var image = document.getElementById("image");
          if(image.value == '')
          {
              alert('Please select image');
              return false;
          }

      //country dropdown validate
      var country = document.getElementById("country");
        if (country.value == "") {
            //If the "Please Select" option is selected display error.
            alert("Please select a country");
            return false;
        }
      
      //address textarea validate
      var a = document.form.address.value;
        if(a=="")
        {
            alert("please Enter the address");
            document.form.address.focus();
            return false;
            }
            if((a.length < 5) || (a.length > 100))
            {
            alert(" Your address must be 5 to 100 characters");
            document.form.address.select();
            return false;
        }
      
      //email validate
      var email = document.forms["form"]["email"].value;
             atpos = email.indexOf("@");
             dotpos = email.lastIndexOf("."); 
            if(atpos < 1 || ( dotpos - atpos < 2 )) {
             alert("Please enter correct email ID")
             document.form.email.focus() ;
             return false;
            }
      
      //password, repassword required & same validate
      var password = document.forms["form"]["password"].value; 
      var repassword = document.forms["form"]["password_confirmation"].value;   
          if(password==''){
            alert("Enter Password");
            return false;
          }
          if(repassword==''){
            alert("Enter Re-Password");
            return false;
          }
          if(password==repassword){
              return true;
              }
              else{
              alert("password must be same!");
              return false;
              } 
    }
    </script>
   <!-- Javascript Form Validations Ends -->
    
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
              <form role="form" name="form" id="form" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" action="{{!empty($customers->id) ? route('update', $customers->id) : route('store')}}">
                  <div class="form-group">
                    <label for="name"> Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{!empty($customers->id) ? $customers->name : Request::old('name')}}"> <br/>
                     <span id="name"></span>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="dob"> Date of Birth</label>
                    <input type="text" class="form-control" id="datepicker" name="dob" placeholder="Date of Birth" value="{{!empty($customers->id) ? $customers->dob : Request::old('dob')}}">
                  </div>
                  <?php if(!empty($customers->id))
                  { ?> 
                  <div class="form-group">
                    <label for="gender"> Gender </label> <br />
          
                    <input type="radio" name="gender" id="gender" value="Male" <?php if(@$customers->gender=="Male") { echo 'checked="checked"'; } ?>>  Male  
                    <input type="radio" name="gender" id="gender" value="Female" <?php if(@$customers->gender=="Female") { echo 'checked="checked"'; } ?>> Female

                  </div>
                  <?php 
                } else { ?>
                <div class="form-group">
                    <label for="gender"> Gender </label> <br />
                    <input type="radio" name="gender" id="gender" value="Male" <?php if(Request::old('gender')== "Male") { echo 'checked="checked"'; } ?> >  Male  
                    <input type="radio" name="gender" id="gender" value="Female" <?php if(Request::old('gender')== "Female") { echo 'checked="checked"'; } ?>> Female
                  </div>
                  <?php }?>

                  <div class="form-group">
                    <label for="country"> Country </label> <br />
                    <select class="form-control" name="country" id="country" placeholder="Country">
                    <option> {{!empty($customers->id) ? $customers->country : Request::old('country')}} </option>
                    <option> India </option>
                    <option> USA </option>
                    <option> Australia </option>
                    <option> Canada </option>
                    <option> UK </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="address"> Mailing Address </label> <br />
                    <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"> {{!empty($customers->id) ? $customers->address : Request::old('address')}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="email"> Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{!empty($customers->id) ? $customers->email : Request::old('email')}}">
                  </div>
                   
                   <?php if(!empty($customers->id))
                  { ?> 

                  <?php } else 
                  { ?>
                  <div class="form-group">
                    <label for="password"> Password </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation "> Confirm Password </label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <?php } ?>

                  <?php if(!empty($customers->id))
                  { ?> 
                  <div class="form-group">
                    <label for="favourite"> Favourite Food </label> <br />
                    <?php $result = explode(',' , @$customers->favourite); ?>
                    <input type="checkbox" id="favourite" name="favourite[]" value="North" <?php if(is_array($result) AND in_array('North', $result))  { echo 'checked="checked"'; } ?>> North
                    <input type="checkbox"  id="favourite" name="favourite[]" value="East" <?php if(is_array($result) AND in_array('East', $result))  { echo 'checked="checked"'; } ?>> East
                    <input type="checkbox"  id="favourite" name="favourite[]" value="West" <?php if(is_array($result) AND in_array('West', $result))  { echo 'checked="checked"'; } ?>> West
                    <input type="checkbox"  id="favourite" name="favourite[]" value="South" <?php if(is_array($result) AND in_array('South', $result))  { echo 'checked="checked"'; } ?>> South
                                   
                  </div>
                  <?php }
                  else { ?>
                   <div class="form-group">

                    <label for="favourite"> Favourite Food </label> <br />
                    <input type="checkbox" id="favourite" name="favourite[]" value="North" <?php if(is_array(Request::old('favourite')) AND in_array('North', Request::old('favourite'))) { echo 'checked="checked"'; } ?>> North
                    <input type="checkbox"  id="favourite1" name="favourite[]" value="East" <?php if(is_array(Request::old('favourite')) AND in_array('East', Request::old('favourite'))) { echo 'checked="checked"'; } ?>> East
                    <input type="checkbox"  id="favourite2" name="favourite[]" value="West" <?php if(is_array(Request::old('favourite')) AND in_array('West', Request::old('favourite'))) { echo 'checked="checked"'; } ?>> West
                    <input type="checkbox"  id="favourite3" name="favourite[]" value="South" <?php if(is_array(Request::old('favourite')) AND in_array('South', Request::old('favourite'))) { echo 'checked="checked"'; } ?>> South
                  </div>
                  <?php } ?>

                  <?php if(!empty($customers->id))
                  { ?> 
                  <div class="form-group">
                    <label for="image"> Profile Photo </label>
                    <input type="file"  name="image" id="image">
                    <br />
                    <img src="{{URL::to('/image/',@$customers->image)}}" width="100px" height="100px">
                    </div>
                  <?php } 
                  else { ?> 
                  <div class="form-group">
                    <label for="image"> Profile Photo </label> <br />
                    <input type="file" name="image" id="image">
                  </div>
                  <?php }?> 
                  <div class="checkbox">
                    <label>
                    <input type="checkbox"> Check me out
                  </label>                
                  </div>

                  <button type="submit" class="btn btn-default" id="submit">Submit</button>

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
    <script src="{{ URL::asset('assets/sweetalert/dist/sweetalert.min.js') }}"></script>
    {!!Html::script('//code.jquery.com/jquery-1.10.2.js')!!}
    {!!Html::script('//code.jquery.com/ui/1.11.2/jquery-ui.js')!!}
  
    <script>
      $(function() {
      $( "#datepicker" ).datepicker();
      });
    </script>

    <script>
      $(function(){
        $('#submit').click(function(){
          var data = $("#form").serialize();
          var url = '{{URL::to('store')}}';
          $.ajax({
                  type : "post",
                  url : url,
                  data : data,
                  success : function(data)
                  {
                    alert ("submitted");
                  }
          });
      }); 
      });
    </script>

</body>

</html>
 