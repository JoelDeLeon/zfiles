<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    <link href="Normalize.css" rel="stylesheet">
    
    <style>
    body{
     text-align: center;
    background: url("http://41.media.tumblr.com/46bddb846df03765712bd18fe7ca7946/tumblr_nlw29ahO3w1sq7vr5o1_1280.png");
    background-size:cover;
    background-attachment:fixed;
   font-family: helvetica, sans-serif;
    }
        
    
    a:hover{
     text-decoration: underline;
    
    }
    
    .button{
    width:200px;
    background:#7298CE;
    border-radius: 2px;
    padding:10px;
    margin: 20px auto;
        
    }
    
    input{
    padding:20px;
    margin:30px;
    }
        
        
   h1{
     color:white;
    font-size:20px;
    margin:0px;
    }

    form{
     position:relative;
     top:200px;
        
    }
    subbttn{
       border: 1px solid #006;
    background: #9cf; 
    }
    
        h2{

    font-size:50px;
    margin:0px;
    
}

#card{
    position: relative;
    margin:100px auto;
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
    top:10px;
    
}

.item{
 display: inline-block;
margin:5px;
}
p{
 margin:0px;   
}
.dates{
 position:absolute;
top:0px;
right:0px;
padding:5px;
border-right: 2px solid black;
border-bottom: 2px solid black;
border-top-right-radius: 3px;
background:black;
color:white;

}

 #edit{
    position:absolute;
    top:0px;
    left:0px;
    background:black;
     padding:5px;
    border-right: 2px solid black;
border-bottom: 2px solid black;
border-top-left-radius: 3px;
    }
a{
text-decoration:none;
color:white;
}
a:hover #edit{
    color:black;
    text-decoration:none;
    background:yellow;
}
        
#usermenu span{
     margin:0px; 
    }
    
    #usermenu{
     position:absolute;
    right:30px;
    top:12px;
    width:150px;
    background:black;
    margin-right:20px;
    
    }
        
#header{
     background:black;
    text-align: left;
    color:white;
    padding:10px 20px;
    position:fixed;
    top:0px;
    width:100%;
    z-index:5;
    }
        
 #header a{
     text-decoration: none; 
     color:white;
    font-size: 15px;
    
    }

    ul{
     list-style-type: none;
        padding: 0;
        margin: 20px 0px 0px 0px;
    text-align: left;
    }
    li{
     margin:10px;
    padding:5px;
    }
    li:hover{
        background:yellow;
        }
        
    li:hover a{
     color: black;
    text-decoration: none;
    }
    .content {
    display: none;
    
}
     .heading{
     padding: 2px;
    }
    .heading span{
     padding:5px;   
    }
    .heading:hover span{
     background:yellow;  
    color:black;
    }
    
   
    
      
    </style>
    
</head>
<body>

     <div id="header"><h1><a href="index.php">_ARTIFEX_</a>
        </h1>
    
    <div id="usermenu">
        
       <div class="heading"><span>   <?php
        $username = $_SESSION['username'];
        
echo $username; ?>
            </span></div>
        
        <div class="content">
            <ul>
            <li><a href="newlisting.php">New Listing</a></li>
            
 <li><a href="listingquery.php?keyword=<?php echo $username; ?>">My Listings</a></li>                    
                <li><a href="editprofile.php">Edit Profile</a></li>
                
            <li><a href="logout.php">Logout</a></li>
                
            </ul>
        </div>
         </div>
    </div>
    
    
    
    
    
    
    
    
    
<?php

$keyword=str_replace("+", " ",$_GET["keyword"]);
$username = $_SESSION['username'];


$m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
    
 $db = $m->jdpersonal;
 //$infocollection = $db->log;
$artifex = $db->artifex;

$artquery = "";



    
$artquery = "function() {
    return this.city == '$keyword' || this.state == '$keyword' || this.occupation == '$keyword' || this.name == 
    '$keyword' || this.username == 
    '$keyword';
}";
 

$artifexcursor = $artifex->find(array('$where' => $artquery));




foreach ($artifexcursor as $doc) {
    
    $name=$doc["name"];
    $listingid=$doc["_id"];
    $artusername=$doc["username"];
    $occupation=$doc["occupation"];
    $email=$doc["email"];
    $description=$doc["description"];
    $startmonth=$doc['startmonth'];
    $startday=$doc['startday'];
    $startyear=$doc['startyear'];
    $endmonth=$doc['endmonth'];
    $endday=$doc['endday'];
    $endyear=$doc['endyear'];
    $startdate="$startmonth / $startday / $startyear";
$enddate="$endmonth / $endday / $endyear";
   

    echo "
<div id='card' style='text-align:center'>
<div class='dates'><p><b>$startdate : $enddate</p></b></div>
<div id='info'><div class='item'><h2>$name</h2></div><br>


<div class='item' ><p>occupation: <b>$occupation</b> email: <b>$email</b> </b></p></div><br><hr>



<div class='item'><p>$description</p></div>

</div>";

if(strcmp($artusername, $username) == 0){
    echo "<a href='editlisting.php?id=$listingid'><div id='edit'><b>Edit Listing</b></div></a>";
}

echo"</div>";
    

    
    }
?>
    
<script>
        $("#usermenu").click(function () {
    //getting the next element
    $content = $(".content");
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
         $content.is(":visible");
      
    });

});
        
        
</script>
</body>
    
</html>
