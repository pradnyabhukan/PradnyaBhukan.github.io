<?php

$error = '' ;
$ID = '';
$name = '';
$gender = '';
$date = '';
$city = '';
$state = '';
$email = '';
$qualification = '';
$stream = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["submit"]))
{
    $ID = clean_text($_POST["ID"]); 
    $name = clean_text($_POST["name"]); 
    $gender = clean_text($_POST["gender"]); 
    $date = clean_text($_POST["date"]); 
    $city = clean_text($_POST["city"]); 
    $state = clean_text($_POST["state"]); 
    $qualification = clean_text($_POST["qualification"]); 
    $stream = clean_text($_POST["stream"]); 
    $email = clean_text($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error .= '<p><label class="text-danger">Invalid email format</label></p>';
    }

    if($error == '')
    {
        $file_open = fopen("students.csv", "a");
        $no_rows = count(file("students.csv"));
        if($no_rows > 1)
        {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array(
            //'sr_no' => $no_rows,
            'ID' => $ID,
            'name ' => $name,
            'gender' => $gender,
            'date' => $date,
            'city' => $city,
            'state' => $state,
            'email' => $email,
            'qualification' => $qualification,
            'stream' => $stream            
        );
        fputcsv($file_open, $form_data);
        $error .= '<p><label class="text-danger">Data Stored!!</label></p>'; 
        $ID = '';
        $name = '';
        $gender = '';
        $date = '';
        $city = '';
        $state = '';
        $email = '';
        $qualification = '';
        $stream = '';

    }
        
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Add Student Details</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 <br />
  <div class="container">
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
        <h3 align="center">Student Data</h3><br />
        <?php echo $error; ?>
        <div class="form-group">
            <label>Student ID</label>
            <input type="text" name="ID" class="form-control" value ="<?php echo $ID?>"/>
        </div>
        <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="name" class="form-control" value = "<?php echo $name?>"/>
        </div>
        <div class="form-group">
            <label>Gender</label> <br/>
            <input type="radio" name="gender" value="male"  value = "<?php echo $gender?>"/> Male<br>
            <input type="radio" name="gender" value="female"  value = "<?php echo $gender?>"/> Female<br>
        </div>
        <div class="form-group">
            <label>Date Of Birth </label>
            <input type="date" name="date" class="form-control" value = "<?php echo $date?>"/>
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control" value = "<?php echo $city?>"/>
        </div>
        <div class="form-group">
            <label>State</label>
            <input type="text" name="state" class="form-control" value = "<?php echo $state?>"/>
        </div>
        <div class="form-group">
            <label>Email ID</label>
            <input type="text" name="email" class="form-control" value = "<?php echo $email?>"/>
        </div>
        <div class="form-group">
            <label>Qualification</label>
            <input type="text" name="qualification" class="form-control" value = "<?php echo $qualification?>"/>
        </div>
        <div class="form-group">
            <label>Stream</label>
            <input type="text" name="stream" class="form-control" value = "<?php echo $stream?>"/>
        </div>
        <div class="form-group" align="center">
            <input type ="submit" name= "submit" class= "btn btn-info" value="submit" />
        </div>

    </form>