<!DOCTYPE html>
<html lang="en">
<head>
  <title>Club Registation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<form method="post" id="upload_form" enctype="multipart/form-data">
    {{ csrf_field() }}
  <h2 style="text-align:center">Sports Club Registation Form</h2>
  <div class="alert alert-success">
  <strong>Success!</strong> Registation Successful
</div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Add</a></li>
    <li><a data-toggle="tab" href="#menu1">View</a></li>
  </ul>

  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">

        <div class="row" style="margin-top: 20px">
      
          
         <div class="col-md-4">
         <div class="form-group">
         <label for="email">Club Name:</label>
         <select class="form-control" name="club_id" id="club_name" onchange="getsports(this.value)">
          <option value="0">Please Select a Club</option>
          @foreach($clubs as $club)
           <option value="{{ $club->club_id }}">{{ $club->club_name }}</option>
          @endforeach
        </select>
      </div>
    </div>

         <div class="col-md-4">
         <div class="form-group">
         <label for="sports">Sports Name:</label>
         <select class="form-control" id="sports_name" name="sports_id" onchange="getfee(this.value)">
         <option value="">-- Select a Sport --</option>
         </select>
  </div>
</div>

         <div class="col-md-4">
         <div class="form-group">
          <label for="fee">Membership Fee:</label>
          <input type="text" class="form-control" id="fees" disabled>
         </div>
         </div>

</div><!-- end of first row !-->
<!--</div> !-->


 <div class="form-area">
 <fieldset>
  <legend>Applicant Details:</legend>


 <div class="row">


 <div class="col-md-4">
         <div class="form-group">
         <label for="email">Applicant Name:</label>
         <input type="text" class="form-control" id="app_name" name="applicant_name">
      </div>
         </div>


         <div class="col-md-4">
         <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="email" name="email">
      </div>
         </div>


         <div class="col-md-4">
         <div class="form-group">
         <label for="email">Mobile:</label>
         <input type="text" class="form-control" id="mobile" name="mobile">
      </div>
         </div>


 </div><!-- end of 2nd row !-->



<div class="row">

 <div class="col-md-4">
         <div class="form-group">
         <label for="email">Date Of Birth:</label>

         <div class='input-group date' id='datetimepicker1'>

         <input type="date" class="form-control" id="dob" name="dob">
         <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar">
         </span>
         </span>
</div>
      </div>
         </div>

         <div class="col-md-4">
         <div class="form-group">
         <label for="email">Gender:</label>
         <br>
         <input type="radio" name="gender" value="male" id="gender">Male
         <input type="radio" name="gender" value="female" id="gender">Female
      </div>
         </div>

         <div class="col-md-4">
         <div class="form-group">
         <label for="email">Upload Photo:</label>
         <input type="file" name="file" class="form-control" id="img">
      </div>
         </div>

 </div><!-- end of third row !-->
 <input type="submit" name="submit" class="btn btn-success btn-submit" value="Submit">
 </fieldset>

</div> <!-- end of form area !-->

<!--row end !-->

    </div>




    <div id="menu1" class="tab-pane fade">
      <h3 style="text-align:center">Registation Details</h3>
      <table class="table" id="club_records">
        <thead>
        <tr>
          <th>Sl No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Regd Date</th>
          <th>Image</th>
          <th>Club Name</th>
          <th>Sports Name</th>
       </tr>
</thead>
       @php $i=1;
      
       @endphp
       @foreach($registations as $list)

       @php  $age = Carbon\Carbon::parse($list->dob)->diff(Carbon\Carbon::now())->format('%y years'); @endphp
       <tbody>
           <tr>
             <td>{{ $i}}</td>
             <td>{{ $list->applicant_name }}</td>
             <td>{{ $list->email_id }}</td>
             <td>{{ $list->mobile_no }}</td>
             <td>{{ $age }}</td>
             <td>{{ $list->gender }}</td>
             <td>{{ $list->created_at }}</td>
             <td><img src="{{ url('uploads/clubmembers/'.$list->image_path) }}" height="60"  /></td>
             <td onclick="getclubdetails({{ $list->club_id }})"><a href="#">{{ $list->club->club_name }}</a></td>
             <td>{{ $list->sports->sports_name }}
          </tr>
</tbody>
          @php $i++; @endphp
       @endforeach
      </table>

      <div id="club_details">
        <h3 style="text-align:center">Registation Details for </h3>
       <table class="table" id="club_grid_details">
           <tr>
             <th>Sl No</th>
             <th>Sports Name</th>
             <th>Fees</th>
             <th>No of Members</th>
           </tr>
           <tbody>

          </tbody>
       </table>
</div>
    </div>




  </div>


  </form>
</div>
<script type="text/javascript">
    $(".alert").hide();
    $("#club_details").hide();
function getsports(val) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var club_id = val;
    $("#sports_name").html('');
    $('#sports_name').html('<option value="">-- Select Sport --</option>');
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:"{{ url('getsports') }}",
           data:{club_id:club_id},
           success:function(response){
            
            $.each(response.sports, function (key, value) {
                            $("#sports_name").append('<option value="' + value
                                .sports_id + '">' + value.sports_name + '</option>');
                        });
           }
        });
}

function getfee(val) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
    var sports_id = val;

    $.ajax({
           type:'POST',
           dataType: 'json',
           url:"{{ url('getfee') }}",
           data:{sport_id:sports_id},
           success:function(response){
            // console.log(response);
            // alert(response.fees[0].fees);

            $("#fees").val(response.fees[0].fees);
           }
        });

}
$(document).ready(function(){
  var rowCount = $('#club_records tr').length;
$('#upload_form').on('submit', function(event){
    event.preventDefault();
  //e.preventDefault();
//   var club_name = $("#club_name").val();
//   var sports_name = $("#sports_name").val();

//   var app_name = $("#app_name").val();
//   var email = $("#email").val();
//   var mobile = $("#mobile").val();
//   var dob = $("#dob").val();
//   var gender = $("#gender").val();
//   var img = $("#img").val();

  $.ajax({
     type:'POST',
     dataType: 'json',
     contentType: false,
     url:"{{ url('postclub') }}",
     data:new FormData(this),
     cache: false,
     processData: false,
     success:function(data){
        //alert(data.success);
        console.log(data);

        //alert('data inserted');
        $('.alert').show();
        $('.alert').delay(5000).fadeOut(5000);


        var tr_str = "<tr>" +
          "<td>" +  rowCount  + "</td>" +
          "<td>" +  data.clubinfo.applicant_name + "</td>" +
          "<td>" + data.clubinfo.email_id + "</td>" +
          "<td>" + data.clubinfo.mobile_no + "</td>" +
          "<td>" + data.clubinfo.dob + "</td>" +
          "<td>" + data.clubinfo.gender + "</td>" +
          "<td>" + data.clubinfo.created_at + "</td>" +
          "<td>" + data.clubinfo.image_path + "</td>" +
          "<td>" + data.clubinfo.club_id + "</td>" +
          "<td>" + data.clubinfo.sports_id + "</td>" +
          "</tr>";

         // $("#club_records tbody").append(tr_str);

          $('#club_records tr:last').after(tr_str);


     }
  });


});
});

function getclubdetails(val) {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  var club_id = val;
  var dtlrowcnt =  $('#club_grid_details tr').length;
  $.ajax({
           type:'POST',
           dataType: 'json',
           url:"{{ url('getclubdetail') }}",
           data:{club_id:club_id},
           success:function(response){
            console.log(response);

            $.each(response.clubdetails, function (key, value) {
             // alert(key);
              var tr_str = "<tr>" +
                 "<td>" +  '1'  + "</td>" +
                 "<td>" +  value.sports_name + "</td>" +
                 "<td>" +  value.fees + "</td>" +
                 "<td>" +  value.members + "</td>" +
                 "</tr>";
                
                 $("#club_grid_details tbody").append(tr_str);
              });
              
              $("#club_details").show();
            // alert(response.fees[0].fees);

            //$("#fees").val(response.fees[0].fees);
           }
        });

}
</script>
</body>
</html>

