<?php
function userCheck()
{
    return (isset($_SESSION['stdnumber']) && isset($_SESSION['stdpassword']));
}

if(!userCheck())
    {
		header("Location: ../student/index.php");
		exit();
	}

?>