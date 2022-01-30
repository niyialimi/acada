<?php
function userCheck()
{
    return (isset($_SESSION['parentusername']) && isset($_SESSION['parentpassword']));
}

if(!userCheck())
    {
		header("Location: ../parent/index.php");
		exit();
	}

?>