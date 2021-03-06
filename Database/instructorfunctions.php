<?php
function executeQuery($query)
{
    $returnValue = array();

    require 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error)
        die($conn->connect_error);  // Need better error handling

    $result = $conn->query($query);
    if (!$result) {
        $conn->close();
        die($conn->error);  // Need better error handling
    }
        
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnValue[] = $row;
    }
        
    $result->close();
    $conn->close();
        
    return $returnValue;
}


function InsertInstructor($iID, $iname)
{
	require_once 'login.php';
	$connection = new mysqli($hn, $un, $pw, $db);

	$query = "INSERT INTO Instructor(instructorID, instructorname)" 
	. "VALUES('$iID','$iname')";
	
	$result = $connection->query($query);
	if(!$result) die($connection->error);
}

function getInstructorname($iID)
{
	$query = "SELECT instructorname FROM Instructor WHERE instructorID='$iID' ";
    $result = executeQuery($query);
    return $result;

}

function deleteInstructor($iID)
{
	$query = "DELETE FROM Instructor WHERE product_id = 'iID'";
	$result = executeQuery($query);
}

?>
