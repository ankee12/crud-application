<html>
<head>
<script>

function validateForm() {
    var x = document.forms["form"]["name"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
	
var y = document.forms["form"]["address"].value;
    if (y == null || y == "") {
        alert("Address must be filled out");
        return false;
    }
}
</script>
</head>

<body>
<form name="form" onSubmit="return validateForm()" method="post">

<table> 
@foreach($blogs as $blog)
<tr>
    <td> {{$blog->comment}} </td>
</tr>
 @endforeach
</table>
Name <input type="text" name="name"> <br>
Address <input type="text" name="address">
<input type="submit" name="submit">
</form>
</body>
</html>