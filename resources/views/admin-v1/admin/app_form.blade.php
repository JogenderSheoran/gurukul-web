<!DOCTYPE html>
<html lang="en">
<head>
  <title>GoAid Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <link  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <style>



.pic {
    margin-top: 30px;
    margin-bottom: 20px;
}

.card-block {
    width: 200px;
    border: 1px solid lightgrey;
    border-radius: 5px !important;
    background-color: #FAFAFA;
    margin-bottom: 30px;
}

.card-body.show {
    display: block;
}

.card {
    padding-bottom: 20px;
    box-shadow: 2px 2px 6px 0px rgb(200, 167, 216);
}

.radio {
    display: inline-block;
    border-radius: 0;
    box-sizing: border-box;
    cursor: pointer;
    color: #000;
    font-weight: 500;
    filter: grayscale(100%);
}


.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.1);
}

.radio.selected {
    box-shadow: 0px 8px 16px 0px #EEEEEE;
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    filter: grayscale(0%);
}

.selected {
    background-color:#EEEEEE;
}



.a {
    justify-content: center !important;
}


.btn {
    border-radius: 0px;
}

.btn,
.btn:focus,
.btn:active {
    outline: none !important;
    box-shadow: none !important;
}
input.error {
    border: 1px solid red;
}

label.error {
    font-weight: normal;
    color: red;
}
label {
  width: 100%;
  font-size: 1rem;
}

.btn.active, .btn:hover {
  background-color: green;
  color: white;
}


[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio],#selectbtn {
  cursor: pointer;
}

#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

/* CHECKED STYLES */


@-webkit-keyframes fadeInCheckbox {
  from {
    opacity: 0;
    -webkit-transform: rotateZ(-20deg);
  }
  to {
    opacity: 1;
    -webkit-transform: rotateZ(0deg);
  }
}

@keyframes fadeInCheckbox {
  from {
    opacity: 0;
    transform: rotateZ(-20deg);
  }
  to {
    opacity: 1;
    transform: rotateZ(0deg);
  }
}
</style>
</head>
<body>
<div class="container" style="width:100%">
  <div class="row mt-6">
    <div class="col">
      <div class="jumbotron" style="margin-top:20px;">
        
        <div class="container">
        <div style="text-align:center"> <img src="{{URL::asset('images/card/main_logo.png')}}" height="140" width="140" style="margin-top:10px;"></div><br>
            <nav class="navbar navbar-inverse" style="background-color:#f4c709;border-color:#f4c709;text-color:white;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h4>Enter your Basic Details</h4>
                    </div>
                </div>
            </nav>
            <br>
            <div id="snackbar">Some text some message..</div>
            <form id="form" method="post" action="#">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname" placeholder="Enter your first name" name="firstname">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" placeholder="Enter your last name" id="lastname" name="lastname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="main_dob">DOB (18+)</label>
                            <input type="text"  id="datepicker"  class="form-control"  placeholder="Select date" name="user_date"  autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="occupation">Occupation</label>
                            <select  class="form-control" id="occupation"  name="occupation">
                                <option value="">Select occupation</option>
                                <option value="Salaried">Salaried</option>
                                <option value="Self Employeed">Self Employeed</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="job_title">Job Title:</label>
                            <select  class="form-control" id="job_title"  name="job_title">
                                <option value="">Select Job</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Lawyer">Lawyer</option>
                                <option value="Accountants">Accountants</option>
                                <option value="Architects/Consulting engineers">Architects/Consulting engineers</option>
                                <option value="Clerical/administrative function">Clerical/administrative function</option>
                                <option value="BFSI Professional">BFSI Professional</option>
                                <option value="Business not working on factory floors">Business not working on factory floors</option>
                                <option value="Home maker">Home maker</option>
                                <option value="Bankers">Bankers</option>
                                <option value="Builders/Contracts">Builders/Contracts</option>
                                <option value="Engineer on site">Engineer on site</option>
                                <option value="Business man working on factory floors">Business man working on factory floors</option>
                                <option value="Manual laborers not working in mines, explosive industry, electric installation">Manual laborers not working in mines, explosive industry, electric installation</option>
                                <option value="Drivers">Drivers</option>
                                <option value="Mechanics">Mechanics</option>
                                <option value="Veterinary Doctors">Veterinary Doctors</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">Select State</label>
                            <select  class="form-control" id="state"  name="state">
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="hisar">Hisar</option>
                            </select>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monthly_salary">Monthly Salary</label>
                            <input type="text" class="form-control" id="monthly_salary" placeholder="Enter Monthly Salary" name="monthly_salary">
                        </div>
                    </div>
                    <input type="hidden" value="{{ Request::segment(2) }}" name="user_id" id="userId">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="income">Annual Income</label>
                            <select  class="form-control" id="income"  name="income">
                                <option value="">Select Annual Income</option>
                                <option value="1-3 Lakh">1-3 Lakh</option>
                                <option value="3-4 Lakh">3-4 Lakh</option>
                                <option value="Above 4 Lakh">Above 4 Lakh</option>
                            </select>
                        </div>
                    </div>
                </div>
      
                <section class="pt-5 pb-5" id="cardSection" style="display:none;">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-3">Select Your Card</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">

                                            @foreach($card as $key=>$c)
                                                @php $data=json_decode($c->description,true); @endphp
                                                <div class="col-md-4 mb-3 radio-group" id="card{{$key+1}}">
                                                    <div class="card">
                                                        <img class="img-fluid" alt="100%x280" src="{{URL::asset('images/card/'.$c->icon)}}">
                                                        <div class="card-body">
                                                        {{--    @if($key==0)
                                                            <img class="img-fluid" alt="100%x280" src="{{URL::asset('images/card/card3.jpeg')}}">
                                                            @elseif($key==1)
                                                            <img class="img-fluid" alt="100%x280" src="{{URL::asset('images/card/card2.jpeg')}}">
                                                            @elseif($key==2)
                                                            <img class="img-fluid" alt="100%x280" src="{{URL::asset('images/card/card1.jpeg')}}">
                                                            @endif --}}
                                                        {{--    @php 
                                                            $numOfCols = 2;
                                                            $rowCount = 0;
                                                            $bootstrapColWidth = 12 / $numOfCols;
                                                            @endphp
                                                            <div class="row">
                                                                @foreach($data as $key=>$d)
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <img src="{{URL::asset('images/card/'.$d['image'])}}"  style="height:50px;width:50px;">
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                               <p style="font-size:12px;"> {{$d['description']}} </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php $rowCount++; @endphp
                                                                        @if($rowCount % $numOfCols == 0) </div><br><br><div class="row">@endif
                                                                @endforeach 
                                                            </div><br>--}}
                                                            <div style="text-align:center;"><button type="button" style="border-radius:10px;" class="btn btn-primary select-btn" id="selectbtn" onclick="getCardId({{$c->id}})">
                                                            Activate Now</button></div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <input type="hidden"  class="radio_button selected_card" id="card" name="card_id">
                                            </div>
                                        </div>
                                      {{--  <div class="carousel-item">
                                            <div class="row">
                                            @foreach($card as $key=>$c)
                                                @php $data=json_decode($c->description,true); @endphp
                                                @if($key > 2)
                                                <div class="col-md-4 mb-3 radio-group">
                                                    <div class="card">
                                                        <img class="img-fluid" alt="100%x280" src="{{URL::asset('images/card/'.$c->icon)}}">
                                                        <div class="card-body">
                                                            @php 
                                                            $numOfCols = 2;
                                                            $rowCount = 0;
                                                            $bootstrapColWidth = 12 / $numOfCols;
                                                            @endphp
                                                            <div class="row">
                                                                @foreach($data as $key=>$d)
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <img src="{{URL::asset('images/card/'.$d['image'])}}"  height="30" width="30">
                                                                            </div>
                                                                            <div class="col-md-9" style="padding-left:22px">
                                                                                {{$d['description']}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php $rowCount++; @endphp
                                                                        @if($rowCount % $numOfCols == 0) </div><br><br><div class="row">@endif
                                                                @endforeach 
                                                            </div><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div style="display:none;" id="afterCard">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="relationship_applicant">Email</label>
                                <input type="text" class="form-control" placeholder="Enter email address" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">Mobile No.</label>
                                <input type="text" class="form-control" placeholder="Enter mobile no" id="mobile_no" name="mobile_no" value="{{ Request::segment(3) }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="otp_field" style="display:none;">
                    <div class="col-md-9">
                            <div class="form-group">
                                <label for="mobile">Otp</label>
                                <input type="text" class="form-control" placeholder="Enter otp" id="otp" name="otp">
                                <p id="otp_error" style="color:red;"></p>
                            </div>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:void(0)" class="btn btn-primary" style="margin-top:22px;" onclick="verifyOtp()">Verify Otp</a>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kyc_type">KYC Type</label>
                                <select  class="form-control" id="kyc_type"  name="kyc_type">
                                    <option value="">Select Kyc Type</option>
                                    <option value="aadhar">Aadhar Card</option>
                                    <option value="pan">Pan Card</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="aadhar">
                                    <label for="aadhar_no">Enter Aadhar</label>
                                    <input type="text" class="form-control" placeholder="Enter Aadhar no" id="aadhar_no" name="aadhar_no">
                                </div>

                                <div class="form-group" id="pan" style="display:none;">
                                    <label for="pan_no">Enter Pan</label>
                                    <input type="text" class="form-control" placeholder="Enter KYC Details (only in capital)" id="pan_no" name="pan_no">
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nominee_name">Nominee Name</label>
                                <input type="text" class="form-control" placeholder="Enter nominee name" name="nominee_name">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="relationship_applicant">Nominee Relationship</label>
                                <select  class="form-control" id="nominee_relationship"  name="nominee_relationship">
                                    <option value="">Select Nominee Relationship</option>
                                    <option value="Father In Law">Father In Law</option>
                                    <option value="Grand Daughter">Grand Daughter</option>
                                    <option value="Grand Son">Grand Son</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Others">Others</option>
                                    <option value="Self">Self</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Son">Son</option>
                                    <option value="Son In Law">Son In Law</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Brother In Law">Brother In Law</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Father">Father</option>
                                </select>
                            </div>
                          
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nominee_dob">Nominee Dob(18 +):</label>
                                <input type="text" id="datepicker1" name="nominee_dob" placeholder="Please select nominee dob" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">Risk Start Date</label>
                                <input type="date" class="form-control" name="risk_start_date" value="{{date('Y-m-d');}}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" placeholder="Please enter location" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>  
                    <button type="submit" class="btn btn-default">Submit</button>
               </div>
            </form>
        </div>
    </div>
  </div>
  <div style="text-align:center"> <img src="{{URL::asset('images/card/main_logo.png')}}" height="140" width="140" style="margin-top:10px;">
  <h4><a href="https://www.goaid.in/health-card-privacy-policy/" target="_blank"><b>Privacy Policy</b></a></h4>
</div><br>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {

            $.validator.addMethod("minAge", function(value, element, min) {
            var today = new Date();
            var birthDate = new Date(value);
            var age = today.getFullYear() - birthDate.getFullYear();

            if (age > min + 1) {
            return true;
            }

            var m = today.getMonth() - birthDate.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
            }

            return age >= min;
        }, "You are not old enough!");


        $.validator.addMethod(
            "mobileValidation",
            function(value, element) {
                return !/^\d{8}$|^\d{10}$/.test(value) ? false : true;
            },
            "Mobile number invalid"
        );

        $.validator.addMethod("pan",
            function(value, element)
            {
                return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
            }, "Invalid Pan Number"
        );

    $("#form").validate({
        rules: {
            "email": {
                required: true,
                email: true,
            },
            "firstname": {
                required: true,
            },
            "mobile_no": {
                required: true,
                mobileValidation: $("#mobile_no").val(),
            },
            "user_date": {
                required: true,
            },
            "monthly_salary": {
                required: true,
                digits: true,
            },
            "occupation": {
                required: true,
            },
            "job_title":{
                required:true,
            },
            "state":{
                required:true,
            },
            "income":{
                required:true,
            },
            "relationship_applicant":{
                required:true,
            },
            "applicant_name":{
                required:true,
            },
            "kyc_type":{
                required:true,
            },
            "nominee_name":{
                required:true,
            },
            "nominee_relationship":{
                required:true,
            },
            "nominee_dob":{
               required:true,
               minAge: 18,
            },
            "location":{
               required:true,
            },
        },
        messages: {
            "email": {
                required: "Please enter <b>email</b>",
                email: "Please enter a valid email address",
            },
            "mobile_no": {
                required: "Please enter <b>mobile no</b>",
            },
            "user_date": {
                required: "Please enter <b>date of birth</b>",
            },
            "occupation": {
                required: "Please select <b>occupation</b>",
            },
            "monthly_salary": {
                required: "Enter monthly <b>salary</b>",
                number:"Please enter numbers Only"
            },
            "job_title":{
                required:"Please select <b>job title</b>",
            },
            "state":{
                required:"Please select <b>state</b>",
            },
            "income":{
                required:"Please select <b>annual income</b>",
            },
            "relationship_applicant":{
                required:"Please select <b>relationship applicant</b>",
            },
            "applicant_name":{
                required:"Please enter <b>applicant name</b>",
            },
            "kyc_type":{
                required:"Please select <b>kyc type</b>",
            },
            "nominee_name":{
                required:"Plesae enter <b>nominee name</b>",
            },
            "nominee_relationship":{
                required:"Please select <b>nominee relationship</b>",
            },
            "nominee_dob":{
                required:"Plese select <b>nominee dob</b>",
                minAge: "You must be at least 18 years old!",
            },
            "location":{
                required:"Plese enter <b>location</b>",
            },
        },
        submitHandler: function (form) { // for demo
            var card=$('#card').val();
            if(card==undefined || card==null){
                $("#snackbar").html("Please select a card");
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                return false;
            }
            else{
                $("#afterCard").css('display','block');
            }
            sessionStorage.setItem("userId",$("#userId").val());
            var data = $("#form").serialize();
            $.ajax({
                type: "post",
                // url: "http://128.199.25.50/api/user-data",
                url: window.location.origin+'/goaid/api/user-data',
                data: data,
                dataType: "json",
                success: function(data) {
                    if(data.status==false){
                        $("#snackbar").html("Card already process on your account");
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                     }
                     else{
                    // window.location.href =  window.location.origin+'/goaid/user-payment/'+data.user_id
                          window.location.href =  window.location.origin+'/goaid/thankyou'
                     }
                },
                error: function(error) {
                    console.log('error');
                    alert("Error");
                }
            });
            // return false; // for demo
        }
    });

});

function setPayment(price){
    sessionStorage.setItem("price",price);
}

$("#kyc_type").on("change", function() {
    if(this.value=='aadhar'){
        $("#aadhar").css('display','block');
        $("#pan").css('display','none');
        $('#aadhar_no').rules('add',  { required: true,digits:true,minlength:12,maxlength:12 });
        $('#pan_no').rules('remove',  { required: true, pan: $("#pan_no").val()});
    }
    if(this.value=='pan'){
        $("#aadhar").css('display','none');
        $("#pan").css('display','block');
        $('#pan_no').rules('add',   { required: true, pan: $("#pan_no").val()});
        $('#aadhar_no').rules('remove',  { required: true,digits:true,minlength:12,maxlength:12});
    }

});



var maxBirthdayDate = new Date();
maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );

$( "#datepicker" ).datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,
    changeYear: true,
	maxDate: maxBirthdayDate,
    yearRange: "-100:+100",
});

$( "#datepicker1" ).datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,
    changeYear: true,
	maxDate: maxBirthdayDate,
    yearRange: "-100:+100"
});

$('.select-btn').on('click', function(){
    $('.select-btn').removeClass('active')
    $(this).addClass('active');
})


$('#income').change(function() {
    var rr= $('input[name="card_id"]:checked').val();
    $('#card').val('');
    $('.select-btn').removeClass('active');
  var val = $(this).val(); 
  $("#cardSection").css('display','block');
  if(val == '1-3 Lakh'){
        $("#card1").css('display','block');
        $("#card2").css('display','none');
        $("#card3").css('display','none');
  }
  if(val == '3-4 Lakh'){
        $("#card1").css('display','block');
        $("#card2").css('display','block');
        $("#card3").css('display','none');
  }
  if(val == 'Above 4 Lakh'){
        $("#card1").css('display','block');
        $("#card2").css('display','block');
        $("#card3").css('display','block');
  }
})

function validateAge(age) {
    var input = age.value;
    if(input>=18) {
        return true;
    }
    else {
        return false;
    }
}

</script>

<script>
    $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});

$(document).ready(function () {
    $('.radio-group').click(function () {
        $('.selected .fa').removeClass('fa-check');
        $('.radio-group').removeClass('selected');
        $(this).addClass('selected');
        $("#afterCard").css('display','block');
    });
});

$(document).ready(function(){
    $('#pan_no').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
});

function sendOtp(){
    var mobile=$("#mobile_no").val();
    if(mobile.length==10){
        $("#otp_field").css('display','flex');
        $.ajax({
                type: "post",
                url: window.location.origin+'/goaid/api/send-otp',
                data: {'mobile':mobile},
                success: function(data) {   
                    if(data.status==true){
                        $("#submit_button").prop('disabled',true);
                        sessionStorage.setItem("otp",data.otp);
                    }
                },
                error: function(error) {
                    alert("Error");
                }
            });
    }
}

function verifyOtp(){
    var otp=$("#otp").val();
    var sendOtp=sessionStorage.getItem("otp");
    if(otp==sendOtp){
        $("#snackbar").html("Otp verified successfully");
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
         $("#submit_button").prop('disabled',false);
         $("#otp_field").css('display','none');
    }
    else{
        $("#otp_error").html("Invalid otp! Please enter valid otp");
    }
    
}

function getCardId(card){
  $("#card").val(card);
}

</script>



</body>
</html>