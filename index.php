<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <style> 

 button.btn.btn-default.btncls {
    margin-top: 25px !important;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}


  </style>
</head>
<body>     
  <h1> hellogfgdgdfg </h1>
<div class="container">
  <div class="row">
  <form  method="post" action="">
    <div class="form-group">
     <div class="col-sm-4 col-md-4 col-lg-3"> 
    <div class="form-group">
      <label for="pwd">Degree</label>
       <select class="form-control" name="degree">
        <option>Degree Name</option>
     <?php  $query= "select * from degrees";
         $data = mysqli_query($conn,$query);
         while($result = mysqli_fetch_assoc($data))
         {
            echo "<option value=".$result['degree_id'].">" .$result['deg_name']."</option>";
          }
         ?>
       </select>
    </div>
  </div>

    <div class="col-sm-4 col-md-4 col-lg-3">
     <div class="form-group">
      <label for="pwd">Passing Year</label>
       <select class="form-control" name="year">
         <option>Passing Year</option>
       <?php  $number = range(2015,2019);
       foreach ($number as $key => $year) { ?>
         <option value="<?php echo $year; ?>"> <?php echo $year; ?></option>
      <?php }
     ?>
       </select>
    </div>
  </div>

    <div class="col-sm-10 col-md-8 col-lg-3">
     <div class="form-group">
      <label for="pwd">Role</label>
       <select class="form-control" name="role">
         <option>Select Role</option>
        <?php  $query= "select * from role";
         $data = mysqli_query($conn,$query);
         while($result = mysqli_fetch_assoc($data))
          {
           echo "<option value=".$result['role_id'].">" .$result['name']."</option>";
          }
         ?>
       </select>
    </div>
  </div>
  <div class="col-sm-4 col-md-4 col-lg-3">
    <button type="submit" class="btn btn-default btncls" name="Search">Search</button>
  </div>
  </form>
</div>
</div>

<?php 
if(isset($_POST['Search'])){
   $degree = $_POST['degree'];
   $year = $_POST['year'];
   $role = $_POST['role'];

 $query = "SELECT users.name, degrees.deg_name FROM users JOIN degrees  ON users.degree_id = degrees.degree_id AND users.degree_id= $degree JOIN role ON users.role_id = role.role_id AND role.role_id= $role WHERE users.passing_year = $year ";

        $data = mysqli_query($conn,$query);
          $total = mysqli_num_rows($data);
         if ($total > 0 )
           {
             while($result = mysqli_fetch_assoc($data)) { ?>

                <table>
                        <tr>
                           <th> Name</th>
                          <th>Degree Name</th>
                        </tr>
                         <td> <?php echo $result['name'];   ?>  </td>
                          <td> <?php echo $result['deg_name'];   ?>  </td>
                <?php   }
        
            }else{
              echo "not found";
            }
}



  ?>



</body>
</html>
