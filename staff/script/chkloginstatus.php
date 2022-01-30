<?php
function userCheck()
{
    return (isset($_SESSION['staffusername']) && isset($_SESSION['staffpassword']));
}

if(!userCheck())
    {
		header("Location: ../staff/index.php");
		exit();
	}

?>