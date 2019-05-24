<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include FontAwesome CSS if you want to use feedback icons provided by FontAwesome -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/fontawesome/4.1.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrapValidator.min.css">
    <style>
      .bv-form .help-block{color:red;}
      .form-horizontal .has-feedback .form-control-feedback {display:block;position: absolute;top:10px;right:25px;font-weight:800;}
      .form-horizontal .has-error .form-control-feedback {color:red;}
      .form-horizontal .has-success .form-control-feedback {color:green;}
      .has-error .form-control{border-color:red;}
      .has-success .form-control{border-color:green;}
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form id="registrationForm" method="post" class="form-horizontal" style="border:1px solid #ececec;margin-top:50px;padding:15px;">
          <div class="form-group row">
            <label class="col-sm-3 control-label">Fullname</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="fullname" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Gender</label>
            <div class="col-sm-9">
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Male" /> Male
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Female" /> Female
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Other" /> Other
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Date of birth</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="birthday" placeholder="YYYY/MM/DD" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Email Id</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="email" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Mobile</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="mobile" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="phone" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">State</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="state" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">City</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="city" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Street</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="street" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Landmark</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="landmark" />
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="address" />
            </div>
          </div>

          <!--div class="form-group row">
              <label class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                  <input type="password" class="form-control" name="password" />
              </div>
          </div -->

          <div class="form-group">
              <div class="col-sm-9 offset-sm-3">
                  <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                  <button type="submit" class="btn btn-primary" name="send">Add</button>
              </div>
          </div>

          <div class="alert alert-success alert-dismissible fade show" style="margin-left: 25%;width:100%;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong class="status"></strong>
              <span class="msg"></span>
          </div>
        </form>

      </div>
    </div>
  </div>

<!-- jQuery and Bootstrap JS -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> 
<script src="assets/js/bootstrapValidator.min.js"></script>

<script>
  $(document).ready(function(){
    $(".alert-success").hide();

    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            fullname: {
                message: 'The fullname is not valid',
                validators: {
                    notEmpty: {
                        message: 'The fullname is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The fullname must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: 'The fullname can only consist of alphabetical and number'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            password: {
              validators: {
                notEmpty: {
                    message: 'The password is required and cannot be empty'
                },
                different: {
                    field: 'username',
                    message: 'The password cannot be the same as username'
                },
                stringLength: {
                    min: 8,
                    message: 'The password must have at least 8 characters'
                }
              }
            },
            birthday: {
              validators: {
                notEmpty: {
                    message: 'The date of birth is required'
                },
                date: {
                    format: 'YYYY/MM/DD',
                    message: 'The date of birth is not valid'
                }
              }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            mobile: {
                message: 'The mobile is not valid',
                validators: {
                    notEmpty: {
                        message: 'The mobile is required and cannot be empty'
                    },
                    stringLength: {
                        min: 10,
                        message: 'The mobile must 10 digit long.'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The mobile can only consist of number'
                    }
                }
            },
            phone: {
              message: 'The phone is not valid',
              validators: {
                notEmpty: {
                    message: 'The phone is required and cannot be empty'
                },
                stringLength: {
                    min: 10,
                    message: 'The phone must 10 digit long.'
                },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'The phone can only consist of number'
                }
              }
            },
            state: {
              message: 'The state is not valid',
              validators: {
                notEmpty: {
                    message: 'The state is required and cannot be empty'
                },
                regexp: {
                    regexp: /^[a-zA-z ]+$/,
                    message: 'The state can only consist of Alphabets'
                }
              }
            },
            city: {
              message: 'The city is not valid',
              validators: {
                notEmpty: {
                    message: 'The city is required and cannot be empty'
                },
                regexp: {
                    regexp: /^[a-zA-z ]+$/,
                    message: 'The city can only consist of Alphabets'
                }
              }
            },
            street: {
              message: 'The street is not valid',
              validators: {
                notEmpty: {
                    message: 'The street is required and cannot be empty'
                },
                regexp: {
                    regexp: /^[a-zA-z0-9 ]+$/,
                    message: 'The street can only consist of Alphabets and number'
                }
              }
            },
            landmark: {
              message: 'The landmark is not valid',
              validators: {
                notEmpty: {
                    message: 'The landmark is required and cannot be empty'
                },
                regexp: {
                    regexp: /^[a-zA-z0-9 ]+$/,
                    message: 'The landmark can only consist of Alphabets and number'
                }
              }
            },
            address: {
              message: 'The address is not valid',
              validators: {
                notEmpty: {
                    message: 'The address is required and cannot be empty'
                },
                regexp: {
                    regexp: /^[a-zA-z0-9,-/ ]+$/,
                    message: 'The address can only consist of Alphabets and number'
                }
              }
            },
        }
    })
    .on('success.form.bv', function(e) {
      // Prevent submit form from page loading or refreshing
      e.preventDefault();
      // get the form data
		  // there are many ways to get this data using jQuery (you can use the class or id also)
      var formData = {
        'fullname'    : $('input[name=fullname]').val(),
        'gender'      : $('input[name=gender]:checked').val(),
        'birthdate'   : $('input[name=birthday]').val(),
        'email'       : $('input[name=email]').val(),
        'mobile'    	: $('input[name=mobile]').val(),
        'phone'    	  : $('input[name=phone]').val(),
        'state'    	  : $('input[name=state]').val(),
        'city'    	  : $('input[name=city]').val(),
        'street'    	: $('input[name=street]').val(),
        'landmark'    : $('input[name=landmark]').val(),
        'address'     : $('input[name=address]').val(),
      };

      //console.log(formData);
      
      // process the form
      $.ajax({
        type      : 'POST', // define the type of HTTP verb we want to use POST
        url       : 'ajaxsubmit.php', // the url where we want to POST
        data      : formData, // our data object
        dataType  : 'json', // what type of data do we expect back from the server
        encode    : true
      })
      // using the done promise callback
      .done(function(data){
        //log to the console form data in object form
        //console.log(JSON.stringify(formData));

        // log responce data to the console so we can see
        //console.log(data); 

        // ALL GOOD! just show the success message!
        $(".status").html(data.status);
	      $(".msg").html(data.msg);
        $(".alert-success").show();
        $('#registrationForm').bootstrapValidator('resetForm', true);

      }) 
    });
  });
/*
valid: 'fa fa-check',
invalid: 'fa fa-times',
validating: 'fa fa-refresh' */
</script>
</body>
</html>