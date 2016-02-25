<?php

require 'connection.php';
require 'config.php';


$schoolResult = $conn -> query(" SELECT strSchCode, strSchDesc FROM tblSchool");
$schoolData = $schoolResult -> fetchAll();

$programResult = $conn -> query(" SELECT strProgCode, strProgDesc FROM tblProgram");
$progData = $programResult -> fetchAll();

$schedResult = $conn -> query(" SELECT strSchedCode, strSchedDesc FROM tblSchedule");
$schedData = $schedResult -> fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Learner Profile</title>

    <script>
    function fnUploadImage(){
        <?php
            // $isUpload = fnUpload("file-picture");
        ?>
    }
    </script>

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

</head>


<body>

   <div class="col-lg-10" id="custom-form">
        <div class="col-sm-4">
            <div class="form-group image-upload">   
                <label for="file-picture">
                    <img class="img-thumbnail" src="../Images/Avatar.jpg" width="200" height="200"/>
                </label>
                <input id="file-picture" type="file" name="file-picture" onchange="fnUploadImage(this)" />
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group required" id = "learnerId-div">   
                <label class="control-label" for="learnerid">Learner ID</label>
                <input id = "learnerid-id" required="required" name = "learnerid" class = "form-control" type="text" placeholder="Learner ID" onblur = fnRequired(this,"learnerId-div","leanerId")>        
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group required" id = "lname-div">
                <label class="control-label">Full name</label>
                <input id = "lname-id" name = "lastname" class = "form-control" type="text" placeholder="Last" onblur = fnRequired(this,"lname-div","lastname")>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group" id = "fname-div">
                <label>&nbsp</label>    
                <input id = "fname-id" name = "firstname" class = "form-control" type="text" placeholder="First" onblur = fnRequired(this,"fname-div","firstname")>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group required">
                <label class="control-label" >School</label>
                <select id = "school-id" name="school" class="form-control">
                    <option selected="true" disabled="disabled">-Select-</option>
                    <?php
                        foreach ($schoolData as $school) {
                            echo "<option value = $school[strSchCode]> $school[strSchDesc]</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">  
            <div class="form-group required">
                <label class="control-label">Program</label>
                <select id = "program-id" name="program" class="form-control">
                <option selected="true" disabled="disabled">-Select-</option>
                    <?php
                        foreach ($progData as $program) {
                                echo "<option value = $program[strProgCode] >$program[strProgDesc]</option>";
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-sm-4">  
            <div class="form-group required">
                <label class="control-label">Schedule</label>
                <select id = "schedule-id" name="schedule" class="form-control">
                <option selected="true" disabled="disabled">-Select-</option>
                    <?php
                        foreach ($schedData as $schedule) {
                                echo "<option value = $schedule[strSchedCode]>$schedule[strSchedDesc]</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">  
            <div class="form-group required">
                <label class="control-label">Gender</label>
                <select id = "gender-id" name="sex" class="form-control">
                <option selected="true" disabled="disabled">I am..</option>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">  
            <div class="form-group required">
                <label class="control-label">Birthdate</label>
                <select id = "bdate-month-id" name="month" class="form-control">
                    <option selected="true" disabled="disabled">Month</option>
                    <?php 
                        for($intCounter = 1; $intCounter <= 12; $intCounter++){
                            echo "<option value=$intCounter>$months[$intCounter]</option>"; 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group" id = "day-div">
                <label class= "control-label" for="contact">&nbsp</label>
                <input id = "bdate-day-id" name = "day" class = "form-control" type="number" placeholder="Day" onblur = fnRequired(this,"day-div","day")>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group" id = "year-div">
                <label class= "control-label" for="contact">&nbsp</label>
                <input id = "bdate-year-id" name = "year" class = "form-control" type="number" placeholder="Year" onblur = fnRequired(this,"year-div","year")>
            </div>
        </div>
        <div class="col-sm-6" >
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id = "address-id" rows = 4 name = "address" class = "form-control"></textarea>
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-group required">
                <label for="guardian">Guardian</label>
                <input id = "guardian-id" name = "guardian" class = "form-control" type="text" placeholder="Name">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group required">
                <label  for="contact">Contact No.</label>
                <input id = "contact-id" name = "contact" class = "form-control" type="text" placeholder="Guardian's No.">
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label for="dream">Dream</label>
                <textarea id = "dream-id" rows = 5 name = "dream" class = "form-control"></textarea>
            </div>
        </div>
    </div>
</body>
</html>
