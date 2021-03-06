<?php
include "functions.php";
if (!isCookieSet()){
    header("location: index.php");
}
if (isset($_POST['photographerName'])&& isset($_POST['albumName'])){
    $result = add_photo($_FILES['photoFile'],$_POST['photographerName'],$_POST['albumName'],$_POST['location'],$_POST['caption']);
}
if (isset($_GET['delete'])){
    $dResult = delete_photo($_GET['delete']);
    header('location: photos.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<!-- Mirrored from medialoot.com/preview/lumino-premium/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Apr 2018 16:51:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Photos</title>

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
        <li class="active"><a href="photos.php"><em class="fa fa-photo"></em> Photos</a></li>
        <li><a href="photographers.php"><em class="fa fa-camera"></em> Photographers</a></li>
    </ul>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-photo"></em>
                </a></li>
            <li class="active">Photos</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Photos</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add new photo</div>
                <div class="panel-body">
                    <?php
                    if (isset($result)) {
                        if ($result == true) {

                            ?>
                            <div class="text-success"> Photo added successfully!</div>
                            <?php
                        } else {
                            ?>
                            <div class="text-danger"> Add photo failed!</div>
                            <?php
                        }
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <p>Upload new photo:</p>
                        <div class="form-group">
                            <label class="btn btn-default">
                                <input type="file" name="photoFile" hidden>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Select Photographer </label>
                            <div class="form-group">
                                <select class="form-control" name="photographerName">
                                    <?php
                                    if(get_all_photographers()!=null) {
                                        foreach (get_all_photographers() as $row) {
                                            ?>
                                            <option value="<?php echo $row['0'] ?>"><?php echo $row['1'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Select Album </label>
                            <div class="form-group">
                                <select class="form-control" name="albumName">
                                    <?php
                                    if(get_all_albums()!=null) {
                                        foreach (get_all_albums() as $row) {
                                            ?>
                                            <option value="<?php echo $row['0'] ?>"><?php echo $row['1'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="location" placeholder="Where was this taken?">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="caption" placeholder="Say something about this photo..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Existing Photos</div>
                <div class="panel-body">
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="photoTitle" data-sortable="true">File Name</th>
                            <th data-field="photoCaption"  data-sortable="true">Caption</th>
                            <th data-field="cameraName" data-sortable="true">Camera Model</th>
                            <th data-field="date" data-sortable="true">Date of Capture</th>
                            <th data-field="location" data-sortable="true">Location</th>
                            <th data-field="photographer" data-sortable="true">Photographer</th>
                            <th data-field="album" data-sortable="true">Album</th>
                            <th data-field="thumb" data-sortable="true">Thumbnail</th>
                            <th data-field="action" data-sortable="true">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(get_all_photos()!=null) {
                            foreach (get_all_photos() as $row ){
                                ?>
                                <tr>
                                    <td><?php echo $row['1']?></td>
                                    <td><?php echo $row['2']?></td>
                                    <td><?php echo $row['3']?></td>
                                    <td><?php if($row['4']=='0000-00-00'){$row['4']='';} echo $row['4']?></td>
                                    <td><?php echo $row['5']?></td>
                                    <td><?php foreach (getPhotographerNameByID($row['6']) as $row1){echo $row1[0];}?></td>
                                    <td><?php foreach (getAlbumNameByID($row['7']) as $row2){echo $row2[0];}?></td>
                                    <td><img height="60" width="80" src="../img/portfolio/<?php echo $row['8'] ?>"></td>
                                    <td><a class="btn btn-danger" href="?delete=<?php echo $row['8'] ?>">Delete</a></td>
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
