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
    <title>UMS | Skill Master</title>
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
                        <h1>Skill Master</h1>
                    </div>

                    <!-- Add BUtton -->
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary skillMasterForm" data-toggle="modal" data-target="#skillMasterForm">
                            Add SKills <i class="fas fa-plus"></i></button>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Skill Master</li>
                        </ol>
                    </div>
                    <div id="errorMessage">
                        <span id="errorMessage"></span>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Insert Record Modal -->
        <section class="content-body">
            <div class="modal fade" id="skillMasterForm" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Skill Master <i class="fas fa-tools"></i></h5>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" id="skillMasterForm" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- <input type="hidden" name="id" id="id"> -->
                                        <div class="form-group col-sm-12">
                                            <label>Skill Name:</label>
                                            <input type="text" class="form-control" name="skill_name" id="skill_name" placeholder="Enter Skill Name" required autocomplete="FALSE">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                            <button type="button" name="close" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Edit Record Form -->
        <section class="content-body">
            <div class="modal fade" id="editSkillMaster" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Skill Master <i class="fas fa-tools"></i></h5>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" id="editSkillForm" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <input type="hidden" name="skill_id" id="skill_id">
                                            <label>Skill Name:</label>
                                            <input type="text" class="form-control" name="skill_name" id="update_skill_name" placeholder="Enter Skill Name" required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" id="submit" onclick=" updatedata()" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                <h3 class="card-title">Skill Master Table <i class="fas fa-tools"></i></h3>
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 500px;">
                                <table id="skillMasterTable" class="table table-bordered table-striped table-hover table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Skill Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="skillMasterRecord">
                                        <!-- Record will fetch from AJAX view_skillMaster.php -->
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
<script src="dist/js/skillMaster.js"></script>

<?php
include_once './include/footer.php';
?>