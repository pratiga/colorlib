<?php
    require 'database.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>colorlib</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://www.embedgooglemap.net/">
    <link href="colorlib.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/css/font-awesome.css">
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="content/slick.css"/>
    <link rel="stylesheet" href="https://fonts.google.com/">
  <link rel="stylesheet" type="text/css" href="content/slick-theme.css"/>
    <style type="text/css">
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-inverse abc" data-spy="affix" data-offset-top="197" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">EATWELL</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="nav navbar-nav navbar-right rig">
                        <li><a href="#home" class='active'>HOME</a></li>
                        <li><a href="#about">ABOUT</a></li>
                        <li><a href="#offer">OFFER</a></li>
                        <li><a href="#menu">MENU</a></li>
                        <li><a href="#news">NEWS</a></li>
                        <li><a href="#gallery">GALLERY</a></li>
                        <li><a href="#contact">CONTACT</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</nav> 

       
<div id="home" class="container-fluid" class="section">
    <div class="container-fluid">
        <div class="row">
            <div class=col-md-3 col-xs-0></div>  
            <div class="col-md-6 col-xs-5">
                <div class="welcome">
    		       <h1 ><b>WELCOME TO  EATWELL</b></h1><br><br>
    		       <p>Come and eat well with our delicious & healthy foods.</p><br><br>
    		       <button type="submit" name="reservation">Reservation</button>
                </div>
            </div>
            <div class="col-md-3 col-xs-6"></div>
        </div>
    </div>
</div>


 <div id="about" class=" about container-fluid" class="section">

<?php
    $sql = 'SELECT * FROM about ORDER BY id DESC LIMIT 1';
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()):
    ?>
        <div class="row">
            <div class="col-md-6 text">
                <h3><?php echo $row ["title"]; ?></h3>
                <h1> <?php echo $row ["subtitle"]; ?></h1>
                <?php echo $row ["description"]; ?><br><br>
                <button type="submit" name="learn" >Learn More About Us</button><br><br>
            </div>
            <div class="col-md-6">
                   <?php
                   if(isset($row['image'])) {
                        echo '<img src="uploads/'. $row['image'] .'">';
                   }
                    ?>             
            </div>
        </div>  
    <?php endwhile; ?> 
</div>
 <?php
        }
     else {
    echo "0 results";
    }
?>

<div id="offer" class="container-fluid" class="section">
   <p> O U R &nbsp; O F F E R S</p>
    <h1>Our Offers This Summer</h1>
   <p> Far far away, behind the word mountains, far from the countries <br>
    Vokalia and Consonantia, there live the blind texts<br><br></p>
     <div class="your-class">
        <?php
        $offer = 'SELECT * FROM offer';
        $res = $conn->query($offer);
        if($res->num_rows > 0) {
        $count = 0;
        while($row1 = $res->fetch_assoc()): 
    ?>
        <div class="item <?php echo $count == 0 ? 'active' : ''; ?>">
            <div class="row">
                <img class="offera" src="uploads/<?php echo $row1['image']; ?>" alt=""/>
                <br><br>
                <span><b><?php echo '$'.$row1['price']; ?></b></span>
                <h3><?php echo $row1['title']; ?></h3>
                <p><?php echo $row1['description']; ?></p><br>
                <button type="submit" name="order1">Order Now</button>
            </div>
        </div>
    <?php $count++; ?>
    <?php endwhile; ?>
    <?php } ?>    
    </div>  
</div>

 	

<!-- <div id="offer" class="container-fluid" class="section">
    OUR OFFERS
    <h1><b>Our Offers This Summer</b></h1>
    Far far away, behind the word mountains, far from the countries <br>
    Vokalia and Consonantia, there live the blind texts
    <div id="carousel-example-generic" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

    <div class="carousel-inner"> 
    
    <?php
        $offer = 'SELECT * FROM offer';
        $res = $conn->query($offer);
        if($res->num_rows > 0) {
        $count = 0;
        while($row1 = $res->fetch_assoc()): 
    ?>
        <div class="item <?php echo $count == 0 ? 'active' : ''; ?>">
            <div class="row">

                <div class="col-sm-4 col-xs-12 off"> 
                    <img src="image/<?php echo $row1['image']; ?>" alt=""/>
                        <span><b><?php echo $row1['price']; ?></b></span>
                        <h3><?php echo $row1['title']; ?></h3>
                        <p><?php echo $row1['description']; ?></p><br>
                        <button type="submit" name="order1">Order Now</button>
                 </div>
            </div>
        </div>

    <?php $count++; ?>

    <?php endwhile; ?>

    <?php } ?>     
     
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="icon-prev"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="icon-next"></span> </a>
</div>
</div>
</div>
 
 -->

<div id="menu" class="container-fluid" class="section">
<h1>Delicious Menu</h1>
Far far away, behind the word mountains, far from the countries<br>Vokalia and Consonantia, there live the blind texts.<br><br>
<?php 
    $category  = 'SELECT id,name as nm FROM category';
    $result = $conn->query($category);
    // print_r($result->fetch_assoc());
    //  exit();
    $alldata = array();
    if($result->num_rows>0){
        while ($row = $result->fetch_assoc() ) {
            $id = $row["id"];
            $categorywise_menu = "SELECT * FROM menu where category_id = '$id' ";
            $menu = $conn->query($categorywise_menu);
            $newdata=[];//push
            while ($row2 = $menu->fetch_assoc()){
                $data['id'] = $row2['id'];
                $data['title']  = $row2['title'];
                $data['description'] = $row2['description'];
                $data['price'] = $row2['price'];
                $data['image'] = $row2['image'];
                $newdata[] = (object) $data;
            }
            $alldata[] = (object) array('id'=>$row["id"],'nm'=> $row["nm"], $row["nm"] => $newdata);
        }
    }
?>

<!-- <?php echo json_encode($alldata); ?>-->

<ul class="nav nav-tabs menub"> 
        <?php foreach ($alldata as $count => $data): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $count == 0 ? 'active' : ''; ?>" data-toggle="tab" href="#<?php echo strtolower($data->nm); ?>"><?php echo $data->nm; ?></a>
            </li>
        <?php endforeach; ?>
</ul><br><br>
<div class="tab-content">
    <?php $count_food = 0; ?>
    <?php foreach ($alldata as $key => $value): ?>
        <?php $type = strtolower($value->nm); ?>
        
        <div class="tab-pane container <?php echo $count_food == 0 ? 'active' : 'fade'; ?>" id="<?php echo $type; ?>">
                <div class="row">
                    <?php foreach ($value->$type as $food => $food_type): ?>
                    <div class="col-md-6">
                    <div class="row">
                    <div class="col-md-5 ">
                        <?php echo '<img class="img_food" src="uploads/'. $food_type->image.'">'; ?>
                    </div>
                    <div class="col-md-7 menua">
                        <h3><?php echo $food_type->title; ?></h3>
                        <p><?php echo $food_type->description; ?><p>
                        <span class="spana">Price: <?php echo '$'. $food_type->price; ?></span>
                        <br>
                    </div>
                    </div>
                    </div>  
                    <?php endforeach; ?> 
                </div>
        </div>
        <?php $count_food++; ?>
    <?php endforeach; ?>
</div>
</div>








<div id="news" class="container-fluid" class="section">
<br><br><br><br><br><br>
    <h1>News</h1>
    Far far away, behind the word mountains, far from the countries <br>
    Vokalia and Consonantia, there live the blind texts<br><br><br>
    <div class="item">
        <div class="row">
            <?php
            $sql = 'SELECT * FROM news ORDER BY id DESC limit 3 ';
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
             while($row = $result->fetch_assoc()): 
            ?>
                <div class="col-md-4 col-xs-12 well fried">
                <?php
                if(isset($row['image'])) {
                        echo '<img class="newsa" src="uploads/'. $row['image'] .'">';
                   }?>
                <h2><?php echo $row['title']; ?></h2>
                 <p><?php echo $row['description']; ?></p>
                 <button type="submit" name="newssubmit">Read More</button>
               </div>
            <?php endwhile; ?>
        <?php 
        } else {
             echo "0 results";
        }?>

        </div>
    </div> 
</div>
<br><br><br>



<div id="gallery" class="container-fluid" class="section">
    <h1>Gallery</h1>
    <p>Far far away, behind the word mountains, far from the countries Vokalia 
    <br>and Consonantia, there live the blind texts.</p>
    <div class="row">
        <div class="row">
            <?php
             $sql = 'SELECT * FROM gallery ORDER BY id DESC limit 6 ';
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
             while($row = $result->fetch_assoc()): 
            ?>
                <div class="col-md-4 col-xs-12 well fried">
                <?php
                if(isset($row['image'])) {
                        echo '<img class="gallerya img-responsive" src="uploads/'. $row['image'] .'">';
                   }?>
            </div>
            <?php endwhile; ?>
        <?php 
        } else {
             echo "0 results";
        }?>
        </div>
</div>

    <div id="contact" class="container-fluid" class="section">
        <h1>Get In Touch</h1>
        <p>Far far away, behind the word mountains, far from the countries 
        <br>Vokalia and Consonantia, there live the blind texts.</p>
         <div class="row">
             <?php
                if(isset($_POST['submitreg'])){
                    $name = ($_POST['name']);
                    $message = ($_POST['message']);
                    $email = ($_POST['email']);
                     if(mail($email,$name,$message,"From: $name\n")){
                        echo "Thank you for sending an email";
                     } else{
                        echo "failed";
                     }
                }
             ?>
        <div class="col-sm-7 col=xs-12">
             <form method="POST">
                <input type="text" name="name" placeholder="name" value="<?php echo isset($name)?$name:''?>" class="form-control"><br>
                <input type="email" name="email" placeholder="email" value="<?php echo isset($email)?$email:'' ?>" class="form-control"><br>
                <textarea class="form-control" name="message" rows="10" value="<?php echo isset($message)?$message:'' ?>">Enter Your Message</textarea><br>
                <button type="submit" name="submitreg">Send Message</button><br><br>
            </form>
        </div>

        <div class="col-sm-5 col-xs-12 sid">
            <img src="image/d.jpg" class="img-responsive">
            Address: <br>
            121 Street, Melbourne Victoria <br>
            3000 Australia <br><br>
            Phone: <br>
            90 987 65 44 <br>
            Email:<a href="info@yoursite.com">info@yoursite.com</a>
        </div>
        </div>
    </div>

</div>
</div>
</div>

<div class="map">
    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=butwal%20nepal&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">webdesign agentur</a></div><style>.mapouter{text-align:right;height:400px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}</style></div>
</div>


<div class="footer container-fluid">
<br><br><br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">

            <h3>ABOUT US</h3><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, similique, delectus blanditiis odit expedita amet. Sed labore ipsum vel dolore, quis, culpa et magni autem sequi facere eos tenetur, ex?</p>
        </div>
    <div class="col-md-3">
        <h3>THE RESTURANT</h3><br>
        <a href="#">About Us</a><br><br>
        <a href="#">Chefs</a><br><br>
        <a href="#">Events</a><br><br>
        <a href="#">Contact</a><br><br>
    </div>
    <div class="col-md-2">
        <h3>USEFUL LINKS</h3><br>
            <a href="#">Foods</a><br><br>
        <a href="#">Drinks</a><br><br>
        <a href="#">Breakfast</a><br><br>
        <a href="#">Brunch</a><br><br>
        <a href="#">Dinner</a><br><br>
        </div>
    <div class="col-md-3">
        <h3>USEFUL LINKS</h3><br>
        <a href="#">Foods</a><br><br>
        <a href="#">Drinks</a><br><br>
        <a href="#">Breakfast</a><br><br>
        <a href="#">Brunch</a><br><br>
        <a href="#">Dinner</a><br><br>
    </div>
    </div>
    <div class="row sbox">
            <div class="col-md-4 col-sm-4 col-xs-4 coln1"></div>
            <div class="col-md-4 col-sm-4 col-xs-4 coln2">
                <i id="facebook" class="fa fa-facebook-square" aria-hidden="true"></i>
                <i id="twitter" class="fa fa-twitter-square" aria-hidden="true"></i>
                <i id="gplus" class="fa fa-google-plus-square" aria-hidden="true"></i>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 coln1"></div>
    </div>
    <br><br><br>
    <p>© Copyright ©2018 All rights reserved | This template is made  by Asmita</p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
            $('#mynavbar .nav a').on('click', function(event) {
                $(this).parent().find('a').removeClass('active');
                $(this).addClass('active');
            });

            $(window).on('scroll', function() {
            $('.section').each(function() {
                if($(window).scrollTop() >= $(this).offset().top) {
                     var id = $(this).attr('id');
                     $('#mynavbar .nav a').removeClass('active');
                    $('#mynavbar .nav a[href=#'+ id +']').addClass('active');
                }
            });
        });
    </script>



    <script type="text/javascript" src="content/slick.min.js"></script>
    <script>
         $('.your-class').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    </script>

</body>
</html>