<?php

require 'navigation.php';
require 'banner.php';
require 'connection.php';

if(isset($_GET['id'])){
    $strLearCode = $_GET['id'];
    
    $stmt = $conn -> prepare('SELECT l.strLearCode, l.strLearFirstname, l.strLearLastname, l.datBirthdate, l.strAddress, l.blSex, l.strGuardian, l.strContact, l.txtDream, l.txtPassion, l.txtSkills, l.txtPicture, s.strSchDesc, s.strSchCode, p.strProgCode, p.strProgDesc, c.strSchedDesc, c.strSchedCode
                                FROM tbllearner AS l LEFT JOIN tbllearnerconnection AS t
                                    ON l.strLearCode = t.strLearConCode
                                LEFT JOIN tblSchool as s
                                    ON t.strSchConCode = s.strSchCode
                                LEFT JOIN tblprogram as p
                                    ON t.strProgConCode = p.strProgCode
                                LEFT JOIN tblschedule as c
                                    ON t.strSchedConCode = c.strSchedCode
                                WHERE l.strLearCode = :strLearCode');
    
    $stmt->bindParam(':strLearCode', $strLearCode, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt -> fetchAll();
  
    foreach ($result as $value) {
        $strGotCode = $value['strLearCode'];
        $strGotFname = $value['strLearFirstname'];
        $strGotLname = $value['strLearLastname'];
        $strGotBirthdate = $value['datBirthdate'];
        $strGotYear = substr($strGotBirthdate, 0, 4);
        $strGotMonth = substr($strGotBirthdate, 5, 2);
        $intGotMonth = (int)$strGotMonth;
        $strGotDay = substr($strGotBirthdate, 8,2);
        $strGotAddress = $value['strAddress'];
        $blGotSex = $value['blSex'];
        if($blGotSex == 0){
            $strGotSex = "Male";
        } else{
            $strGotSex = "Female";
        }
        $strGotGuardian = $value['strGuardian'];
        $strGotContact = $value['strContact'];
        $strGotDream = $value['txtDream'];
        $strGotSchCode = $value['strSchCode'];
        $strGotSchDesc = $value['strSchDesc'];
        $strGotProgCode = $value['strProgCode'];
        $strGotProgDesc = $value['strProgDesc'];
        $strGotSchedCode = $value['strSchedCode'];
        $strGotSchedDesc = $value['strSchedDesc'];
    }
}
if(isset($_POST['btnSave'])){

    echo $_POST['edit-picture'];
    $isUpload = fnUpload("edit-picture");
    echo "<script>alert($isUpload)</script>";
    $strNewCode = $_POST['learnerid'];
    $strLastname = $_POST['lastname'];
    $strFirstname = $_POST['firstname'];
    $strSchCode = $_POST['school'];
    $strProgCode = $_POST['program'];
    $strSchedCode = $_POST['schedule'];
    $strMonth = $_POST['month'];
    $strDay = $_POST['day'];
    $strYear = $_POST['year'];
    $strBirthdate = "$strYear-"."$strMonth-"."$strDay";
    $blSex = $_POST['sex'];
    $strAddress = $_POST['address'];
    $strGuardian = $_POST['guardian'];
    $strContact = $_POST['contact'];
    $strDream = $_POST['dream'];

    if(!empty($strLastname) && !empty($strNewCode) && !empty($strFirstname) && !empty($strSchCode) && !empty($strProgCode) && !empty($strSchedCode) && !empty($strMonth) && !empty($strDay) && !empty($strYear) && !empty($blSex)){
        try {
            $stmt = $conn -> prepare("UPDATE tbllearner 
                            SET strLearCode = :learnerid, strLearLastname=:lastname, strLearFirstname=:firstname,datBirthdate=:Birthdate, strAddress=:address, blSex=:sex,strGuardian=:guardian,strContact = :contact,txtDream=:dream
                            WHERE strLearCode = :gotlearcode");
            $stmt->bindParam(':learnerid', $strNewCode, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $strLastname, PDO::PARAM_STR);
            $stmt->bindParam(':firstname', $strFirstname, PDO::PARAM_STR);
            $stmt->bindParam(':Birthdate', $strBirthdate, PDO::PARAM_STR);
            $stmt->bindParam(':address', $strAddress, PDO::PARAM_STR);
            $stmt->bindParam(':sex', $blSex, PDO::PARAM_STR);
            $stmt->bindParam(':guardian', $strGuardian, PDO::PARAM_STR);
            $stmt->bindParam(':contact', $strContact, PDO::PARAM_STR);
            $stmt->bindParam(':dream', $strDream, PDO::PARAM_STR);
            $stmt->bindParam(':gotlearcode', $strGotCode, PDO::PARAM_STR);
            $stmt->execute();
            echo "<script>alert('success')</script>";
        } catch (Exception $ex) {
            echo "Error:".$ex->getMessage();
        }
    } else {
        echo "cannot submit";
    }
}
require 'viewlearner.tmpl.php';
?>
