<?php session_start(); ?>

<?php

$username = $_SESSION['username'];

 $m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
    
 $db = $m->jdpersonal;
 $infocollection = $db->log;
$artifex = $db->artifex;

$id = $_GET["id"];


$query = array('username' => $username);

$artquery = array('_id'=>new MongoID($id));

$artdoc = $artifex->findOne($artquery);

   $description=$artdoc['description'];
    $startmonth=$artdoc['startmonth'];
    $startday=$artdoc['startday'];
    $startyear=$artdoc['startyear'];
    $endmonth=$artdoc['endmonth'];
    $endday=$artdoc['endday'];
    $endyear=$artdoc['endyear'];
    $city=$artdoc['city'];
    $state=$artdoc['state'];
   

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



    if($_SERVER["REQUEST_METHOD"] == "POST"){


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
    

$finalarray = array("startday"=>$startday, "startmonth"=>$startmonth, "startyear"=>$startyear,"endday"=>$endday,"endmonth"=>$endmonth, "endyear"=>$endyear, "city"=> strtolower($city), "state"=>strtolower($state), "description"=>$description, "username"=>$username, "name" =>"$firstname $lastname", "email"=>$email, "occupation"=>$occupation);

$a="/zfiles/editlisting.php?id=";    
    
$newurl= "$a$id";

    
     $artifex->update(array("_id" => new MongoId($id)), $finalarray);

     
         //header("Location: /zfiles/listingconf.php");
         //exit(); 
    
}
              
}
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
     <link href="Normalize.css" rel="stylesheet"> 
    
    <style>
    body,html{
    width:100%;
    height:100%;
    }
        
body{
     text-align: center;
   background: url("http://41.media.tumblr.com/ccabc6dfe1dd84fbe267641f3c1e8d23/tumblr_n24xtkiGpK1tqc6t6o1_500.jpg");
    background-size:cover;
    background-attachment:fixed;
    font-family: helvetica, sans-serif;
    }
    
h1{
    position: absolute;
    top:-20px;
    left:0px;
    padding:10px;
    background:black;
    color:white;
    font-size:50px;
    }
h2{

    font-size:50px;
    margin:0px;
    
}

#card{
    position: relative;
    margin:200px auto;
    background:white;
    width: 600px;
    padding: 15px;
    border-radius: 5px;
    border: 2px solid black;
    text-align: left;
    box-shadow:10px 10px black;
}
    
#info{
    position: relative;
    right:0px;
    top:0px;
    
}

.item{
 display: inline-block;
}

input{
 margin:20px;
margin-left:0px;
padding:5px;
}

textarea{
  margin:20px;
margin-left:0px;
padding:5px;
}

</style>
</head>
<body>
    
    <h1>_ARTIFEX_New Listing</h1>
    
    <div id="card">
    
    <div id="info"><div class="item"><h2><?php echo "$firstname $lastname"; ?></h2></div>
    <div class="item" style="margin-left:20px;"><p><b><?php echo "$occupation<br>$email"; ?></b></p></div><br>
<div class="item">
    <form method='post' action="<?php echo $newurl;?>" id="moreinfo">
    Start Date: <input type='text' name='startmonth' size='3' maxlength="2" placeholder="MM" value="<?php echo $startmonth;?>">
        <input type='text' name='startday' size='3' maxlength="2" placeholder="DD" value="<?php echo $startday;?>">
        <input type='text' name='startyear' size='5' maxlength="4" placeholder="YYYY" value="<?php echo $startyear;?>"><br>
        End Date: <input type='text' name='endmonth' size='3' maxlength="2" placeholder="MM" value="<?php echo $endmonth;?>">
        <input type='text' name='endday' size='3' maxlength="2" placeholder="DD" value="<?php echo $endday;?>">
        <input type='text' name='endyear' size='5' maxlength="4" placeholder="YYYY" value="<?php echo $endyear;?>"><br>
        Location: 
        <input type='text' name='city' size='20' placeholder="City" value="<?php echo $city;?>">
        <input type='text' name='state' size='20' placeholder="State" value="<?php echo $state;?>">
  <textarea form="moreinfo" name="paragraph_text" cols="50" rows="10" placeholder='Description' name='description'><?php echo $description;?></textarea><br>   
        
     <input type='submit' value='Edit Listing'>
    </form>
    
  
        
        </div>
        
        </div> 
        
    </div>
    

    
</body>
</html>
