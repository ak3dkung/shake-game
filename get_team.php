<?php

$dbHost="";
$dbUser="";
$dbPassword="";
$dbName="";

$con = @mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

mysqli_query($con,"SET character_set_results=utf8");
mysqli_query($con,"SET character_set_client=utf8");
mysqli_query($con,"SET character_set_connection=utf8"); 

$userId=$_POST['uid'];

$sql=""  //SQL ในการเรียก Team ของ User
$userQuery=mysqli_query($con,$sql);

if(mysqli_num_rows($userQuery)==1){
    $userData=mysqli_fetch_assoc($userQuery);
    $team=$userData['team'];
    $return=array("code"=>200,"team"=>$team);
    $return=json_encode($return);
    echo $return; 
} else {
    $return=array("code"=>404);
    $return=json_encode($return);
    echo $return; //not In staff List
}


?>