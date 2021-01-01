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
<!--ملاحظة عند إضافة فرع جديد-->
<div class="container mt-3">
    <h4 class="text-white">Add new Category</h4>
    <hr>
    </div>
<div class="container">
    <?php
//نص إرسال النموذج
if(isset($_POST['submit'])) {

      $Category = $_POST['Category'];

      //نص إضافة معلومات لقاعدة البيانات
      $result ="INSERT INTO `category` (`Category`, `Data_Added`) VALUES ('$Category', CURRENT_TIMESTAMP);";
      //نص الملاحضات في حالة وجود خطئ
      if(performQuery($result)){
        echo('<div class="alert alert-success" role="alert">
        A new category have been add <a href="../" class="badge badge-info"> See all links </a>
        </div>');
      }else{

      echo('<div class="alert alert-danger" role="alert">
      There is a problem <a href="../" class="badge badge-info"> See all links </a>
      </div>');

      }
}
?>
</div>
<!--A form to add a new branch-->
<form class="needs-validation" autocomplete="off" novalidate method="post">
    <div class="container">
        <div class="form-group">
            <label class="text-white">Category</label>
            <input type="text" class="form-control" id="Category" Name="Category" placeholder="Add new Category" required />
            <div class="invalid-feedback">
            You must new Category
    </div>
        </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" Name="submit">Add Category</button>
            </div>
    </div>
</form>
<!--سكربت لإظهار العناصر باللون الأحمر في حالة عدم إدخال بيانات-->
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