<?php
include('includes/conn.php');
session_start();
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!DOCTYPE html>
<html lang="en">

<style>

nav, .navbar, .nav-item, .nav-link, .navbar-brand{
  color: white !important;
  font-family: 'Montserrat';
}

body{
  font-family: 'Montserrat' !important;
}

a{
  text-decoration: none !important;
}

</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-danger">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">JM.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a>
            </li>
            
            
          </ul>
          <div class="d-flex" role="search">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="processes/logout.php"><i class="bi bi-sign-turn-left-fill"></i> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="row">
      <main class="col text-center">
        <br>
        <h1><i class="bi bi-person-arms-up"></i></h1>
        <h1>Welcome, James!</h1>
        <p> <a href="" data-bs-toggle="modal" data-bs-target="#workModal"> <i class="bi bi-database-fill-add"></i> Add work here</a></p>

        <div class="card mb-3">
          <div class="card-header">
            Recent Works
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                
                  <th scope="col">Name of Work</th>
                  <th scope="col">Picture of Work</th>
                  <th scope="col">Description of Work</th>
                  <th scope="col">Manage</th>
                </tr>
              </thead>
              <tbody>
                <?php
                try {
                  $stmt = $conn->prepare("SELECT * FROM works");
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td><a href='uploads/" . $row['image'] . "' target='_blank'><button type='button' class='btn btn-primary'><i class='bi bi-eye'></i> View</button> &nbsp;</a></td>";
                      echo "<td>" . $row['description'] . "</td>";
                      echo "<td>";
                      echo "<button type='button' class='btn btn-warning' data-bs-target='#editModal" . $row['id'] . "' data-bs-toggle='modal'><i class='bi bi-pencil'></i> Edit</button> &nbsp;";

                      echo "<button type='button' class='btn btn-danger' onclick='deleteWork(" . $row['id'] . ")'><i class='bi bi-file-x'></i> Delete</button>";
                      echo "</td>";
                      echo "</tr>";
          
                      echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel" . $row['id'] . "' aria-hidden='true'>";
                      echo "<div class='modal-dialog' role='document'>";
                      echo "<div class='modal-content'>";
                      echo "<div class='modal-header'>";
                      echo "<h5 class='modal-title' id='editModalLabel" . $row['id'] . "'>Edit Work</h5>";
                      echo "<span aria-hidden='true'>&times;</span>";
                      echo "</button>";
                      echo "</div>";
                      echo "<div class='modal-body'>";
                      echo "<form id='editForm" . $row['id'] . "' action='processes/edit_work.php' method='POST' enctype='multipart/form-data'>";
                      echo "<input type='hidden'  name='editWorkId' id='editWorkId" . $row['id'] . "' value='" . $row['id'] . "'>";
                      echo "<div class='form-group'>";
                      echo "<label for='editName" . $row['id'] . "'>Name:</label>";
                      echo "<input type='text' class='form-control' id='editName" . $row['id'] . "' name='editName' value='" . $row['name'] . "'>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='editDescription" . $row['id'] . "'>Description:</label>";
                      echo "<textarea class='form-control' id='editDescription" . $row['id'] . "' name='editDescription'>" . $row['description'] . "</textarea>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='editImage" . $row['id'] . "'>Image:</label> <br>";
                      echo "<input type='file' class='form-control-file' id='editImage" . $row['id'] . "' name='editImage'>";
                      echo "</div>";
                      echo "<input type='submit' class='btn btn-primary' value='Submit'>";
                      echo "</form>";
                                      
                      echo "</div>";
                    
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                    }
                  } else {
                      echo "<tr><td colspan='5'>No works found.</td></tr>";
                  }
              } catch (PDOException $e) {
              }
              $conn = null;
                ?>
              </tbody>
            </table>
          </div>
        </div>

    </div>
  </div>
  <script>
    function deleteWork(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'processes/delete_work.php?id=' + id;
        }
      });
    }
  </script>


  


  <div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add work</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="processes/add_work.php" method="POST" enctype="multipart/form-data">
            <div class="form-group" style='margin-bottom:20px'>
              <label for="workName">Name of Work:</label>
              <input type="text" class="form-control" name="workName" placeholder="Enter name of work" required>
            </div>
            <div class="form-group" style='margin-bottom:20px'>
              <label for="workPicture">Picture of Work:</label>
              <input type="file" class="form-control-file" name="workPicture" accept="image/*" required>
            </div>
            <div class="form-group" style='margin-bottom:20px'>
              <label for="workDescription">Description of Work:</label>
              <textarea class="form-control" name="workDescription" rows="5" placeholder="Enter description of work" required></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary"></button>
          </form>
        </div>

      
      </div>
    </div>
  </div>

  <script src="vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
</body>

<?php

  if (isset($_SESSION['STATUS']) && $_SESSION['STATUS'] == "DEL_SUCCESS") {
    unset($_SESSION['STATUS']);

    echo "<script>
            // Display SweetAlert2 alert
            Swal.fire({
                title: 'Success!',
                text: 'The deletion of a project is successful!',
                icon: 'success'
            });
          </script>";
  } elseif (isset($_SESSION['STATUS']) && $_SESSION['STATUS'] == "EDIT_SUCCESS") {
    unset($_SESSION['STATUS']);

    echo "<script>
            // Display SweetAlert2 alert
            Swal.fire({
                title: 'Success!',
                text: 'The edition of a project is successful!',
                icon: 'success'
            });
          </script>";
  } elseif (isset($_SESSION['STATUS']) && $_SESSION['STATUS'] == "ADD_SUCCESS") {
    unset($_SESSION['STATUS']);

    echo "<script>
            // Display SweetAlert2 alert
            Swal.fire({
                title: 'Success!',
                text: 'The addition of a project is succesful!!',
                icon: 'success'
            });
          </script>";
  }
  ?>

</html>