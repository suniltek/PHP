
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include FontAwesome CSS if you want to use feedback icons provided by FontAwesome -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/fontawesome/4.1.0/css/font-awesome.min.css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped" id="userTable">
          <thead>
            <tr align="center">
              <th>Sr.no</th>
              <th>Fullname</th>
              <th>Birthdate</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>State</th>
              <th>City</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- jQuery and Bootstrap JS -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function(){
    $.ajax({
      type      : 'GET', // define the type of HTTP verb we want to use GET
      url       : 'user-list-api.php', // the url where we want to POST
      dataType  : 'json', // what type of data do we expect back from the server
      encode    : true,
      success: function(response){
        //console.log(response);
        var len = response.length;
        for(var i=0; i<len; i++){
          var id = response[i].id;
          var fullname = response[i].fullname;
          var birthdate = response[i].birthdate;
          var gender = response[i].gender;
          var email = response[i].email;
          var mobile = response[i].mobile;
          var state = response[i].state;
          var city = response[i].city;
          var address = response[i].address;
          var tr_str = "<tr>" +
            "<td align='center'>" + (i+1) + "</td>" +
            "<td align='center'>" + fullname + "</td>" +
            "<td align='center'>" + birthdate + "</td>" +
            "<td align='center'>" + gender + "</td>" +
            "<td align='center'>" + email + "</td>" +
            "<td align='center'>" + mobile + "</td>" +
            "<td align='center'>" + state + "</td>" +
            "<td align='center'>" + city + "</td>" +
            "<td align='center'>" + address + "</td>" +
            "<td align='center'> <a href='update-user.php?id="+id+"'> <i class='fa fa-edit'></i></a> &nbsp; <a href='delete-user.php?id="+id+"'> <i class='fa fa-trash'></i></a></td>"
            "</tr>";
          $("#userTable tbody").append(tr_str);

        }
      }
    }) 
  })
</script>

</body>
</html>