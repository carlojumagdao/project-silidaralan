<?php

require 'upload.php';
if(!isset($strGotCode)){
    ?><script>self.location.replace("error404.php");</script>><?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Learners</title>
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
</head>

<body onLoad="fnComponentCtrl(true);">

    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Learner's Profile
                        </h1>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo "$strGotCode - $strGotLname, $strGotFname"; ?></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Overview</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Profile</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Grades</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Attendance</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="row" style="margin-top:3%;">
                                        <div class="col-lg-6">
                                            <div class="panel panel-green">
                                                <div class="panel-heading">
                                                    Attendance
                                                </div>
                                                <div class="panel-body" style="padding-left:8%">
                                                   <div id="donutchart" style="width: 400px; height: 300px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    School Grades
                                                </div>
                                                <div class="panel-body">
                                                    <div id="columnchart" style="width: 400px; height: 300px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="row" style="margin-top:3%;">
                                        <button style="display:block;" onclick = "fnComponentCtrl(false)" type="button" class="btn btn-warning btn-circle btn-xl" id="fixedbutton-prof" data-toggle="tooltip" data-placement="left" title="Edit"><i class="glyphicon glyphicon-edit"></i></button> 
                                        <button style="display:block;" onclick = "fnDeleteRecord()" type="button" class="btn btn-danger btn-circle btn-lg"  id="fixedbutton-prof-medium" data-toggle="tooltip" data-placement="left" title="Delete"><i class="glyphicon glyphicon-trash"></i></button> 
                                       <?php include 'learnerprofile.php';?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <?php include 'grades.php'; ?>
                                </div>
                                <div class="tab-pane fade" id="settings" style="margin-top:3%;">
                                    <?php include 'Attendance.php';?>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- Google Chart -->
    <script type="text/javascript" src="../google-chart-js/loader.js"></script>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        document.getElementById('learnerid-id').value = "<?=$strGotCode?>";
        document.getElementById('lname-id').value = "<?=$strGotLname?>";
        document.getElementById('fname-id').value = "<?=$strGotFname?>";
        document.getElementById('school-id').value = "<?=$strGotSchCode?>";
        document.getElementById('program-id').value = "<?=$strGotProgCode?>";
        document.getElementById('schedule-id').value = "<?=$strGotSchedCode?>";
        document.getElementById('gender-id').value = "<?=$blGotSex?>";
        document.getElementById('bdate-month-id').value = "<?=$intGotMonth?>";
        document.getElementById('bdate-day-id').value = "<?=$strGotDay?>";
        document.getElementById('bdate-year-id').value = "<?=$strGotYear?>";
        document.getElementById('address-id').value = "<?=$strGotAddress?>";
        document.getElementById('guardian-id').value = "<?=$strGotGuardian?>";
        document.getElementById('contact-id').value = "<?=$strGotContact?>";
        document.getElementById('dream-id').value = "<?=$strGotDream?>";
        function fnComponentCtrl($blStatus){
            document.getElementById('learnerid-id').disabled = $blStatus;
            document.getElementById('lname-id').disabled = $blStatus;
            document.getElementById('fname-id').disabled= $blStatus;
            document.getElementById('school-id').disabled = $blStatus;
            document.getElementById('program-id').disabled = $blStatus;
            document.getElementById('schedule-id').disabled = $blStatus;
            document.getElementById('gender-id').disabled = $blStatus;
            document.getElementById('bdate-month-id').disabled = $blStatus;
            document.getElementById('bdate-day-id').disabled = $blStatus;
            document.getElementById('bdate-year-id').disabled = $blStatus;
            document.getElementById('address-id').disabled = $blStatus;
            document.getElementById('guardian-id').disabled = $blStatus;
            document.getElementById('contact-id').disabled = $blStatus;
            document.getElementById('dream-id').disabled = $blStatus;
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = new google.visualization.arrayToDataTable([
              ['Grade', 'Average(%)',{role:'annotation'}],
              <?php
                $intCounter = 1;
                foreach($dblAverage as $dblAve){
                    $intCounter++;
                }
                foreach($dblAverage as $dblAve){
                    $intCounter--;
                    ?>
                    ['<?php echo "$intCounter" ?>',<?php echo $dblAve ?> ,'<?php echo "$dblAve"."%" ?>'],
                    <?php
                }
              ?>
            ]);

            var data2 = google.visualization.arrayToDataTable([
              ['Legend', 'Total Number'],
              ['Present',11],
              ['Absent',2],
              ['Excused',5]
            ]);

            var options = {
                chartArea:{right:0,bottom:40,left:60,top:20,width:'50%',height:'75%'},
                legend: { position: 'none' },
                hAxis: {
                  title: 'Grade Level',
                },
            };

            var options2 = {
                chartArea:{bottom:0,right:0,left:10,top:0,width:'50%',height:'75%'},
                title: ' ',
                pieHole: 0.4,
                colors: ['#5cb85c', '#d9534f', '#f0ad4e'],
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
            chart.draw(data, options);

            var chart2 = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart2.draw(data2, options2);
          };
    </script>
</body>
</html>