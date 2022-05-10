<?php
include_once './include/config.php';
include_once './include/header.php';
include_once './include/sidebar.php';
include_once './include/styling.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS | User Master</title>
    <link rel="stylesheet" href="dist/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="dist/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="dist/css/dataTables.bootstrap4.css">
    <style>
        h1:hover {
            color: #007bff;
        }
    </style>
</head>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-2">
                        <h1>User Master</h1>
                    </div>
                    <div class="col-sm-4">
                        <!-- Add BUtton -->
                        <button type="button" class="btn btn-primary userMasterModal" data-toggle="modal" data-target="#userMasterModal">Add Users <i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">User Master</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Insert Data -->
        <section class="content-body">
            <div class="modal fade" id="userMasterModal">
                <div class="modal-dialog modal-lg" style="max-width: 800px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add User <i class="fas fa-users"></i></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" id="userMasterForm" action="javascript:void(0)" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="roll_id">User Type:</label>
                                            <div class="form-check">
                                                <input type="radio" class="roll_id" id="admin" name="roll_id" value="1" checked>
                                                <label for="roll_id">Admin</label> <span class="mr-2"></span>
                                                <input type="radio" class="roll_id" id="user" name="roll_id" value="2">
                                                <label for="roll_id">User</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="user_status">User Status:</label>
                                            <div class="form-check">
                                                <input type="radio" class="user_status" id="active" name="user_status" value="1" checked>
                                                <label for="user_status">Active</label> <span class="mr-2"></span>
                                                <input type="radio" class="user_status" id="inactive" name="user_status" value="0">
                                                <label for="user_status">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="u_name">Username:</label>
                                            <input type="text" class="form-control" id="u_name" name="u_name" placeholder="Enter Username" required>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="u_password">Password:</label>
                                            <input type="password" class="form-control" id="u_password" name="u_password" placeholder="Enter Password" required>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="u_email">Email Adrress:</label>
                                            <input type="email" class="form-control" id="u_email" name="u_email" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="u_mobile_no">Mobile No.:</label>
                                            <input type="text" class="form-control" id="u_mobile_no" name="u_mobile_no" placeholder="Enter Mobile Number" required>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="user_skill">User Skill:</label>
                                            <div class="input-group">
                                                <select multiple class="form-control" name="user_skill[]" id="user_skill" required>
                                                    <?php
                                                    $selectSkill = mysqli_query($conn, "SELECT * FROM skill_master ORDER BY `id` ASC");
                                                    while ($result = mysqli_fetch_array($selectSkill)) {
                                                    ?>
                                                        <option value="<?php echo $result['skill_name']; ?>"><?php echo $result['skill_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="u_profile_image">Profile Photo:</label>
                                            <div class="holder mb-2">
                                                <img id="imgPreview" src="dist/img/defaultUpload.png" style="height: 100px; width: auto; border-radius: 20px; box-shadow: 2px 2px 2px black;" />
                                            </div>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="u_profile_image" name="u_profile_image" placeholder="Select Profile Image" required>
                                                <label for="u_profile_image"></label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="u_address">Adrress:</label>
                                            <textarea name="u_address" id="u_address" class="form-control" placeholder="Enter Address"></textarea required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="u_mobile_no">Birthdate:</label>
                                            <input type="date" name="u_birthdate" id="u_birthdate" class="form-control" placeholder="Select Birthdate" required>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                    <button type="button" id="closeForm" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Edit Record -->
        <section class="content-body">
            <div class="modal fade" id="editUserMasterModal">
                <div class="modal-dialog modal-lg" style="max-width: 800px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update User <i class="fas fa-users"></i></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" id="editUserMasterForm" action="javascript:void(0)" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <input type="hidden" name="user_id" id="user_id">
                                            <label for="roll_id">User Type:</label>
                                            <div class="form-check">
                                                <input type="radio" class="roll_id" id="update_admin" name="roll_id" value="1">
                                                <label for="roll_id">Admin</label> <span class="mr-2"></span>
                                                <input type="radio" class="roll_id" id="update_user" name="roll_id" value="2">
                                                <label for="roll_id">User</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="user_status">User Status:</label>
                                            <div class="form-check">
                                                <input type="radio" class="user_status" id="update_active" name="user_status" value="1">
                                                <label for="user_status">Active</label> <span class="mr-2"></span>
                                                <input type="radio" class="user_status" id="update_inactive" name="user_status" value="0">
                                                <label for="user_status">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="u_name">Username:</label>
                                            <input type="text" class="form-control" id="update_u_name" name="u_name" placeholder="Enter Username" required>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="u_email">Email Adrress:</label>
                                            <input type="email" class="form-control" id="update_u_email" name="u_email" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="u_mobile_no">Mobile No.:</label>
                                            <input type="text" class="form-control" id="update_u_mobile_no" name="u_mobile_no" placeholder="Enter Mobile Number" required>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="user_skill">User Skill:</label>
                                            <div class="input-group">
                                                <select multiple class="form-control" name="user_skill[]" id="update_user_skill" required>
                                                    <?php
                                                    $selectSkill = mysqli_query($conn, "SELECT * FROM skill_master ORDER BY `id` ASC");
                                                    while ($result = mysqli_fetch_array($selectSkill)) {
                                                    ?>
                                                        <option value="<?php echo $result['skill_name']; ?>"><?php echo $result['skill_name']; ?></option>
                                                        <?php
                                                    }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                                <label for="u_profile_image">Profile Photo:</label>
                                                <div class="holder mb-2">
                                                    <img id="update_image_preview" src="" style="height: 100px; width: auto; border-radius: 20px; box-shadow: 2px 2px 2px black;" />
                                                </div>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="update_u_profile_image" name="u_profile_image" placeholder="Select Profile Image" required>
                                                    <label for="update_u_profile_image"></label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="u_address">Adrress:</label>
                                            <textarea name="u_address" id="update_u_address" class="form-control" placeholder="Enter Address"></textarea required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="u_mobile_no">Birthdate:</label>
                                            <input type="date" name="u_birthdate" id="update_u_birthdate" class="form-control" placeholder="Select Birthdate" required>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submitEdit" id="submitEdit" class="btn btn-primary submitEdit" data-dismiss="modal">Save changes</button>
                                    <button type="button" id="closeEditForm" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- View Record -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Master Table <i class="fas fa-users"></i></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 500px;">
                                <table id="userMasterTable" class="table table-bordered table-striped table-hover table-head-fixed text-nowrap">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Roll ID</th>
                                            <th>User Status</th>
                                            <th>Username</th>
                                            <th>Email Address</th>
                                            <th>Mobile No.</th>
                                            <th>Profile Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userMasterRecord">
                                        <!-- Record will fetch from AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="dist/js/jquery-3.6.0.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
<script src="dist/js/jquery.dataTables.min.js"></script>
<script src="dist/js/userMaster.js"></script>

<?php
include_once './include/footer.php';
?>