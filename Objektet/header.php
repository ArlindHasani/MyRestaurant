<?php   
    if(isset($_SESSION['userID'])){
        $loggedStatus = "hidden";
        $profileStatus = " ";
    }else{
        $loggedStatus = " ";
        $profileStatus = "hidden";
    }

    if($_SESSION['accessLevel'] == 'admin'){
        $accessStatus = "";
    }else{
        $accessStatus = "hidden";
    }

    echo '
        <header>
            <nav class="navbar">
                <div class="navbar_left">
                <img src="https://cdn-icons-png.flaticon.com/512/3170/3170733.png">
                <h3 class="caveat_header">My<span>Restaurant</span></h3>
                </div>
                <ul class="navbar_links">
                    <li><a href="../Pages/index.php" class="montserrat_paragraph navbar_link">HOME</a></li>
                    <li><a href="../Pages/menu.php" class="montserrat_paragraph navbar_link">MENU</a></li>
                    <li><a href="../Pages/news.php" class="montserrat_paragraph navbar_link">NEWS</a></li> 
                    <li><a href="../Pages/reserve.php" class="montserrat_paragraph navbar_link">RESERVE</a></li> 
                    <li><a href="../Pages/profile.php" class="montserrat_paragraph navbar_link ' . $profileStatus . '">PROFILE</a></li> 
                    <li><a href="../Admin/dashboard.php" class="montserrat_paragraph navbar_link ' . $accessStatus . '">DASHBOARD</a></li> 
                    <li><a href="../Pages/login.php" class="montserrat_paragraph navbar_link ' . $loggedStatus . '">LOGIN</a></li> 
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </header>
    '
?>
