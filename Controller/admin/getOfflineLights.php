<?php 
header("Content-Type: application/json; charset=UTF-8");
session_start();
require '../../Controller/connection.php';
if( isSession("uid") && isSession("pass") )
{
$uid  = session("uid");
$pass = session("pass");
}
else
header("Location: ../../index.php");

$sql = "SELECT * FROM _f_device where active=1";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $tempDevArr = array();
	$outp = "";
	while($row = $result->fetch_assoc())
	{
		$tempDevArr[$row["dev_id"]] = $row["name"];

	}
        $twentyHoursAgo = date('Y-m-d H:i:s', strtotime('-2 days'));
        $query = "SELECT device ,time FROM _g_data_latest WHERE time <= '{$twentyHoursAgo}'";
        $result2 = $conn->query($query);
        if($result2->num_rows > 0){
            
            while ($row2 = $result2->fetch_assoc()) {
                if ($outp != "") {
                    $outp .= ",";
                }
				$outp .= '{"IMEI":"'.$row2["device"].'","Name":"'.$tempDevArr[$row2["device"]].'","Time":"'.$row2['time'].'"}';
			}
            
        }
	$outp = '{"result":['.$outp.']}';
	echo($outp);
        }
else
{
	echo '{"result":[{"IMEI":"Empty","Time":"No Offline Device"}]}';
}
?>
