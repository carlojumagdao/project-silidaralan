<?php


require 'navigation.php';
require 'banner.php';
require 'connection.php';
require 'smartcounter.php';
require 'upload.php';

$results = $conn -> query(" SELECT strLearCode FROM tbllearner");
$data = $results -> fetchAll();
foreach ($data as $datum) {
	$strLatestCode = $datum;
}
$strNewCode = smartcounter($strLatestCode['strLearCode']);

if(isset($_POST['btnSubmit'])){

    $isUpload = fnUpload("file-picture");
    echo "<script>alert($isUpload)</script>";
	// $strNewCode = $_POST['learnerid'];
	// $strLastname = $_POST['lastname'];
	// $strFirstname = $_POST['firstname'];
	// $strSchCode = $_POST['school'];
	// $strProgCode = $_POST['program'];
	// $strSchedCode = $_POST['schedule'];
	// $strGradelevel = $_POST['gradelevel'];
	// $strMonth = $_POST['month'];
	// $strDay = $_POST['day'];
	// $strYear = $_POST['year'];
	// $strBirthdate = "$strYear"."01"."$strDay";
	// $blSex = $_POST['sex'];
	// $strAddress = $_POST['address'];
	// $strGuardian = $_POST['guardian'];
	// $strContact = $_POST['contact'];
	// $strDream = $_POST['dream'];
	
	// if(!empty($strLastname) && !empty($strNewCode) && !empty($strFirstname) && !empty($strSchCode) && !empty($strProgCode) && !empty($strSchedCode) && !empty($strGradelevel) && !empty($strMonth) && !empty($strDay) && !empty($strYear) && !empty($blSex)){
	// 	try {
	// 		$stmt = $conn -> prepare("INSERT INTO tbllearner(strLearCode,strLearLastname,strLearFirstname,datBirthdate,blSex,strGuardian,strContact)
	// 						VALUES (:learnerid,:lastname,:firstname,:Birthdate,:sex,:guardian,:contact)");
	// 		$stmt->bindParam(':learnerid', $strNewCode, PDO::PARAM_STR);
	// 		$stmt->bindParam(':lastname', $strLastname, PDO::PARAM_STR);
	// 		$stmt->bindParam(':firstname', $strFirstname, PDO::PARAM_STR);
	// 		$stmt->bindParam(':Birthdate', $strBirthdate, PDO::PARAM_STR);
	// 		$stmt->bindParam(':sex', $blSex, PDO::PARAM_STR);
	// 		$stmt->bindParam(':guardian', $strGuardian, PDO::PARAM_STR);
	// 		$stmt->bindParam(':contact', $strContact, PDO::PARAM_STR);
	//     	$stmt->execute();
	// 	} catch (Exception $ex) {
	// 		echo "Error:".$ex->getMessage();
	// 	}
	// } else {
	// 	echo "cannot submit";
	// }
}
require 'addLearner.tmpl.php';
?>