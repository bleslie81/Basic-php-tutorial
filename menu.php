<?php
define('TITLE', 'Menu | Franklin Dining');
include('includes/header.php');
?>

<div id="menu-items">
    <h1>Our Delicious Menu</h1>
    <p>Like our team menu is very small...</p>
    <p>Click any menu item!</p>
    <div style="text-align: center;">
        <img src="assets/img/hr.png" alt="">

    </div>
    <ul>
        <?php
        foreach($menuItems as $dish => $item) {
        ?>
            
            <li>
                <a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item['title']; ?></a>&nbsp;&nbsp;<sup>$</sup><?php echo $item['price']; ?>

            </li>

            
        <?php
        }
        ?>

    </ul>

    </div>
    <div style="text-align: center;">
        <img src="assets/img/hr.png" alt="">

    </div>
</div>


<?php
include('includes/footer.php');
?>