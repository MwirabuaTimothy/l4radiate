<?php

//echo $row[1];
try
{
	//Open database connection
	$con = mysql_connect("localhost","root","");
	mysql_select_db("bookcheetah_demo", $con);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		//$result = mysql_query("SELECT id, course_number, course_name, created_at FROM courses;");
		$result = mysql_query("SELECT * FROM courses;");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
			
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	
	
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		//$result = mysql_query("INSERT INTO courses(course_number, course_name, book, created_at, updated_at) VALUES('" . $_POST["course_name"] . "', '" . $_POST["course_name"] . "', " . $_POST["book"] . ",now(), now());");
		
		$result = mysql_query("INSERT INTO courses(course_name) VALUES('" . $_POST["course_name"] . "');");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM courses WHERE id = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE courses SET course_name = '" . $_POST["course_name"] . "', professor = " . $_POST["professor"] . " WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM courses WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error messbook
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Messbook'] = $ex->getMessbook();
	print json_encode($jTableResult);
}
	
?>