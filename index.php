<?php

    include_once 'dbconnect.php';
    include_once 'province.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to province table
    $province = new Province($db);
    $result = $province->readall();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Information</title>
    <style>
      #success_message{ display: none;}
    </style>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <form class="well form-horizontal" action="add_contact.php" method="post"  id="contact_form" data-toggle="validator">
        <!-- Form Name -->
        <legend>Contact Us Today!</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">First Name</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="first_name" placeholder="First Name" class="form-control" type="text" data-error="Please enter name field." required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" >Last Name</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">E-Mail</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="email" placeholder="E-Mail Address" class="form-control" type="email" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Phone #</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input name="phone" placeholder="(845)555-1212" class="form-control" type="tel" pattern="^[0-9]{1,}$" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Address</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input name="address" placeholder="Address" class="form-control" type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">City</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input name="city" placeholder="city" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label">Province</label>
          <div class="col-md-4 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
              <select name="province" class="form-control selectpicker" >
                <option value=" " >Please select your province</option>
                <?php while ($row = mysqli_fetch_array($result)) {
                    echo "<option value=" . $row['province_id'] . ">" . $row['province_name'] . "</option>";
                } ?>
              </select>
            </div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Zip Code</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input name="zip" placeholder="Zip Code" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Website or domain name</label>
           <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                <input name="website" placeholder="Website or domain name" class="form-control" type="text">
            </div>
          </div>
        </div>

        <!-- radio checks -->
         <div class="form-group">
          <label class="col-md-4 control-label">Are you a new user?</label>
          <div class="col-md-4">
              <div class="radio">
                  <label>
                      <input type="radio" name="user_type" value="y" checked /> Yes
                  </label>
              </div>
              <div class="radio">
                  <label>
                      <input type="radio" name="user_type" value="n" /> No
                  </label>
              </div>
          </div>
        </div>

        <!-- Text area -->
        <div class="form-group">
          <label class="col-md-4 control-label">Project Description</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea class="form-control" name="description" placeholder="Project Description"></textarea>
            </div>
          </div>
        </div>

        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>

      </form>
    </div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="validator.min.js"></script>
  </body>
</html>
