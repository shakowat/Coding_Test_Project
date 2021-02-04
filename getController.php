<?php 

$connect = new PDO("mysql:host=localhost;dbname=rexx_systems", "root", "");



$column = array('participation_id', 'employee_name', 'employee_mail', 'event_id','event_name','participation_fee','event_date','version');

$query = '
SELECT * FROM programs 
WHERE employee_name LIKE "%'.$_POST["search"]["value"].'%" 
OR event_name LIKE "%'.$_POST["search"]["value"].'%" 
OR event_date LIKE "%'.$_POST["search"]["value"].'%" 

';

if(isset($_POST["participation_fee"]))
{
 $query .= 'ORDER BY '.$column[$_POST['participation_fee']['0']['column']].' '.$_POST['participation_fee']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY participation_id ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$total_amount = 0;

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["participation_id"];
 $sub_array[] = $row["employee_name"];
 $sub_array[] = $row["employee_mail"];
 $sub_array[] = $row["event_id"];
 $sub_array[] = $row["event_name"];
 $sub_array[] = $row["participation_fee"];
 $sub_array[] = $row["event_date"];
 $sub_array[] = $row["version"];

 $total_amount = $total_amount + floatval($row["participation_fee"]);
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM programs";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST["draw"]),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data,
 'total'    => number_format($total_amount, 2)
);

echo json_encode($output);

?>