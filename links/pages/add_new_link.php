<?php require_once '../pages/dp_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onine links</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <style>
    *{
        direction: ltr;
        padding: 0px;
        margin: 0px;
    }
    </style>
</head>
<body class="bg-secondary">
<!--Note when adding a new link-->
<div class="container mt-3">
    <h4 class="text-white">Add new link</h4>
    <hr>
    </div>
<div class="container">
    <?php
//The text when the form is submitted
if(isset($_POST['submit'])) {

      $Title = $_POST['Title'];
      $URL = $_POST['URL'];
      $Category = $_POST['Category'];
      $Status = $_POST['Status'];

      //Text Adding information to the database
      $result ="INSERT INTO `links` (`Title`, `URL`, `Category`, `Data_Added`,`Status`) VALUES ('$Title', '$URL', '$Category', CURRENT_TIMESTAMP, '$Status');";
      //Notes text in case of an error
      if(performQuery($result)){
        echo('<div class="alert alert-success" role="alert">
        A new link have been add <a href="../" class="badge badge-info"> See all links </a>
        </div>');
      }else{

      echo('<div class="alert alert-danger" role="alert">
      There is a problem <a href="../" class="badge badge-info"> See all links </a>
      </div>');

      }
}
?>
</div>

<?php
    $category = "SELECT * FROM `category` ";
    $categoryresult = mysqli_query($conn, $category);
    $status = "SELECT * FROM `status` ";
    $Statusresult = mysqli_query($conn, $status);
?>
<!--A form to add a new branch-->
<form class="needs-validation" autocomplete="off" novalidate method="post">
    <div class="container">
        <div class="form-group">
            <label class="text-white">Title</label>
            <input type="text" class="form-control" id="Title" Name="Title" placeholder="Web site name" required />
            <div class="invalid-feedback">
            You must add Web site name
    </div>
        </div>
        <div class="form-group">
            <label class="text-white">URL</label>
            <input type="text" class="form-control" id="URL" Name="URL" placeholder="Web Site Link" required />
            <div class="invalid-feedback">
            You must add a link
            </div>
        </div>
        <div class="form-group">
    <label for="Category" class="text-white">Category</label>
    <select class="form-control" name="Category" id="Category" required>
    <?php while($row1 = mysqli_fetch_array($categoryresult)):; ?>
      <option>
      <?php echo $row1[1];?>
      </option>
    <?php endwhile;?>
      <div class="invalid-feedback">
      Choose a category
      </div>
    </select>
  </div>
  <div class="form-group">
  <label for="Status" class="text-white">Status</label>
    <select class="form-control" name="Status" id="Status" required>
    <?php while($row2 = mysqli_fetch_array($Statusresult)):; ?>
      <option>
      <?php echo $row2[1];?>
      </option>
    <?php endwhile;?>
      <div class="invalid-feedback">
      Choose a Status
      </div>
    </select>
  </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" Name="submit">Add link</button>
            </div>
    </div>
</form>
<!--Script to show items in red when no data is entered-->
<script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
</body>
</html>
