<?php
define('TITLE', 'Team | Franklin Dining');
include('includes/header.php');
?>

<div id="team-members" class="cf">
    <h1>Our Team at Franklin's</h1>
    <p>We're small, but mighty. Franklin's Fine Dining has been a family-owned and run business since the dirty thirties, and we're proud of it! When you get these three together, you never know what can happen. But you can count on one thing: <strong>The best food you've ever had. Ever.</strong></p>
    <div style="text-align: center;">
        <img src="assets/img/hr.png" alt="">

    </div>

    <?php
    foreach ($teamMembers as $member) {
    ?>
        <div class="member">
            <img src="img/<?php echo $member['img']; ?>.png" title="<?php echo $member['name']; ?>">
            <h2><?php echo $member['name']; ?></h2>
            <p><?php echo $member['bio']; ?></p>
        </div>
    <?php
    }
    ?>
</div>


<?php
include('includes/footer.php');
?>