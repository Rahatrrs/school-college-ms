<style>
        /* Custom CSS for the header navigation */
        .header {
            background-color: #333;
            padding: 15px 0;
        }

        .navbar-defau {
            background-color: #333;
            border: none;
        }

        .navbar-defau .navbar-brand {
            color: #fff;
        }

        .navbar-defau .navbar-toggle {
            border: 1px solid #fff;
        }

        .navbar-defau .navbar-toggle .icon-bar {
            background-color: #fff;
        }

        .navbar-defau .navbar-nav > li > a {
            color: #fff;
            
        }

      

        .navbar-defau .navbar-collapse {
            text-align: center;
        }
        .n-item a{
            margin-right: 20px;
            margin-bottom: 15px;
            
        }
        .n-item {
  position: relative;
  overflow: hidden;
}

.n-item::before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background-color: red;
  transition: width 0.5s ease-in-out; /* Adjust the duration and easing as needed */
}

.n-item:hover::before {
  width: 100%;
}


       







        
        
    </style>








<!-- Header -->
<div class="header" id="home" style=" ">
        <nav class="navbar navbar-defau">
            <div class="container">
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                    </button>
                    <h1><a class="navbar-brand" href="index.php">
                        
                        <img src="./new/fav.png" style="height: 70px; margin-top: -18px;" alt="">
                         
                        
                    </a></h1>
                </div>

                <div class="collapse navbar-collapse color-7" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right margin-top "style="margin-top: -5px;">
                        <li class="n-item"><a href="index.php"><span data-hover="Home">Home</span></a></li>
                        <li class="n-item"><a href="about.php"><span data-hover="About">About</span></a></li>
                        <li class="n-item"><a href="contact.php"><span data-hover="Contact">Contact</span></a></li>
                        <li class="n-item"><a href="user/login.php"><span data-hover="Student">Student</span></a></li>
                    </ul>
                    <div class="clearfix"> </div>
                </div><!-- /.navbar-collapse -->

            </div><!-- /.container -->
        </nav>
        <!-- /.navbar -->
        <div class="clearfix"> </div>
    </div>
    <!-- /Header -->