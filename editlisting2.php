<?php session_start(); ?>

<?php


$username = $_SESSION['username'];

 $m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
    
 $db = $m->jdpersonal;
 $infocollection = $db->log;
$artifex = $db->artifex;

$id = $_GET["id"];

$artquery = array('_id'=>new MongoID($id));

$artdoc1 = $artifex->find($artquery);

foreach($artdoc1 as $artdoc){
   $description=$artdoc['description'];
    $startmonth=$artdoc['startmonth'];
    $startday=$artdoc['startday'];
    $startyear=$artdoc['startyear'];
    $endmonth=$artdoc['endmonth'];
    $endday=$artdoc['endday'];
    $endyear=$artdoc['endyear'];
    $city=$artdoc['city'];
    $state=$artdoc['state'];
    
}





$query = array('username' => $username);

$cursor = $infocollection->find($query);

$lastname = "";
$firstname = "";
$email = ""; 
$occupation = "";

foreach ($cursor as $doc) {
    $lastname = $doc["lastname"];
    $firstname = $doc["firstname"];
    $email =  $doc["email"];
    $occupation = ucfirst($doc["occupation"]);  
}

 

$artifex = $db->artifex;



$description = $_POST['paragraph_text'];

$startday=$_POST['startday'];
$startmonth=$_POST['startmonth'];
$startyear=$_POST['startyear'];
$endday=$_POST['endday'];
$endmonth=$_POST['endmonth'];
$endyear=$_POST['endyear'];
$city=$_POST['city'];
$state=$_POST['state'];
$descripion=$_POST['description'];
        
$vararray = array("startday"=>$startday,"startmonth"=>$startmonth,"startyear"=>$startyear,"endday"=>$endday,"endmonth"=>$endmonth,"endyear"=>$endyear);


if(in_array("", $vararray)){

 echo "<script> alert('Leave No Empty Fields');</script>";  
     die();  
}
else if (startday > 31 || startmonth > 12 || endday > 31 || endmonth > 12)
{
    echo "<script> alert('Enter Valid Start and End Dates');</script>";  
     die();
}
foreach($vararray as $var){
 
    if(!ctype_digit($var) || strlen($var)<2){
         echo "<script> alert('Enter Valid Start and End Dates');</script>";  
     die();
    }
    
}
if(strlen($startyear) < 4 || strlen($endyear) < 4){
   
         echo "<script> alert('Enter Valid Start and End Dates');</script>";  
     die();
    
}

else{
    
    $vararray["city"] = strtolower($city);
    $vararray["state"] = strtolower($state);
    $vararray["description"]=$description;
    $vararray["username"]=$username;
    $vararray["name"]="$firstname $lastname";
    $vararray["email"]=$email;
    $vararray["occupation"]=strtolower($occupation);

$finalarray = array("startday"=>$startday, "startmonth"=>$startmonth, "startyear"=>$startyear,"endday"=>$endday,"endmonth"=>$endmonth, "endyear"=>$endyear, "city"=> strtolower($city), "state"=>strtolower($state), "description"=>$description, "username"=>$username, "name" =>"$firstname $lastname", "email"=>$email, "occupation"=>$occupation);

    
     $artifex->update(array("_id" => $id), $finalarray);

     
         header("Location: /zfiles/listingconf.php");
         exit(); 
    
}
              

?>