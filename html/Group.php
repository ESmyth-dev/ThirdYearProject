<!DOCTYPE html>
<html>

<head>
    <title>Groups</title>
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/Group.css">
    <link rel="stylesheet" href="../css/StyleSheet.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<!-- test commit -->

<!-- test commit - branch demo -->

<body>
    <nav>
        <subnav>
            <ul>
                <li>
                    <a>
                        <img src="../images/cat.jpg" class="nav-profile">
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropButton">
                            <img class="noti" src="../images/icons/nav-icons/bell-svgrepo-com.svg" alt="notifications"
                                width="35" />
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>
                </li>
            </ul>
        </subnav>
    
        <nav>
    
    
            <section>
                <form id="searchForm" action="">
                    <input id="searchInput" type="search" required>
                    <i class="fa fa-search"></i>
                </form>
    
            </section>
    
            <section>
                <ul class="linksBar">
                    <li>
                        <a href="../html/Home.php">
                            <img src="../images/icons/nav-icons/home-svgrepo-com.svg" alt="home" width="35" />
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <img src="../images/icons/nav-icons/magnifer-svgrepo-com.svg">
                        </a>
                    </li>
                    <li>
                        <a>
                            <img src="../images/icons/nav-icons/add-square-svgrepo-com.svg">
                        </a>
                    </li>
                    <li>
                        <a href="../html/Group.php">
                            <img src="../images/icons/nav-icons/users-group-two-rounded-svgrepo-com.svg" alt="groups"
                                width="35" />
                            <span>Groups</span>
                        </a>
                    </li>
                    <li>
                        <a href="../html/Messages.php">
                            <img src="../images/icons/nav-icons/chat-round-line-svgrepo-com.svg" alt="messages"
                                width="35" />
                            <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="dropButton">
                                <img src="../images/icons/nav-icons/bell-svgrepo-com.svg" alt="notifications" width="35" />
                            </button>
                            <div class="dropdown-content">
                                <a href="#">Link 1</a>
                                <a href="#">Link 2</a>
                                <a href="#">Link 3</a>
                            </div>
                        </div>
                        <span>Notifications</span>
                    </li>
    
                    <a href="../html/Profile.php">
                        <img class="nav-profile" src="../images/cat.jpg" />
                    </a>
    
                </ul>
            </section>
        </nav>
       
       


    
    <main>
     <!-- Group tile -->


    <section class="groupSection"> 
        <h1 class="heading">Your Groups</h1>
        <section class="groupDisplay">
            <div> 
                <img src="../images/cat.jpg" class="groupIcon">
                <h1>Group 1</h1>
            </div>
            <div> 
                <img src="../images/cat.jpg" class="groupIcon">
                <h1>Group 1</h1>
            </div>
            <div> 
                <img src="../images/cat.jpg" class="groupIcon">
                <h1>Group 1</h1>
            </div>
            <div> 
                <img src="../images/cat.jpg" class="groupIcon">
                <h1>Group 1</h1>
            </div>


            <a href="../html/createGroup.php" style="text-decoration: none;">
            <div class="group" class ="groupIcon">
                <img src="../images/icons/group/plus-svgrepo-com.svg">
                <h1>Create New Group</h1>
            </div>
            </a>

    </section>
    </section>





    <section class="friendBox"> 
        <h1 class="heading">Friends List</h1>
        <section class="friendList">
            <friend>
                <img src="../images/cat.jpg" class="friendIcon">
                <h1 style=" display: inline;">Name</h1>
            </friend>
            <friend>
                <img src="../images/cat.jpg" class="friendIcon">
                <h1 style=" display: inline;">Name</h1>
            </friend>   
            <friend>
                <img src="../images/cat.jpg" class="friendIcon">
                <h1 style=" display: inline;">Name</h1>
            </friend>
            <a href ="../html/friends.php"> <h1 class="viewMore" >View All</h1></a>
        </section>
    </section>



     </main>



</body>


</php>