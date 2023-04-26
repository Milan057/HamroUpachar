<?php
$database="minorproject";
$host="localhost";
$username="root";
$password='';
$con=mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_errno()){
	die("Failed to connect to the Database!!");
}
function selectQuery($tablename,$columns=[]){
$query="SELECT * from ";
$query.=$tablename;

if($columns){
	$query.=" WHERE ";
	foreach($columns as $key=> $value){
		$query.=$key;
		$query.=" = ";
		$query.="'".$value."'";
		$query.=" AND ";
	}
	$query=rtrim($query,"AND ");

}
return $query;
}

function executeQuery($query){
	global $con;
	$execute= mysqli_query($con,$query);
	if($execute){
	return $execute;
 }else{
 	die(mysqli_error($con));
 }

}
function insertQuery($tablename,$column_names=[],$datas=[]){
	$sql="INSERT into ";
	$sql.=$tablename;
	$sql.="(";
	foreach($column_names as $column_name){
		$sql.=$column_name;
		$sql.=",";
	}
	$sql=rtrim($sql,",");
	$sql.=")VALUES(";
	foreach($datas as $data){
		$sql.="'";
		$sql.=$data;
		$sql.="'";
		$sql.=",";
	}
	$sql=rtrim($sql,",");
	$sql.=")";
	return $sql;
}
?>