<?php



try {
	// add your sql-server credentials here
	$conn = new PDO ( "sqlsrv:server = tcp:my-sqlserver-name.database.windows.net,1433; Database = mysql-database", "my-sql-username", "my-password");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch ( PDOException $e ) {
	print( "Error connecting to SQL Server." );
	die(print_r($e));
}


$option = $_REQUEST['option'];
$myquery;

switch($option) {

	case 'top_five_total':
	{
		$myquery = "SELECT job_title, total_pay FROM dbo.salaries WHERE total_pay>250000.00 ORDER BY total_pay DESC" ;

		break;
	}
	case 'bottom_five_total':
	{
		$myquery = "SELECT job_title, total_pay FROM dbo.salaries WHERE total_pay<5000.00 ORDER BY total_pay ASC" ;

		break;
	}
	case 'average_total':
	{
		$myquery = "SELECT avg(total_pay) FROM dbo.salaries" ;

		break;
	}
	default :
	{
		echo 'no option found!';
		return;
	}

}

$stmt = $conn->query($myquery);

$job_titles = array_slice($stmt->fetchAll(PDO::FETCH_ASSOC), 0, 5);

echo json_encode($job_titles);

?>