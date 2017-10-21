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

      // get connection
      $database = new Database();
      $db = $database->getConnection();

      // pass connection to contact_info table
      $contact_info = new Contact_info($db);

      // check parameter id from get method
      if (isset($_GET['id'])) {
        $contact_info->contact_id = $_GET['id'];

        // delete record
        if ($contact_info->delete()) {
            echo "<div class='alert alert-success text-center'>Contact information has been deleted.</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Unable to delete contact information.</div>";
        }

        // display message
        echo "<span class='text-success'>Click <a href='display_contact.php'>here</a> to see all contact information.</span>";
      }
    ?>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
