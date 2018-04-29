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

    <!--Theme Switcher-->
    <style id="hide-theme">
        body{
            display:none;
        }
    </style>
    <script type="text/javascript">
        function setTheme(name){
            var theme = document.getElementById('theme-css');
            var style = 'css/theme-' + name + '.css';
            if(theme){
                theme.setAttribute('href', style);
            } else {
                var head = document.getElementsByTagName('head')[0];
                theme = document.createElement("link");
                theme.setAttribute('rel', 'stylesheet');
                theme.setAttribute('href', style);
                theme.setAttribute('id', 'theme-css');
                head.appendChild(theme);
            }
            window.localStorage.setItem('lumino-theme', name);
        }
        var selectedTheme = window.localStorage.getItem('lumino-theme');
        if(selectedTheme) {
            setTheme(selectedTheme);
        }
        window.setTimeout(function(){
            var el = document.getElementById('hide-theme');
            el.parentNode.removeChild(el);
        }, 5);
    </script>
    <!-- End Theme Switcher -->


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
            <img src="images/profile-pic-1.jpg" width="50" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
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
                    <em class="fa fa-home"></em>
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
                    <form action="" method="post">
                        <p>Upload new photo:</p>
                        <div class="form-group">
                            <label class="btn btn-default">
                                <input type="file" hidden>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Select Photographer </label>
                            <div class="form-group">
                                <select name="photographerName">
                                    <option value="id">Names</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Select Album </label>
                            <div class="form-group">
                                <select name="albumName">
                                    <option value="id">Names</option>
                                </select>
                            </div>
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
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true" >Photo ID</th>
                            <th data-field="photoTitle" data-sortable="true">File Name</th>
                            <th data-field="photoCaption"  data-sortable="true">Caption</th>
                            <th data-field="cameraName" data-sortable="true">Camera Model</th>
                            <th data-field="date" data-sortable="true">Date of Capture</th>
                            <th data-field="location" data-sortable="true">Location</th>
                        </tr>
                        </thead>
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