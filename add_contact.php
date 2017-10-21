<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

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
  <?php

    include_once 'dbconnect.php';
    include_once 'contact_info.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to objects
    $contact_info = new Contact_info($db);

    // if the form was submitted
    if($_POST){
      // set product property values
      $contact_info->fname = $_POST['first_name'];
      $contact_info->lname = $_POST['last_name'];
      $contact_info->email = $_POST['email'];
      $contact_info->phone = $_POST['phone'];
      $contact_info->address = $_POST['address'];
      $contact_info->city = $_POST['city'];
      $contact_info->province_id = $_POST['province'];
      $contact_info->zip_code = $_POST['zip'];
      $contact_info->domain_name = $_POST['website'];
      $contact_info->user_type = $_POST['user_type'];
      $contact_info->description = $_POST['description'];

      // create contact_info
      if($contact_info->create()){
          echo "<div class='alert alert-success text-center'>Contact information has been created sucessfully.</div>";
      }
      // if unable to create the contact information, tell the user
      else{
          echo "<div class='alert alert-danger text-center'>Unable to add your contact information.</div>";
      }
    }

  ?>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
