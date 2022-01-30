<?php
/*function userCheck()
{
    return (isset($_SESSION['login']) && $_SESSION['login']=true && isset($_SESSION['username']) && isset($_SESSION['password']));
}

if(userCheck())
    {
		header("Location: ../schmanager/admindashboard.php");
	}
else
    {
		header("Location: ../schmanager/index.php");
	}*/
function userCheck()
{
    return (isset($_SESSION['login']) && $_SESSION['login']=true && isset($_SESSION['username']) && isset($_SESSION['password']));
}

if(!userCheck())
    {
		header("Location: ../schmanager/index.php");
		exit();
	}

?>