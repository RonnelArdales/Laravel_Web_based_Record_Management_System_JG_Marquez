@section('title', 'Register')

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<style>
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
      }

      body{
            background-color: #829460;
            padding: 0;
            margin: 0;
            font-family: 'Inter';
            font-size: 14px;
      }

      input{
            font-size: 14px;
            font-family: 'Inter';
      }

      .form-control:focus{
            outline: none;
      }

      .input:focus{
            outline: none;
      }

      .sample{
            background-image:url('https://res.cloudinary.com/uhno-dos-tres/image/upload/v1682778291/JG_MARQUEZ_RPSY_register_jkl47v.png');
            background-size:cover;
            background-repeat: no-repeat;
            background-position:center;
            height:100vh
      }
      @media (max-width: 580px) {
            .sample{
                  height: 45vh;
                  width:100%;
            }
            h2{
                  margin-top:25px; 
            }
      }

      .input-box{
            padding-left: 12px;
            padding-right: 12px;
            background:#829460;
            border: 1px solid #EDDBC0;
            height: 24px;
            border-radius:0; 
            color: white;
            font-size: 14px;"
      }

      .input-box input{
            width:87%;
            outline:none;
            border:none;
            background:#829460;
            height: 22px;
            color: white;
            font-size: 14px;
      }

      .input-box #password_confirmation{
            width:95%;
            outline:none;
            border:none;
            background:#829460;
            height: 22px;
            color: white;
            font-size: 14px;"
      }
</style>

<body>
      <div>
            <div class="container-fluid " style="width:100%; color:white">
                  <div class="row">                    
                        <div class="col-sm" style="padding: 0px" >
                              <div class="sample" >
                                    <a href="/" style="text-decoration: none;color:white"><h4  style="font-weight: 800;padding-left:15px;" >JG MARQUEZ, RPSY</h4></a> 
                              </div>
                        </div>
                                    <!--------------- RIGHT SIDE  CONTENTS ----------------->
                        <div class="col-sm" style="display: flex;flex-direction:column; justify-content:center;">
                              <div style="padding-left:2%">
                                    <h2 style="font-weight: 800;">WELCOME.</h2>
                                    <p style="padding: 0; margin:0;">To sign up, please complete all needed information below. <b> Do not leave any fields blank. </b> </p>
                                    <div style="display: flex;flex-direction:row;padding: 0; margin:0;">
                                          <p style="padding: 0; margin:0;">Already have an account? <a href="/login " style="text-decoration: none;color:white;"> <b> Log in here.</b> </a></p>
                                    </div>
                              </div>
                                    
                              <!----FILL UP FORM FOR REGISTER / TEXTBOXES----------->

                              <div style="padding:4%; width:75%;height: auto;align-self:center;"> 
                                    <form class="row"  action="/store" method="POST">
                                          @csrf
                                          <div class="container">
                                                <div class="row" style="color: white">

                                                      <div class="col-sm" >
                                                            <label for="inputEmail4" class="form-label">First Name</label>
                                                            <input  style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;" type="text" class="form-control" value="{{old('first_name')}}" name="first_name" >

                                                            @error('first_name')
                                                            <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>

                                                      <div class="col-sm" >
                                                            <label for="inputPassword4" class="form-label">Middle Name</label>
                                                            <input style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;" type="text" value="{{old('mname')}}"  class="form-control" name="mname" >                    
                                                      </div>

                                                      <div class="col-sm">
                                                            <label for="inputPassword4" class="form-label">Last Name</label>
                                                            <input style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;" type="text" class="form-control" value="{{old('last_name')}}" name="last_name" >

                                                            @error('last_name')
                                                            <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>

                                                      <div class="row" style="margin-top:2%;padding-right:0;">

                                                            <div class="col-sm" style="padding-right:0px">
                                                            <label for="inputPassword4" class="form-label">Birth Date</label>
                                                            <input style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;" type="date" class="form-control" id="birthday" value="{{old('birthday')}}" name="birthday" >

                                                                  @error('birthday')
                                                                  <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-sm" style="padding-right:0px">
                                                                  <label for="">Age</label>
                                                                  <input type="number" readonly style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0;margin-top:8px; color: white;font-size: 14px;"  style="text-align:center" id="age" value="{{old('age')}}" type="age" class="form-control"   name="age" >

                                                                  @error('age')
                                                                  <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-sm" style="padding-right: 0;">
                                                                  <label  for="">Sex</label>
                                                                  <select style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0;margin-top:8px; color: white;font-size: 14px;padding:0px 0px 0px 12px;" name="gender" class="form-control">
                                                                  <option style="text-align:center;line-height:0;font-size:2px" value="">--select--</option>
                                                                  <option value="Male" {{old('gender') == "Male" ? 'selected' : ''}}>Male</option>
                                                                  <option value="Female" {{old('gender') == "Female" ? 'selected' : ''}}>Female</option>
                                                                  </select>

                                                                  @error('gender')
                                                                  <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                                  @enderror
                                                            </div>
                                                            
                                                      </div>
                                                </div>
                                          </div>

                                          <div style="margin-top:2%">
                                                <label for="inputPassword4" class="form-label">Address</label>
                                                <input style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;"  type="text" class="form-control" value="{{old('address')}}"  name="address" >
                                                @error('address')
                                                <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                @enderror
                                          </div>

                                          <div class="container">
                                                <div class="row" style="margin-top:2%">
                                                      <div class="col-sm" style="">
                                                            <label for="inputEmail4" class="form-label">Mobile Number:</label>
                                                            <input style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;"  type="number" value="{{old('mobile_number')}}"  class="form-control" name="mobile_number"  >

                                                            @error('mobile_number')
                                                            <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>

                                                      <div class="col-7">
                                                            <label for="inputAddress" class="form-label">Email Address:</label>
                                                            <input style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;"  type="text" value="{{old('email')}}"  class="form-control" name="email" >
                                                            
                                                            @error('email')
                                                            <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>
                                                </div>
                                          </div>
                              
                                          <div class="container" >
                                                <div class="row" style="margin-top:2%">                                       
                                                      <div class="col-7">
                                                            <label for="inputAddress" class="form-label">Username:</label>
                                                            <input style="background:#829460;border: 1px solid #EDDBC0;height: 24px;border-radius:0; color: white;font-size: 14px;"  type="text" value="{{old('username')}}"  class="form-control" name="username" >
                                                            @error('username')
                                                            <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                            @enderror
                                                      </div>

                                                      <div class="col" style="padding-left: 0;">
                                                                  <label for="inputAddress" class="form-label">Password:</label>
                                                                  <div class="input-box">
                                                                        <input  type="password" autocomplete="off" id="password" name="password">
                                                                        <i class="show_password fa-regular fa-eye-slash"></i>
                                                                        <i class="hidden_password fa fa-eye" style="display: none;" ></i>
                                                                  </div>

                                                                  @error('password')
                                                                  <span  role="alert" class="block mt-5 pb-4 text-danger">{{$message}}</span>
                                                                  @enderror
                                                      </div>
                                                </div>
                                          </div>

                                          <div class="container">
                                                <div class="row" style="margin-top:2%;padding-right:0;">
                                                      <div>
                                                            <label for="inputAddress" class="form-label">Confirm Password:</label>
                                                            <div class="input-box">
                                                                  <input type="password" autocomplete="off" id="password_confirmation" name="password_confirmation">
                                                                  <i class="show_confirm_password fa-regular fa-eye-slash"></i>
                                                                  <i class="hidden_confirm_password fa fa-eye" style="display: none;"></i>
                                                            </div>
                                         
                                                      </div>
                                                </div>
                                          </div>
                              </div>

                                    <div style="padding-left:3%">
                                          <button style="font-weight: 700;background-color:#EDDBC0;border-radius: 5px;border:none;width: 89px;height: 34px; ;color: #829460; margin: 5px 0 8px 0"> Sign Up</button>

                                          <p>By clicking <b> Sign Up</b>, you agree to the <button type="button" data-bs-toggle="modal" data-bs-target="#privacy" class="logoutbutton" 
                                          style="outline: none;
                                          text-decoration: none;
                                          background:none;
                                          border:none;
                                          margin:0;
                                          font-family: 'Inter';
                                          font-weight:900;
                                          padding:0;
                                          cursor: pointer;
                                          color:white;" ><b> Terms and Privacy Policy </b> </button> .</a>  You may receive an email notification for the email verification.</p>
                                    </div>
                              </form>       
                        </div>
                  </div>
            </div>
            <x-privacyact/>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
      <script>
            $(document).ready(function(){
                  $(document).on('change', '#birthday', function(){
                        const birthday = $(this).val();
                        const currentDate = new Date();
                        const dateObject = new Date(birthday);
                        const birthYear = dateObject.getFullYear();
                        const currentYear = currentDate.getFullYear();
                        const birthMonth = dateObject.getMonth();
                        const currentMonth = currentDate.getMonth();
                        const birthDay = dateObject.getDate();
                        const currentDay = currentDate.getDate();
                        let age = currentYear - birthYear;

                        // if (currentMonth < birthMonth || (currentMonth === birthMonth && currentDay < birthDay)) {
                        //       age--; // Adjust age if current month and day are earlier
                        // }

                        $('#age').html("");
                        $('#age').val(age);
                  })  

                  $(document).on('click','.show_password', function(){
                        $('.show_password').hide();
                        $('#password').attr('type', 'text');
                        $('.hidden_password').show();
                  });

                  $(document).on('click','.hidden_password', function(){
                        $('.show_password').show();
                        $('#password').attr('type', 'password');
                        $('.hidden_password').hide();
                  });

                  $(document).on('click','.show_confirm_password', function(){
                        $('.show_confirm_password').hide();
                        $('#password_confirmation').attr('type', 'text');
                        $('.hidden_confirm_password').show();
                  });

                  $(document).on('click','.hidden_confirm_password', function(){
                        $('.show_confirm_password').show();
                        $('#password_confirmation').attr('type', 'password');
                        $('.hidden_confirm_password').hide();
                  });
            });
      </script>
</body>
</html>

   
  








