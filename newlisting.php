<?php session_start(); ?>
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
    <?php 

 $username = $_SESSION['username'];

 $m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
    
 $db = $m->jdpersonal;
 $infocollection = $db->log;
$artifex = $db->artifex;



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



?>
    <div id="info"><div class="item"><h2><?php echo "$firstname $lastname"; ?></h2></div>
    <div class="item" style="margin-left:20px;"><p><b><?php echo "$occupation<br>$email"; ?></b></p></div><br>
<div class="item">
    <form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>" id="moreinfo">
    Start Date: <input type='text' name='startmonth' size='3' maxlength="2" placeholder="MM">
        <input type='text' name='startday' size='3' maxlength="2" placeholder="DD">
        <input type='text' name='startyear' size='5' maxlength="4" placeholder="YYYY"><br>
        End Date: <input type='text' name='endmonth' size='3' maxlength="2" placeholder="MM">
        <input type='text' name='endday' size='3' maxlength="2" placeholder="DD">
        <input type='text' name='endyear' size='5' maxlength="4" placeholder="YYYY"><br>
        Location: 
        <input type='text' name='city' size='20' placeholder="City">
        <input type='text' name='state' size='20' placeholder="State">
  <textarea form="moreinfo" name="paragraph_text" cols="50" rows="10" placeholder='Description' name='conf_pass'></textarea><br>       
        
     <input type='submit' value='Register'>
    </form>
    
  
        
        </div>
        
        </div> 
        
    </div>
    
<?php


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
    
    $vararray["city"] = $city;
    $vararray["state"] = $state;
     $artifex->insert($vararray);
    
    
     
         header("Location: /zfiles/listingconf.php");
         exit(); 
    
}
              
}
?>
    
</body>
</html>
