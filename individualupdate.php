<?php

require_once "auth.php";

$postdata = file_get_contents("php://input");
print_r($postdata);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
if(isset($postdata) && !empty($postdata)){
    $request = json_decode($postdata);
    $id = $_GET['id'];
    $tenth = $request->SSC;
    

    $sql = "Update academic_details set SSC_percent='$tenth' where user_id='$id' ";
    if(mysqli_query($con, $sql)){
        
        http_response_code(202);
    }
    else{
        
        http_response_code(422);

    }
}













/*if($result = mysqli_query($con,$sql))
    {
        $cr=0;
        while($row = mysqli_fetch_assoc($result))
        {
            $students[$cr]['id']=$row['user_id'];
            $students[$cr]['fname']=$row['first_name'];
            $students[$cr]['mname']=$row['middle_name'];
            $students[$cr]['lname']=$row['last_name'];
            $students[$cr]['Branch']=$row['Branch'];
            $students[$cr]['sscmarks']=$row['SSC_percent'];
            $students[$cr]['intermarks']=$row['inter_percent'];
            $students[$cr]['btechgpa']=$row['b_tech_gpa'];
            $students[$cr]['batch']=$row['YOP'];
            $cr++;
        }
        echo json_encode($students);
    }
    else
    {
        http_response_code(404);
    }
?>*/