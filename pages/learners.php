<?php
require 'navigation.php';
require 'banner.php';
require "connection.php";
$results = $conn -> query(" SELECT t.intLearConnID, l.strLearCode, l.strLearFirstname, l.strLearLastname, s.strSchDesc, p.strProgDesc, c.strSchedCode
							FROM tbllearner AS l LEFT JOIN tbllearnerconnection AS t
								ON l.strLearCode = t.strLearConCode
							LEFT JOIN tblSchool as s
								ON t.strSchConCode = s.strSchCode
							LEFT JOIN tblprogram as p
								ON t.strProgConCode = p.strProgCode
							LEFT JOIN tblschedule as c
								ON t.strSchedConCode = c.strSchedCode;");
$data = $results -> fetchAll();
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
                        <h1 class="page-header">Learners <a style="margin-bottom:1%" href="addLearner.php" class="btn btn-primary">Add New</a></h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List of learners
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Learner ID</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>School</th>
                                                <th>Program</th>
                                                <th>Schedule</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach ($data as $datum) { ?>
                                            <tr>
                                                <td class = "code"><?php echo $datum['strLearCode']?></td>
                                                <td><?php echo $datum['strLearFirstname']?></td>
                                                <td><?php echo $datum['strLearLastname']?></td>
                                                <td><?php echo $datum['strSchDesc']?></td>
                                                <td><?php echo $datum['strProgDesc']?></td>
                                                <td><?php echo $datum['strSchedCode']?></td>
                                                <td>
                                                	<button type="button" class="btn btn-primary btn-circle view" onclick="rowFunction()" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></button>
                                                	<button type="button" class="btn btn-danger btn-circle delete" onclick="rowFunction()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
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
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
	<script>
		$('.view').on('click', function() {
		  var id = $(this).parent().parent().find('.code').text();
		  window.location = "viewlearner.php?id=" + id; 
		});
	</script>
	<script>
		$('.delete').on('click', function() {
		  var id = $(this).parent().parent().find('.code').text();
		  window.location = "deletelearner.php?id=" + id; 
		});
	</script>
	<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
</body>
</html>