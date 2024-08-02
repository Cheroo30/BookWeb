<?php

    include "includes/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<style>
     .box-body {
        margin-top:10px;
    }

    .modal-body .mb-3 {
    display: flex;
    align-items: center;
  }

  .modal-body label {
    margin-bottom: 0;
    margin-right: 10px;
    min-width: 130px;
  }
</style>
<body>
<?php
        include "includes/test2.php";
    ?>
    
    
<div class="main-content">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Author List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Books</li>
            <li class="active">Book List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <?php
        if (isset($_SESSION['error'])) {
            echo "
                <div id='errorModal' class='modal fade' role='dialog'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <!-- Modal content-->
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'><i class='icon fa fa-check'></i> error!</h4>
                            </div>
                            <div class='modal-body'>
                                <p>" . $_SESSION['error'] . "</p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-error' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <script>
                    $(document).ready(function(){
                        $('#errorModal').modal('show');
                    });
                </script>
            ";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "
            <div id='successModal' class='modal fade' role='dialog'>
            <div class='modal-dialog modal-dialog-centered' style='max-width: 400px; max-height: 700px;'>
                <!-- Modal content-->
                <div class='modal-content border-0'>
                    <div class='modal-body text-center'>
                        <h1 class='modal-title'><i class='fas fa-check fa-2xl text-success'></i></h1>
                        <p style='margin-top:20px;'>Data Berhasil Di Input!</p>
                    </div>
                </div>
            </div>
        </div>
        
            
                <script>
                    $(document).ready(function(){
                        $('#successModal').modal('show');
                    });
                </script>
            ";
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['edit'])) {
            echo "
            <div id='editModal' class='modal fade' role='dialog'>
            <div class='modal-dialog modal-dialog-centered' style='max-width: 400px; max-height: 700px;'>
                <!-- Modal content-->
                <div class='modal-content border-0'>
                    <div class='modal-body text-center'>
                        <h1 class='modal-title'><i class='fas fa-check fa-2xl text-success'></i></h1>
                        <p style='margin-top:20px;'>Data Berhasil Di Edit!</p>
                    </div>
                </div>
            </div>
        </div>
        
            
                <script>
                    $(document).ready(function(){
                        $('#editModal').modal('show');
                    });
                </script>
            ";
            unset($_SESSION['edit']);
        }
      ?>

        <div class="color">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                    <a href="#" id="openAddModal" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i> New
                        </a>
                        <!-- Modal add-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 600px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registration Form</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="registrationForm" action="author_add.php" method="POST" class="form-inline">
                                                <div class="mb-3">
                                                    <label for="genre" class="form-label">Author Name</label>
                                                    <input type="text" class="form-control" name="nama_penulis" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="genre" class="form-label">Author Email</label>
                                                    <input type="text" class="form-control" name="email_penulis" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Modal edit-->
                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 600px;">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="updateForm" action="author_edit.php" method="POST" class="form-inline">
                                <div class="mb-3" hidden>
                                        <label for="authorId" class="form-label">Author ID</label>
                                        <input type="text" class="form-control" id="authorId" name="author_id" readonly>
                                    </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author Name</label>
                                    <input type="text" class="form-control" id="authorName" name="nama_penulis" required>
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author Email</label>
                                    <input type="text" class="form-control" id="authorEmail" name="email_penulis" required>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                            </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="bordered-table">
                            <thead>
                                <th>No</th>
                                <th>Author Name</th>
                                <th>Author Email</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                            <?php
include "includes/conn.php";

// Pagination Configuration
$records_per_page = 5;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

$no = $offset + 1;
$sql = mysqli_query($koneksi, "SELECT * FROM penulis LIMIT $offset, $records_per_page");

$total_records_query = mysqli_query($koneksi, "SELECT COUNT(*) FROM penulis");
$total_records = mysqli_fetch_array($total_records_query)[0];

if ($total_records > 0) {
    while ($data = mysqli_fetch_assoc($sql)) {
        echo "<tr>
                <td scope='row'>" . $no++ . "</td>
                <td class='author-name'>" . $data['nama_penulis'] . "</td>
                <td class='author-email'>" . $data['email_penulis'] . "</td>
                <td>
                    <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $data['id_penulis'] . "' data-bs-toggle='modal' data-bs-target='#exampleModalEdit'><i class='fa fa-edit'></i> Edit</button>
                    <a href='author_delete.php?action=delete&id=" . $data['id_penulis'] . "' class='btn btn-danger btn-sm delete btn-flat' onclick='return confirm(\"Are you sure you want to delete this author?\")'><i class='fa fa-trash'></i> Delete</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No authors found.</td></tr>";
}

echo "</tbody>
    </table>
</div>";

// Pagination
if ($total_records > $records_per_page) {
    echo "<nav aria-label='Page navigation'>
            <ul class='pagination justify-content-center mt-3'>";

    $total_pages = ceil($total_records / $records_per_page);
    $prev = $page - 1;
    $next = $page + 1;

    if ($prev > 0) {
        echo "<li class='page-item'><a class='page-link' href='?page=$prev'>Prev</a></li>";
    }
    if ($page > 2) {
        echo "<li class='page-item'><a class='page-link' href='?page=1'>1</a></li>";
    }

    $start_page = max(1, $page - 1);
    $end_page = min($total_pages, $start_page + 2);

    for ($i = $start_page; $i <= $end_page; $i++) {
        $active_class = ($i == $page) ? "active" : "";
        echo "<li class='page-item $active_class'><a class='page-link' href='?page=$i'>$i</a></li>";
    }

    if ($end_page < $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='?page=$total_pages'>$total_pages</a></li>";
    }

    if ($next <= $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='?page=$next'>Next</a></li>";
    }

    echo "</ul></nav>";
}
?>

                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
    include "../includes2/footer.php";
?>
</div>
</div>
<script>
    // Assuming you're using jQuery for simplicity
    $(document).ready(function() {
        // Handler for edit button click
        $('.edit').click(function() {
            var authorId = $(this).data('id'); // Get the author ID from data attribute
            var authorName = $(this).closest('tr').find('.author-name').text(); // Get the author name from the specific cell
            var authorEmail = $(this).closest('tr').find('.author-email').text(); // Get the author email from the specific cell
            $('#authorId').val(authorId); // Set the author ID in the modal
            $('#authorName').val(authorName); // Set the author name in the modal
            $('#authorEmail').val(authorEmail); // Set the author Email in the modal
        });
    });
</script>

</body>
</html>