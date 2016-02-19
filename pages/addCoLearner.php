<?php


require 'navigation.php';
require 'banner.php';
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <script>
        function fnRequired(obj,strdiv,strSpanName){
            if((obj.value.trim() == "") || (obj.value <= 0)){
                document.getElementById(strdiv).className="form-group has-error";
            } else{
                document.getElementById(strdiv).className="form-group has-success";
            }
        }

        function fnValidEmail(obj,strdiv,strSpanName){  
                if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(obj.value) || obj.value.trim() == ""){  
                    document.getElementById(strdiv).className="has-error";
                }else{
                    document.getElementById(strdiv).className="has-success";
                }  
        }
    </script>
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
                        <h1 class="page-header">New Co-Learner</h1>
                    </div>
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="" style="margin-bottom:1%;">
                            <input name="btnSubmit" type="submit" value="Save" class="btn btn-primary">
                            <input name="btnDiscard" type="submit" value="Discard" class="btn btn-danger">
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Learners Form 
                                <p style="float:right;">Fields marked with <span class="asterisk">*</span> are required.</p>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-10" id="custom-form">
                                    <div class="col-sm-4">
                                        <div class="form-group">    
                                            <label><img src="../Images/Avatar.jpg" width="200" height="200"></label>
                                            <input type="file">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group required" id = "coleId-div">   
                                            <label class="control-label" for="learnerid">Co-Learner ID</label>
                                            <input required="required" value="" name = "learnerid" class = "form-control" type="text" placeholder="Learner ID" onblur= fnRequired(this,"coleId-div","learnerid")>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group required" id = "lname-div">
                                            <label class="control-label">Full name</label>
                                            <input name = "lastname" class = "form-control" type="text" placeholder="Last" onblur= fnRequired(this,"lname-div","lastname")>
                                            <span style="color:red;" id="lastname"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" id = "fname-div">
                                            <label>&nbsp</label>    
                                            <input name = "firstname" class = "form-control" type="text" placeholder="First" onblur= fnRequired(this,"fname-div","firstname")>
                                            <span style="color:red;" id="firstname"></span>                                       
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-8">
                                        <div class="form-group" id = "email-div">
                                            <label>Email</label>    
                                            <input name = "firstname" class = "form-control" type="text" placeholder="Email" onblur= fnValidEmail(this,"email-div","email")>
                                            <span style="color:red;" id="email"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">  
                                        <div class="form-group required">
                                            <label class="control-label">Gender</label>
                                            <select name="sex" class="form-control">
                                            <option selected="true" disabled="disabled">I am..</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">  
                                        <div class="form-group required">
                                            <label class="control-label">Birthdate</label>
                                            <select name="month" class="form-control">
                                            <option selected="true" disabled="disabled">Month</option>
                                            <?php 
                                                for($intCounter = 0; $intCounter < 12; $intCounter++){
                                                    echo "<option value=$intCounter++>$months[$intCounter]</option>"; 
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" id = "day-div">
                                            <label class= "control-label" for="contact">&nbsp</label>
                                            <input name = "day" class = "form-control" type="number" placeholder="Day" onblur= fnRequired(this,"day-div","day")
                                            ><span style="color:red;" id="day"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" id = "year-div">
                                            <label class= "control-label" for="contact">&nbsp</label>
                                            <input name = "year" class = "form-control" type="number" placeholder="Year" onblur= fnRequired(this,"year-div","year")
                                            ><span style="color:red;" id="year"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea rows = 4 name = "address" class = "form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Occupation</label>    
                                            <input name = "firstname" class = "form-control" type="text" placeholder="First">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <label  for="contact">Contact No.</label>
                                            <input name = "contact" class = "form-control" type="text" placeholder="Guardian's No.">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Background</label>
                                            <textarea rows = 5 name = "dream" class = "form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                    </div>                  
                        </form>
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