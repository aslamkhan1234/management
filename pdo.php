
<!DOCTYPE html>
<html>
<head><

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="row" id="contentdv">
        <div class="col-sm-10 col-md-5 col-lg-4">
          <input type="text" name="name" id="name">
        </div>
         <div class="col-sm-10 col-md-5 col-lg-4">
         <select id="type" >
            <option value="Text">Text Box </option> 
            <option value="Checkbox"> Checkbox</option>
            <option value="Radio"> Radio</option>
            <option value="File">File</option>
        </select>
        </div>

        <div class="col-sm-10 col-md-5 col-lg-4">
         <select id="NumberOfFields" >
            <option>Number Of Fields</option>
            <option value="1">One</option> 
            <option value="2">Two</option>
            <option value="3">Three</option>
            <option value="4">Four</option>
        </select>
        </div>

        <div class="col-lg-12 row" id="mainContent">
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="btn" data-dismiss="modal">Back</button>
           <button type="button" class="btn btn-default" id="adbtn">Add</button>
            <i class="fa fa-trash-o" id="trashAll" style="font-size:48px;color:red"></i>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   var counter = 2;

 $("#adbtn").click(function(){
   var type = $("#type").val();
   var numOfFields = $("#NumberOfFields").val();
   console.log(type);
   counter++;
   if(counter>10)
          {
            alert("Only 10 textboxes allow");
            return false;
          }


  for (var i = 0; i < numOfFields; i++) {
    $("#mainContent").append('<div class="col-sm-12 col-md-12 col-lg-12"> '+type+' Type <input type="'+type+'" id="'+counter+'" value=""> </i> <i id="'+counter+'" class="fa fa-trash delete"> </i> </div>');
  }
});

 $("body").on('click', '.add', function(e){
        e.preventDefault();
        if(counter < 10) {

            $("#mainContent").append('<div class="col-sm-12 col-md-12 col-lg-12"> '+type+' Type <input type="'+type+'" id="'+counter+'" value=""> <i id="'+counter+'" class="fa fa-plus add"> </i> <i id="'+counter+'" class="fa fa-trash delete"> </i> </div>'); 
        }
    });

 $("body").on('click', '.delete', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); 
        counter--;
    });

$("body").on('click', '#trashAll', function(e){
        e.preventDefault();
        $("#mainContent").remove(); 
        counter  = 2;
    });


});
</script>
</html>


