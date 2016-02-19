<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link href= "../loginfiles/style.css" type="text/css" rel="stylesheet">
	<script src="../loginfiles/jquery/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../loginfiles/jquery/jquery.maskedinput.js" type="text/javascript"></script>
	<script type="text/javascript" src="../loginfiles/js/script.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="../loginfiles/js/strength.js"></script>
	<script type="text/javascript" src="../loginfiles/js/js.js"></script>
	<script>
	var intValidEmail = 0;
	var intValidBday = 0;
	var strPassword;
	$(document).ready(function($) {
		
	$('#myPassword').strength({
	            strengthClass: 'strength',
	            strengthMeterClass: 'strength_meter'
	        });

	});
	
		function fnPassword(obj){
			strPassword = obj.value.trim();
		}
		function fnPasswordCheck(obj,strSpanName){
			if(obj.value.trim() != strPassword){
				document.getElementById(strSpanName).innerHTML="Passwords do not match";
			} else {
				document.getElementById(strSpanName).innerHTML="";
			}
		}
		function fnFocusMessage(obj){
			var tooltip = document.getElementById("tooltipLong");
			if(intValidEmail == 1){
			    tooltip.innerHTML = obj.title;
			    tooltip.style.display = "block";
			    tooltip.style.top = obj.offsetTop - tooltip.offsetHeight + "px";
			    tooltip.style.left = obj.offsetLeft + "px";
			} else {
			    tooltip.style.display = "none";
			    tooltip.style.top = "-9999px";
			    tooltip.style.left = "-9999px";
			}

		}
		function fnFocusMessageShort(obj){
			var tooltip = document.getElementById("tooltipShort");
			if(intValidBday == 1){
			    tooltip.innerHTML = obj.title;
			    tooltip.style.display = "block";
			    tooltip.style.top = obj.offsetTop - tooltip.offsetHeight + "px";
			    tooltip.style.left = obj.offsetLeft + "px";
			} else if(intValidBday == 2){
			    tooltip.innerHTML = "Cannot make SAI ID with this birthdate";
			    tooltip.style.display = "block";
			    tooltip.style.top = obj.offsetTop - tooltip.offsetHeight + "px";
			    tooltip.style.left = obj.offsetLeft + "px";
			} else {
			    tooltip.style.display = "none";
			    tooltip.style.top = "-9999px";
			    tooltip.style.left = "-9999px";
			}

		}
		function fnValidEmail(obj){  
			var tooltip = document.getElementById("tooltipLong");
		    tooltip.style.display = "none";
		    tooltip.style.top = "-9999px";
		    tooltip.style.left = "-9999px";
		    if(obj.value.trim() == ""){
		    	obj.style.backgroundColor="#ffffff";
				intValidEmail = 0;
		    }else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(obj.value)){  
				obj.style.backgroundColor="#FEFDD2";
				intValidEmail = 1;
			}else{
				obj.style.backgroundColor="#ffffff";
				intValidEmail = 0;
			}  
		}
		function fnValidBirthday(obj){
			var tooltip = document.getElementById("tooltipShort");
			tooltip.style.display = "none";
			tooltip.style.top = "-9999px";
			tooltip.style.left = "-9999px";
			var arrTmp = obj.value.split("/");
			var datCurrent = new Date();
			var datDay = datCurrent.getDate();
			var datMonth = datCurrent.getMonth() + 1;
			var datYear = datCurrent.getFullYear();
			if(datDay<10){
				datDay = '0' + datDay;
			}
			if(datMonth < 10){
				datMonth = '0' + datMonth;
			}
			datCurrent = datMonth+'/'+datDay+'/'+datYear;
			if(arrTmp[0] > 12 || arrTmp[1] > 31 || obj.value == ""){
				obj.style.backgroundColor="#FEFDD2";	
				intValidBday = 1;
			}else if(arrTmp[2] < 1860 || arrTmp[2] > 2008){
				obj.style.backgroundColor="#FEFDD2";	
				intValidBday = 2;
			}else{
				obj.style.backgroundColor="#FFFFFF";
				intValidBday = 0;
			}
		}  
	</script>
</head>
<body>
	<div id="loginBody">
		<img style="margin:1% 0% 0% 1%;"src="../loginfiles/uploads/Sai-logo gray copy.png" width="100" height="43">
		<center>
			<img src="../loginfiles/uploads/Door White.png" width="92" height="112">
			<h1>Sign in to Silid Aralan</h1>
			<form id = "form-wrapper" method="POST" action="index.php">
				<input style="border-top-right-radius: 0.5em;border-top-left-radius: 0.5em;" type="text" placeholder="Silid Aralan ID"/>
				<input style="width:43.2%;border-top:solid 1px #bebebe;border-top-width:thin;border-bottom-left-radius: 0.5em;" type="password" placeholder="Password"/>
				<input class="login"style="margin-left:-.9%;width:9%;border-top:solid 1px #bebebe;border-top-width:thin;border-bottom-right-radius: 0.5em;" type="submit" value=" " name="btnLogin">
			</form>
			<div class="squaredFour">
			    <input type="checkbox" value="None" id="squaredFour" name="checkBox"></input>
			    <label for="squaredFour"></label>
			</div>
			<p style="margin:-1.6% 0% 0% 3.5%;font-size:17px;">Keep me signed in</p>
			<div id="accountLinks">
				<a class = "whitelink" href = "forgot.php">Forgot Silid Aralan ID or Password?</a>
			</div>
			<span style="font-size:13px;color:rgba(238, 253, 255, 0.8);">Don't have a Silid Aralan ID?</span> <a class = "whitelink" href="#openModal">Create yours now.</a>
			<div id="footer">
				<a class="whitelink" href = "forgot.php">Terms & Condition</a>
				<span style="font-weight:bold;color:rgba(238, 253, 255, 0.8);">|</span>
				<a class="whitelink" href = "forgot.php">Privacy Policy</a>
				<span style="font-weight:bold;color:rgba(238, 253, 255, 0.8);">|</span>
				<a class="whitelink" href = "forgot.php">Use of cookies</a>
				<p style="margin-top:.5%;font-size:13px;color:rgba(238, 253, 255, 0.8);">© 2015 Silid Aralan, Inc. All rights reserved.</p>
			</div>
		</center>
	</div>
	<div id="openModal" class="modalDialog">
	    <div>	
	    	<a href="#close" title="Close" class="close">X</a>
	    	<div class = "modalHeader"><h2 style="line-height:2em;">Create Your Silid Aralan ID</h2></div>
	    	<div class= "modalContent">
	    	<p style="margin-top:4%;color:black;text-align:center;font-size:15px;">Create account and gain access to learner's<br>Portfolio ☻ Documents ☻ Grades</p>
	    		<form class ="registration" method="POST" action="">
	    			<input name = "tbEmail" type = "text" placeholder="name@example.com" id = "email" onfocus="fnFocusMessage(this)" onblur="fnValidEmail(this);" title="Enter a valid email address to use as your SAI ID like (name@example.com)"/>
	    			<input name = "tbFirstname" style = "width:42.5%;" type = "text" placeholder="first name"/>
	    			<input name = "tbLastname" style = "width:42.5%;" type = "text" placeholder="last name"/>
	    			<input name = "tbBirthdate" type = "text" id = "date" placeholder="birthday (mm/dd/yyy)" onfocus="fnFocusMessageShort(this)" onblur="fnValidBirthday(this);" title="Enter a valid birthdate"/>
	    			<input name = "tbPassword" id = "myPassword" type = "password" placeholder="password" onblur="fnPassword(this)" />
	    			<input type = "password" placeholder="confirm password" onblur="fnPasswordCheck(this,'password-span')"/> <span style = "font-size:12px;color:red;" id = "password-span"></span>
	    			<input name = "tbCompany" type = "text" placeholder="company" />
	    			<input style = "padding-left:1px;font-size:15px;font-weight:600;color:#ffffff;cursor: pointer;background-color:rgb(245, 193, 2);margin-top:3%;margin-left:30%;width:32.5%;" type = "submit" value="Submit" name="btnRegister" />
	    		</form>
	    		<div id="tooltipLong"></div>
	    		<div id="tooltipShort"></div>
	    	</div>
	     </div>
	</div>
</body>
</html>