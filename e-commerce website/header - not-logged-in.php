<?php

require 'DB conection.php'; 
$sql20 = "SELECT * FROM category";
$statement20 = $pdo->prepare($sql20);
$statement20->execute();
$data200= $statement20->fetchAll();
$pdo = null;
?>

<header>
                    <div id="logo-pic">
                       <a href="index.php"> <img src="images/logo-removebg-preview.png" alt="saiftech" id="logo" style="height: 100px;"> </a>
                    </div>

                    <div id="menu-item-btn">
                        <button id="menubtn">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="30" height="30"
                            viewBox="0 0 172 172"
                            style=" fill:#09BC8A;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#09bc8a"><path d="M86,11.46667c-1.50095,0 -2.84095,0.61145 -3.86328,1.55651l-0.02239,-0.0224l-0.16797,0.14557l-62.9211,51.45443l0.0112,0.0336c-1.11873,1.04651 -1.83646,2.51402 -1.83646,4.16562c0,3.1648 2.56853,5.73333 5.73333,5.73333h5.73333v63.06667c0,6.33533 5.13133,11.46667 11.46667,11.46667h91.73333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-63.06667h5.73333c3.1648,0 5.73333,-2.56853 5.73333,-5.73333c0,-1.6516 -0.71773,-3.11912 -1.83646,-4.16562l0.0112,-0.0336l-21.10808,-17.26719v-24.40026c0,-3.1648 -2.56853,-5.73333 -5.73333,-5.73333h-5.73333c-3.1648,0 -5.73333,2.56853 -5.73333,5.73333v10.33568l-24.61302,-20.12266l-0.16797,-0.14557l-0.02239,0.0224c-1.02233,-0.94507 -2.36233,-1.55651 -3.86328,-1.55651zM68.8,91.73333h34.4v45.86667h-34.4z"></path></g></g></svg>
                        </button>
                    </div>
            
                 <nav class="main-menu active11">
                     <div id="menu-items1">

                                
                                <div id="search-bar">
                                <form action ="search-bar.php" method ='get' id="header-itmes">
                                <input type="searchbox" placeholder="type to search" id="search" size="40" name ="searching"> 
                                </form>
                                
                                </div>

                                <div class="login">
                                    <a href="login-page.php" class="links">
                                        <b>login</b>
                                    </a>
                                </div>


                                <div class="register">
                                    <a href="register.php" class="links">
                                        <b>register</b>
                                    </a>
                                </div>
                            
                                <div id="cart">
                                    <a href="cart.php" class="links">
                                        <b>cart</b>
                                    </a>
                                </div>

                     </div>
                           
                <div id="menu-items2">

                <?php foreach($data200 as $row5) {?>
                    <div class="item-hf">
                        <a href="products page.php?id=<?php echo $row5['c_id'];?>" class="links">
                            <b><?php echo $row5['name'];?></b>
                        </a>
                    </div>
                    <?php } ?>

                </div>
                </nav>

            </header>