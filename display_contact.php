<?php

    include_once 'dbconnect.php';
    include_once 'contact_info.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to objects
    $contact_info = new Contact_info($db);

    // query contact information
    $stmt = $contact_info->readall();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display Contact Information</title>

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
    <div class="page-header">
      <h1>Contact Information: Display All</h1>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
       <div class="table-responsive">
         <table class="table table-condensed table-hover">
           <thead>
             <tr>
               <th>#</th>
               <th>Name</th>
               <th>E-mail</th>
               <th>Domain Name</th>
               <th>Description</th>
               <th></th>
               <th></th>
             </tr>
           </thead>
           <tbody>
           <?php while($row = mysqli_fetch_array($stmt)) { ?>
             <tr>
               <td><?php echo $row['contact_id']; ?></td>
               <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['domain_name']; ?></td>
               <td><?php echo $row['description']; ?></td>
               <td><a href="update_contact.php?id=<?php echo $row['contact_id']; ?>" class="btn btn-info left-margin"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
               <td><a href="#" data-href="delete_contact.php?id=<?php echo $row['contact_id']; ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
             </tr>
           <?php } ?>
           </tbody>
         </table>
       </div>
       <div class="panel-footer"><?php echo mysqli_num_rows($stmt) . " records found"; ?></div>
      </div>
  </div>

  <!-- Modal Dialog -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Delete Confirmation!</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure about this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="confirm">Delete</a>
            </div>
        </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      $('#confirm-delete').on('show.bs.modal', function(e) {
          $(this).find('#confirm').attr('href', $(e.relatedTarget).data('href'));
      });
    </script>

  </body>
</html>
