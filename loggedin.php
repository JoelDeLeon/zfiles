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
   
    font-family: helvetica, sans-serif;
    }
        
    h1{
     color:white;
    font-size:20px;
    margin:0px;
    }
    
    a{
     text-decoration: none; 
     color:white;
    font-size: 15px;
    
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
    #header{
     background:black;
    text-align: left;
    color:white;
    padding:10px 20px;
    }
        
   
    
    #outbttn{
     position:absolute;
    right:30px;
    top:12px;
    border-radius: 2px;
    }
    
    #searchbar{
      
        color:black;
        padding:90px 20px;
         background: url("http://33.media.tumblr.com/8c74f92db467fd7edeb21f1de45cc61f/tumblr_ngwittyQz41qdejcbo1_500.gif");
    background-attachment: fixed;
    background-size:cover;
    }
    
    #suggestionsholder{
    background:black;
    
    }
        
    #srchbar{
     padding:20px;   
    }
        
    h2{
     font-size:60px;
    color:white;
    }
    
    .suggest{
   position: relative;
    color:black;
    text-align:left; 
    overflow-x:scroll;
    overflow-y: hidden;
    background:white;
    white-space: nowrap;
    }
    .suggest h1{
     position:absolute;
    top:0px;
    left:0px;
    color:black;
    background:white;
    padding:5px;
    margin:5px;
    }
    .suggestion{
    display:inline-block;
     width:350px;
    height:350px;
    text-align: center;
    margin-left: -5px;
    }
    .suggestion h2{
     position:relative;
    top:270px;
    font-size: 20px;
    
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
    <div id="header"><h1>_ARTIFEX_
        </h1>
    
    <div id="usermenu">
        
       <div class="heading"><span>   <?php
        $username = $_SESSION['username'];
        
echo $username; ?>
            </span></div>
        
        <div class="content">
            <ul>
            <li><a href="editprofile.php">Edit Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
                
            </ul>
        </div>
    </div>
        
        
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
        
        
        
        
        
        
    <!--<div id="outbttn"><a href="logout.php">Logout</a></div>-->
    
    </div>
    
    <div id="searchbar">
    
        <h2>Search The <span style="color:yellow">Artifex</span></h2>
        
        <form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type='text' placeholder='Who are you looking for?' name='search' size='30' id='srchbar'><br>
        </form>
    
    
    </div>
    <div id="suggestionsholder">
        
    <div class="suggest">
        <h1>#models</h1>
        <div class="suggestion" style="background:url('http://s19.postimg.org/z72wrjh3n/soo_joo8.jpg');background-size: cover">
            <h2>#soojoopark</h2>
        </div>
        <div class="suggestion" style="background:url('http://www.interviewmagazine.com/files/2013/12/02/img-malaika-firth_103632850635.jpg');background-size: cover">
            <h2>#malaikafirth</h2>
        </div>
        <div class="suggestion" style="background:url('https://s3.amazonaws.com/next-management-production/assets/images/49619/medium_portrait.jpg?1360327188');background-size: cover">
            <h2>#dudleyo</h2>
        </div>
        <div class="suggestion" style="background:url('http://i.mdel.net//rankings/Top50M/i/238578-800w-1.jpg');background-size: cover">
            <h2>#abiahhostvedt</h2>
        </div>
        <div class="suggestion" style="background:url('http://i.mdel.net//rankings/Top50M/i/338658800w.jpg');background-size: cover">
            <h2>#jacksonhale</h2>
        </div>
        <div class="suggestion" style="background:url('http://cdn.thefashionography.com/wp-content/uploads/2013/12/leona-binx-walton.jpg');background-size: cover">
            <h2>#binxwalton</h2>
        </div>
    </div>
    <div class="suggest">
        <h1>#designers</h1>
        <div class="suggestion" style="background:url('http://showstudio.com/img/contributors/1401-1600/1442_480n.jpg?1345480395');background-size: cover">
            <h2>#shayneoliver</h2>
        </div>
        <div class="suggestion" style="background:url('http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG8376828/m/head_1853228a.jpg');background-size: cover">
            <h2>#alexanderwang</h2>
        </div>
        <div class="suggestion" style="background:url('http://www.nonfictionfilm.com/uploads/4/2/1/2/42121865/7330306_orig.jpg');background-size: cover">
            <h2>#rafsimons</h2>
        </div>
        <div class="suggestion" style="background:url('http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG10527783/m/AG-portrait_2779700a.jpg');background-size: cover">
            <h2>#ashish</h2>
        </div>
        <div class="suggestion" style="background:url('https://showstudio.com/img/contributors/601-800/784_480n.jpg?1314118136');background-size: cover">
            <h2>#nasirmazhar</h2>
        </div>
    </div>
        
        
    </div>

    
    </body>
</html>