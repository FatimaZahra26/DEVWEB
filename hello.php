<?php

		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "users";
		$conn = mysqli_connect($host, $username, $password, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM users WHERE email = '$email' AND pass_word= '$password'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result)>0) {
				
                echo"<script language=\"javascript\">";
                echo"alert('welcome')";
                echo"</script>";
                $user = null;
                while ($row = mysqli_fetch_assoc($result)) {
                    $user =  $row["id"];
                }
                header("location:php/Calendar.php?user=".$user);
			} else {
                echo"<script language=\"javascript\">";
                echo"alert('incorrect email or password!!')";
                echo"</script>";
			}
		}
    
		if (isset($_POST['register'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
			
         if($password==$cpassword){
                $sql = "INSERT INTO users (email, pass_word) VALUES ('$email', '$password')";
			  $result = mysqli_query($conn, $sql);
			if ($result) {
                echo"<script language=\"javascript\">";
            echo"alert('Registration successful!')";
            echo"</script>";
          

			} else {
                echo"<script language=\"javascript\">";
				echo "alert('<div class='error'>Error: ')" . mysqli_error($conn) . "</div>";
			}
		}else{
            echo"<script language=\"javascript\">";
            echo"alert('error password does not match!')";
            echo"</script>";
        }
    }
    if (isset($_POST['post_comment'])) {

		$name = $_POST['name'];
		$message = $_POST['message'];
        $email= $_POST['email'];
        $number= $_POST['number'];
		
		$sql = "INSERT INTO comment (name, message,email,phone)
		VALUES ('$name', '$message','$email','$number')";

		if ($conn->query($sql) === TRUE) {
		  echo "";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
		mysqli_close($conn);
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="css/hello.css">
</head>

<body>
   
    <header class="header">

        <a href="#" class="logo">We<span>ORGNISE</span></a>

        <nav class="navbar">
           
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#blogs">steps</a>
            <a href="#contact">contact</a>

        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="info-btn" class="fas fa-info-circle" ></div>
            <div id="search-btn" class="fas fa-search" style="display: none;" ></div>
            <div id="login-btn" class="fas fa-user"></div>
        </div>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <form action="" class="login-form" method="post">
        <div class="container">
                <input type="checkbox" id="check">
                <div class="login form">
                    <header>Login</header>
                    <form action="login" method="post">
                        <input type="text" name="email" placeholder="Enter your email">
                        <input type="password" name="password" placeholder="Enter your password">
                        
                        <button class="button" name="login">Login</button>
                    </form>
                
                    <div class="signup">
                        <span class="signup">Don't have an account?
                 <label for="check">Signup</label>
                 
                </span>
                    </div>
                    <p>Please go to register form</p>
                </div>
                <div class="registration form">
                    <header>Signup</header>
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Enter your email">
                        <input type="password" name="password" placeholder="Create a password">
                        <input type="password" name="cpassword" placeholder="Confirm your password">
                        <button class="button" name="register">signup</button>
                    </form>
                    <div class="signup">
                        <span class="signup">Already have an account?
                 <label for="check">Login</label>
                </span>
                    </div>
                </div>
            </div>

        </form>

    </header>
    <div class="contact-info">

        <div id="close-contact-info" class="fas fa-times"></div>

        <div class="info">
            <i class="fas fa-phone"></i>
            <h3>phone number</h3>
            <p>+212-624-622484</p>
            <p>+212-616-699324</p>
        </div>

        <div class="info">
            <i class="fas fa-envelope"></i>
            <h3>email address</h3>
            <p>hananelfahssi02@gmail.com</p>
            <p>hajajfatimazahra26@gmail.com</p>
        </div>



        <div class="share">
            <a href="#" class="fab fa-facebook-f" onclick="auth1()"></a>

            <a href="#" class="fab fa-github" onclick="auth2()"></a>
            <a href="#" class="fab fa-linkedin" onclick="auth3()"></a>
        </div>

    </div>
    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <section class="swiper-slide slide" style="background: url(images/15.jpg) no-repeat;opacity:4;">
                    <div class="content">
                        <h3>we provide best time organization</h3>
                        <p>Our intuitive to-do list app helps you manage all of your tasks to meet project deadlines. Try our to-do list tool to help you to stay organized and have visibility over your tasks. Get Real-Time Updates. Track Workflows. Visualize
                            Progress
                        </p>
                        
                    </div>
                </section>

                <section class="swiper-slide slide" style="background: url(images/12.jpg) no-repeat;">
                    <div class="content">
                        <h3>making dream come to life</h3>
                        <p>we are here to give the best offers to you where ever you are and in every time you need us we will be in your accessibility</p>
                        
                    </div>
                </section>

                <section class="swiper-slide slide" style="background: url(images/13.jpg) no-repeat;">
                    <div class="content">
                        <h3>from concept to creation</h3>
                        <p>just leave it to us and don't panic</p>
                        
                    </div>
                </section>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>
    <section class="about" id="about">

        <h1 class="heading"> about us </h1>

        <div class="row">

            <div class="video">
                <video src="images/8.mp4" loop muted autoplay></video>
            </div>

            <div class="content">
                <h3>We will provide you the best work</h3>
                <p>Our application provides the easiest way to manage your time and to get the results in very quick time</p>
              
            </div>

        </div>


    </section>

    <section class="blogs" id="blogs">

        <h1 class="heading"> our steps </h1>

        <div class="swiper blogs-slider">

            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/22.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>setting clear-specific goals </h3>
                        <p>Everyone needs goals.Make sure yours are SMART ones.They should be specific,measurable,achievable,relevant and time-based</p>
                        
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/step1.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Fill the form</h3>
                        <p>you need to fill the title, description ,start time of a task and its end time all the fields are required to save your tasks.You have also the cancel button if you won't save it  </p>
                        
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/step2.png" alt="">
                    </div>
                    <div class="content">
                        <h3>Informations about tasks</h3>
                        <p> After creating a task, it will be added in your calendar and just a click on it you will have a pop up  having all the details about this task like title, description and time</p>
                       
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/step3.png" alt="">
                    </div>
                    <div class="content">
                        <h3>EDIT OR DELETE</h3>
                        <p>In details form of a task you will have 2 buttons wich can help you to delete this task (you just need to click on delete button and accept the verification),or edit it </p>
                       
                    </div>
                </div>

            </div>

        </div>

    </section>
    <section class="contact" id="contact">

        <h1 class="heading"> contact us </h1>

        <div class="row">

            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104985.9870358089!2d-1.9775189702474845!3d34.68469163004763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7864984106d6ef%3A0x1d86b33244c4650!2sOujda!5e0!3m2!1sfr!2sma!4v1680005138796!5m2!1sfr!2sma"
                title="google satellite map of Oujda ">Oujda google map</a>" allowfullscreen=" " loading="lazy "></iframe>

            <form action=" " method="post" >
                <h3>get in touch</h3>
                <input type="text" name="name" placeholder="name" class="box ">
                <input type="email" name="email" placeholder="email" class="box ">
                <input type="number"name="number" placeholder="phone" class="box ">
                <textarea name="message" placeholder="message" class="box" cols="30 " rows="10 "></textarea>
                <input type="submit" name="post_comment" value="send message" class="btn ">
            </form>

        </div>

    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js "></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js "></script>


    <script src="js/hello.js"></script>

    <script>
        lightGallery(document.querySelector('.projects .box-container'));
    </script>
</body>

</html>