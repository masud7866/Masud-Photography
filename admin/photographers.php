<?php
include "functions.php";
if (!isCookieSet()){
    header("location: index.php");
}
if (isset($_POST['photographerName'])&&isset($_POST['photographerDoB'])&&isset($_POST['photographerGender'])){
    $result = add_photographer($_POST['photographerName'],$_POST['photographerDoB'],$_POST['photographerGender']);
}
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from medialoot.com/preview/lumino-premium/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Apr 2018 16:51:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Photographers</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>Admin</span>Panel</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="images/profile-pic.jpg" width="50" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Masud</div>
            <div class="profile-usertitle-status" style="margin-bottom: 3px"><span class="indicator label-success"></span>Online</div>
            <div class="profile-usertitle-status"><a href="logout.php"><span class="fa fa-sign-out"></span>Logout</a></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li><a href="dashboard.php"><em class="fa fa-dashboard"></em> Dashboard</a></li>
        <li><a href="albums.php"><em class="fa fa-book"></em> Albums</a></li>
        <li><a href="photos.php"><em class="fa fa-photo"></em> Photos</a></li>
        <li class="active"><a href="photographers.php"><em class="fa fa-camera"></em> Photographers</a></li>
    </ul>
</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-camera"></em>
                </a></li>
            <li class="active">Photographers</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Photographers</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add new photographer</div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="photographerName" placeholder="Photographer Name...">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date of Birth</label>
                            <input class="form-control" type="date" name="photographerDoB" placeholder="Date of Birth...">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="photographerGender" value="1">Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="photographerGender" value="0">Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Add Photographer</button>
                        </div>
                    </form>
                    <?php
                    if (isset($result)) {
                        if ($result == true) {

                            ?>
                            <div class="text-success"> Photographer added successfully!</div>
                            <?php
                        } else {
                            ?>
                            <div class="text-danger"> Add photographer failed!</div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Existing Photographers</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="photographerName" data-sortable="true">Photographer Name</th>
                            <th data-field="gender" data-sortable="true">Gender</th>
                            <th data-field="age"  data-sortable="true">Age</th>
                            <th data-field="photoCountByPhotographer" data-sortable="true">Number of Photos</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(get_all_photographers()!=null) {
                            foreach (get_all_photographers() as $row ){
                                ?>
                                <tr>
                                    <td><?php echo $row['1']?></td>
                                    <td><?php if ($row['3']==1){echo "Male";}else{echo "Female";}?></td>
                                    <td><?php echo date_diff(date_create($row['2']),date_create(date("Y-m-d")))->format("%y");?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        <div class="col-sm-12">
            <p class="back-link">Made by <a href="https://www.fb.com/masud7866">Masud</a></p>
        </div>
    </div><!--/.row-->
</div><!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-table.js"></script>
<script src="js/custom.js"></script>

</body>

<!-- Mirrored from medialoot.com/preview/lumino-premium/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Apr 2018 16:51:32 GMT -->
</html>
