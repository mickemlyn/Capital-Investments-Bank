
<!DOCTYPE html>
<html>   
<head>
    <title>CAPITAL INVESTMENTS BANK</title>
    
  <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    
  <link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    
  <link href="navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="sidenav/sidenav.css" >
    <link rel="stylesheet" href="hover.css" >
    
  <script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js">
    </script>
    <script src="modernizr.js"></script>
    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    
<style type="text/css">
   

.content{
        height: auto;
        color: white;
        background-color:#083B4C;
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGUlEQVQ4y2NgoBJwoJAedcGoC0ZdMOAuAABF0hABJ/8lyQAAAABJRU5ErkJggg==);
        background-attachment: fixed;
        padding-top: 30px;
    }
    
 .hovv:hover{
     border:5px solid #083B4C; 
    }
 
/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

/* Links inside the dropdown */
.dropdown-content a {
    padding: 12px 12px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover io joke imekausha hadi izi nguo nmefua a ii*/
.dropdown:hover .dropdown-content {
    display: block;
}
 
 </style>
<script>// hover menu over image 
    $(document).ready(function(){
        if (Modernizr.touch) {
        // show the close overlay button
        $(".close-overlay").removeClass("hidden");
        // handle the adding of hover class when clicked
        $(".img").click(function(e){
            if (!$(this).hasClass("hover")) {
                $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
             $(this).closest(".img").removeClass("hover");
                }   });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            }); } 
    });
</script>

 </head>
  
<body>   
  
    
    <div class="content" id="spec">
        <div class="container" style="background-color: rgba(255, 255, 255, 0.3)">
      



            <div class="well"><div class="row text-muted">
                <p class="lead"> Profile Picture</p>
                <div class="col-sm-3">
                    
                 <div id="effect-5" class="effects clearfix">
                    <div class="img">
                        <img src="profile/facebook-default-no-profile-pic.jpg" class="img-rounded">
                        <div class="overlay">
                        <a href="#" title="change profile picture" class="expand"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> </span></a>
                        <a class="close-overlay hidden">x</a>
                        </div>
                    </div> 
                    </div></div>
                <div class="col-sm-3">
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                </div>
                <div class="col-sm-3">
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                </div>
                <div class="col-sm-3">
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                        ooooooh shit goes here<br>
                </div>
            </div>  
            </div>
        </div>
    </div>

</body>
</html>
