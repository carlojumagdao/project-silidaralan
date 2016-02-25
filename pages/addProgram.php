<?php


require 'navigation.php';
require 'banner.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Learners</title>
    <!-- Custom Css -->
    <link href="../customcss/style.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New Program
                            <a style="margin-bottom:1%" href="addLearner.php" class="btn btn-primary">Save</a>
                            <a style="margin-bottom:1%" href="addLearner.php" class="btn btn-danger">Discard</a></h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Program Form 
                                <p style="float:right;">Fields marked with <span class="asterisk">*</span> are required.</p>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="center-form" role="form">
                                        <div class="col-sm-10">
                                            <div class="form-group required">   
                                                <label class="control-label" for="schedulecode">Program Code</label>
                                                <input required="required" title="" name = "progcode" class = "form-control" type="text" placeholder="Program Code">     
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group required">   
                                                <label class="control-label" for="schedulecode">Program Description</label>
                                                <input required="required" title="" name = "progdesc" class = "form-control" type="text" placeholder="Program Description">     
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group required">   
                                                <label for="schedulecode">Background</label>
                                                <textarea  name = "progdesc" class = "form-control" rows="5"> </textarea>    
                                            </div>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
            <!-- DataTables JavaScript -->

</body>
</html>