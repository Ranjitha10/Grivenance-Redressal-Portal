<?php
require_once('../include/config.php');
require_once('../include/session.php');

echo $name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
$repass=$_POST['repassword'];
$category=$_POST['category'];
$department=$_POST['department'];

if($pass!=$repass)//if password and confirm password are different
	header('Location: ../admin_addAuthority.php?passNotMatch');
	//echo 'pass not match';

else{	
	//encrypt the password
	$encpass = md5($pass);
	echo 'pass match';
		
	//query to create a new user login in table login
	$query="INSERT INTO `login`(`username`, `password`, `priv`) VALUES ('".$email."','".$encpass."',2)";
	$exec=mysql_query($query);
	if(!$exec)//if couldn't add in login table
		header('Location: ../admin_addAuthority.php?error');
		//echo 'query 1 error';
		
	else{	
		//query to get the loginID created from table login
		$query="SELECT `login_id` FROM `login` 
				WHERE `username` LIKE '".$email."'
				";
		$exec=mysql_query($query);
		$loginID=mysql_fetch_array($exec);
		if(!$exec)//if couldn't access loginID
			header('Location: ../admin_addAuthority.php?error');
			//echo 'query 2 error';
			
			
		else{
			//query to insert authority in the table committeemember
			echo $query="INSERT INTO `committeemember`(`committeeMember_id`, `committeeMember_name`, `committeeMember_email`, 					`committeeMember_category_id`, `committeeMember_department_id`) VALUES 
			(".$loginID[0].", '".$name."', '".$email."', ".$category.", ".$department.")";
			
			$exec=mysql_query($query);
			
			if($exec){//if couldn't add in committeemember table
				//echo"done";
				header('Location: ../admin_addAuthority.php?success');
			}
			else
			//echo 'hello';
				header('Location: ../admin_addAuthority.php?error');
		}
	}
}

?>
