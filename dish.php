<?php
define('TITLE', 'Menu Item | Franklin Dining');
include('includes/header.php');

function strip_bad_chars($input){
    $output=preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
    return $output;
}

if(isset($_GET['item'])){
    $menuItem = strip_bad_chars($_GET['item']);
    $dish = $menuItems[$menuItem];
    
}

function suggestedTip($price,$tip){
    $totalTip = $price * $tip;
    echo number_format($price, 2);
}

?>

<div id="dish">
    <h3><?php echo $dish['title']; ?><span class="price"><sup>$</sup><?php echo $dish['price']; ?></span></h3>
    <p><?php echo $dish['blurb']; ?></p>
    <p>Suggested bevarage: <?php echo $dish['drink']; ?></p>
    <p><em>Suggested tip: <sup>$</sup><?php echo suggestedTip($dish['price'], 0.20); ?></em></p>
</div>

<a href="menu.php" class="button previous">Back to Menu</a>

<?php include('includes/footer.php'); ?>;