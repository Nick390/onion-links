<?php require_once './pages/dp_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onine links</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
    *{
        direction: ltr;
        padding: 0px;
        margin: 0px;
    }
    </style>
</head>
<body class="bg-secondary d-none d-sm-block">
<div class="container">
    <div class="row justify-content-center mt-1">

    <nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="../links/">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item ml-1">
        <a class="btn btn-primary btn-sm" href="./pages/add_new_link.php" role="button">Add link</a>
        </li>
        <li class="nav-item ml-1">
        <a class="btn btn-primary btn-sm" href="./pages/‏‏add_new_status.php" role="button">‏‏add status</a>
        </li>
        <li class="nav-item ml-1">
        <a class="btn btn-primary btn-sm" href="./pages/‏‏‏‏add_new_category.php" role="button">‏‏‏‏Add category</a>
        </li>
        <li class="nav-item ml-1">
        <a class="btn btn-danger btn-sm" href="./pages/add_new_link.php" role="button">Remove link</a>
        </li>
        <li class="nav-item ml-1">
        <a class="btn btn-danger btn-sm" href="./pages/‏‏add_new_status.php" role="button">Remove status</a>
        </li>
        <li class="nav-item ml-1">
        <a class="btn btn-danger btn-sm" href="./pages/‏‏‏‏add_new_category.php" role="button">Remove category</a>
        </li>
    </ul>
  </div>
</nav>
    </div>
	<div class="row justify-content-center mt-1">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm bg-dark">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="h4 text-body mb-0"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col mr-3 ml-3">
                                        <input type="search" placeholder="Search" class="form-control search-input form-control-lg form-control-borderless" data-table="links-list"/>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>
<br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
<?php   
                $query ="SELECT links.ID, links.Title, links.URL,  links.Category, links.Data_Added, status.Status ,status.Color
                FROM color JOIN status ON color.colorname = status.Color
                INNER JOIN links ON status.Status = links.Status ORDER BY links.ID";

                 if(count(fetchAll($query))>0)

echo '<table class="table table-striped table-dark links-list">
      <thead>
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">Title</th>
        <th scope="col" class="text-center">URL</th>
        <th scope="col" class="text-center">Category</th>
        <th scope="col" class="text-center">Data added</th>
        <th scope="col" class="text-center">Status</th>
      </tr>
      </thead>
      <tbody>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $field2name = $row["Title"];
        $field3name = $row["URL"];
        $field4name = $row["Category"];
        $field5name = $row["Data_Added"];
        $field6name = $row["Status"];
        $field7name = $row["Color"];

        echo ' <tr>
                  <td scope="row" class="text-center">'.$field1name.'</td> 
                  <td class="text-center">'.strtoupper(mb_substr($field2name, 0, 100)).'</td> 
                  <td class="text-center"><a class="text-white" href="'.$field3name.'"><button type="button" class="btn btn-link btn-sm">open</button></a></td>
                  <td class="text-center">'.strtoupper($field4name).'</td> 
                  <td class="text-center">'.mb_substr($field5name, 0, 10).'</td>
                  <td class="text-center"><span class="badge badge-'.$field7name.'">'.$field6name.'</span></td>
                </tr>
                ';
    }
    echo'</tbody>
         </table>';
}else{
  echo '<div class="alert alert-danger" role="alert">يوجد مشكلة في قاعدة البيانات</div>';
}
?>
        </div>
    </div>
</div>
    <script>
        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('search-input');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script>
</body>
</html>