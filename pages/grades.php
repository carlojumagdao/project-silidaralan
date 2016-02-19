<?php

require "connection.php";
require "computegrade.php";

if(isset($_POST['btnUpdateGrade'])){

    $intGrdLvl = $_POST['gradelvl'];
    $dblFilipino = $_POST['Filipino'];
    $dblMath = $_POST['Math'];
    $dblScience = $_POST['Science'];
    $dblEnglish = $_POST['English'];
    $dblMakabayan = $_POST['Makabayan'];

    $stmt1 = $conn -> prepare("UPDATE tblGrade 
                                SET dblFilipino=:dblFilipino,dblMath=:dblMath,dblScience=:dblScience,dblEnglish=:dblEnglish,dblMakabayan =:dblMakabayan 
                                WHERE strGrdLearCode = :strLearCode && intGrdLvl=:intGrdLvl");
    $stmt1->bindParam(':strLearCode',$strLearCode,PDO::PARAM_STR);
    $stmt1->bindParam(':intGrdLvl',$intGrdLvl,PDO::PARAM_INT);
    $stmt1->bindParam(':dblFilipino',$dblFilipino,PDO::PARAM_STR);
    $stmt1->bindParam(':dblMath',$dblMath,PDO::PARAM_STR);
    $stmt1->bindParam(':dblScience',$dblScience,PDO::PARAM_STR);
    $stmt1->bindParam(':dblEnglish',$dblEnglish,PDO::PARAM_STR);
    $stmt1->bindParam(':dblMakabayan',$dblMakabayan,PDO::PARAM_STR);
    $stmt1->execute();
}

if(isset($_POST['btnSubmitGrade'])){

    $intGrdLvl = $_POST['gradelvl'];
    $dblFilipino = $_POST['Filipino'];
    $dblMath = $_POST['Math'];
    $dblScience = $_POST['Science'];
    $dblEnglish = $_POST['English'];
    $dblMakabayan = $_POST['Makabayan'];

    $stmt1 = $conn -> prepare("INSERT INTO tblGrade(strGrdLearCode,intGrdLvl,dblFilipino,dblMath,dblScience,dblEnglish,dblMakabayan) VALUES(:strLearCode,:intGrdLvl,:dblFilipino,:dblMath,:dblScience,:dblEnglish,:dblMakabayan)");
    $stmt1->bindParam(':strLearCode',$strLearCode,PDO::PARAM_STR);
    $stmt1->bindParam(':intGrdLvl',$intGrdLvl,PDO::PARAM_INT);
    $stmt1->bindParam(':dblFilipino',$dblFilipino,PDO::PARAM_STR);
    $stmt1->bindParam(':dblMath',$dblMath,PDO::PARAM_STR);
    $stmt1->bindParam(':dblScience',$dblScience,PDO::PARAM_STR);
    $stmt1->bindParam(':dblEnglish',$dblEnglish,PDO::PARAM_STR);
    $stmt1->bindParam(':dblMakabayan',$dblMakabayan,PDO::PARAM_STR);
    $stmt1->execute();

}

$stmt = $conn -> prepare("SELECT * FROM tblGrade WHERE strGrdLearCode = :strLearCode ORDER BY intgrdlvl DESC");
$stmt->bindParam(':strLearCode', $strLearCode, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt -> fetchAll();
$intLatestGradeLvl = 0;
$intLatestGradeLvlCtr = 1;
foreach($result as $latestgradelevel){
    $intLatestGradeLvl = $latestgradelevel['intGrdLvl'];
    $intLatestGradeLvlCtr = $latestgradelevel['intGrdLvl'];
    if($intLatestGradeLvl < 12){
        $intLatestGradeLvlCtr++;
    }   
    break;
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

    <title>Learners</title>

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

    <script>
        function fnAddGrade(){
            var field = document.getElementById("btnGrade");
            field.value = " Save " ;
            field.name = "btnSubmitGrade"; 
            document.getElementById('gradelvl').disabled = false;
            document.getElementById("fixedbutton").style.display = 'none'; 
            document.getElementById("Filipino").value = "";
            document.getElementById("Math").value = ""
            document.getElementById("Science").value = "";
            document.getElementById("English").value = "";
            document.getElementById("Makabayan").value = "";
        }
        function fnRemoveDisable(){
            document.getElementById('gradelvl').disabled = false;
        }
        function fnEditGrade($intGrdLvl,$dblFilipino,$dblMath,$dblScience,$dblEnglish,$dblMakabayan){
            document.getElementById("Filipino").value = $dblFilipino;
            document.getElementById("Math").value = $dblMath;
            document.getElementById("Science").value = $dblScience;
            document.getElementById("English").value = $dblEnglish;
            document.getElementById("Makabayan").value = $dblMakabayan;
            document.getElementById("gradelvl").value = $intGrdLvl;
            document.getElementById('gradelvl').disabled = true;
            var field = document.getElementById("btnGrade");
            field.value = "Update";
            field.name = "btnUpdateGrade";   
            document.getElementById("fixedbutton").style.display = 'block';   
        }
        
    </script>


</head>
<body>

    <button style="display:none;" onclick = "fnAddGrade()" type="button" class="btn btn-primary btn-circle btn-lg" id="fixedbutton" data-toggle="tooltip" data-placement="left" title="Add Grades"><i class="fa fa-plus"></i>
    </button>                                  
    <div class="col-lg-12">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>GradeLevel</th>
                                <th>Filipino</th>
                                <th>Math</th>
                                <th>Science</th>
                                <th>English</th>
                                <th>Makabayan</th>
                                <th>Average(%)</th>
                                <th style="text-align:center;">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form method="POST" action="">
                                    <td>
                                        <div class="form-group">
                                            <select id = "gradelvl" name="gradelvl" class="form-control">
                                            <option selected="true" value ="<?php echo "$intLatestGradeLvlCtr"?>"><?php echo "$intLatestGradeLvlCtr" ?></option>
                                            <?php for($intCounter = 1; $intCounter <=12; $intCounter++){
                                                echo "<option value=$intCounter>$intCounter</option>";                        
                                                } ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input id = "Filipino" name = "Filipino" class = "form-control" type="text">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input id = "Math" name = "Math" class = "form-control" type="text">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input id = "Science" name = "Science" class = "form-control" type="text">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input id = "English" name = "English" class = "form-control" type="text">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input id = "Makabayan" name = "Makabayan" class = "form-control" type="text">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <?php
                                        if($intLatestGradeLvl < 12){ ?>
                                        <td>
                                            <div class="form-group">  
                                                <input id = "btnGrade" name = "btnSubmitGrade" value = " Save " onclick = "fnRemoveDisable()" class = "btn btn-primary btn-block" type="submit">
                                            </div>
                                        </td>
                                        <?php } else { ?>
                                        <td>
                                            <div class="form-group">  
                                                <input id = "btnGrade" name = "btnSubmitGrade" value = " Save " class = "btn btn-primary btn-block" type="submit" disabled>
                                            </div>
                                        </td>
                                        <?php }
                                    ?>
                                </form>
                            </tr>
                            <?php $intCounter = 0;?>
                            <?php foreach ($result as $datum) { ?>
                                <tr>
                                    <td class = "code"><?php echo $datum['intGrdLvl']?></td>
                                    <td><?php echo $datum['dblFilipino']?></td>
                                    <td><?php echo $datum['dblMath']?></td>
                                    <td><?php echo $datum['dblScience']?></td>
                                    <td><?php echo $datum['dblEnglish']?></td>
                                    <td><?php echo $datum['dblMakabayan']?></td>
                                    <?php $dblAverage[$intCounter] = fnAverage($datum['dblFilipino'],$datum['dblMath'],$datum['dblScience'], $datum['dblEnglish'], $datum['dblMakabayan']); ?>
                                    <td><b><?php echo "$dblAverage[$intCounter]";?></b></td>
                                    <td style="text-align:center;">
                                        <button id="btnEdit-id" type="button" class="btn btn-warning btn-circle edit" onclick="fnEditGrade(<?php echo $datum['intGrdLvl']; ?>,<?php echo $datum['dblFilipino']?>,<?php echo $datum['dblMath']?>,<?php echo $datum['dblScience']?>,<?php echo $datum['dblEnglish']?>,<?php echo $datum['dblMakabayan']?>)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-circle delete" onclick="rowFunction()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
                                    </td>
                                </tr>
                            <?php $intCounter++;} ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
            <!-- DataTables JavaScript -->
    <script>
    </script>
	<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
</body>
</html>