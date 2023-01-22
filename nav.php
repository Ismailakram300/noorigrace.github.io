<div class="menu_bar menu-bar-res">
    <h1 class="logo logo_res">Noori<span>Grace</span></h1>
    <!-- <img src="Logo.png" width="20%" height="0px"  alt="" style="color: aliceblue;"> -->
    <ul class="menubar_ul menu-bar-ul-res">
        <li class="nav-li"><a href="#homes">Home</a></li>
        <li class="nav-li"><a href="#sells">Sells</a></li>
        <li class="nav-li"><a href="#">Products <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                    <li class="active"><a href="#clothes">Clothes</a></li>

                    <li>
                        <a href="#Fragrances">Fragrances <i class="fas fa-caret-right"></i></a>

                        <div class="dropdown-menu-1">
                            <ul>
                                <li><a href="#fragrences">New Feature Items</a></li>
                                <li><a href="#clothes">Upto 70% off</a></li>
                                <li><a href="#clothes">Upto 70% off</a></li>
                                <li><a href="#">Upto 50% off</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-li"><a href="#about">About </a>
        </li>
        <li class="nav-li"><a href="contacts.php">Contact us</a></li>
            <div id="user-btn" style="color:blue  ; "  class="fas fa-user">

            <!-- <p><span></span></p><br></div> -->
            <a href="logout.php" class=" logout-btn">logout</a>
        
    
    </ul>
    <?php
    $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    $cart_rows_number = mysqli_num_rows($select_cart_number);
    ?>
    <a href="cart.php"> <i  class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
</div>

</div>
<script>
            $(document).ready(function() {

                $('ul.menubar_ul> li')
                    .click(function(e) {
                        $('ul.menubar_ul > li')
                            .removeClass('activee');
                        $(this).addClass('activee');
                    });
            });
        </script>