<?php
include './shared/head.php';
include './shared/nav.php';
include './general/all.php';



$select = "SELECT * FROM `theme`";
$s = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($s);
$colorNumber = $row['color'];


if (isset($_GET['darklight'])) {
    $num = $_GET['darklight'];
    $update = " UPDATE `theme` SET `color` = $num ";
    $u = mysqli_query($connect, $update);
    header('location : /hospital/index.php');
}
?>

<div>
    <?php if ($colorNumber == '2') : ?>
        <a href="/hospital/index.php?darklight=1" class="btn btn-dark my-2 my-sm-0" type="submit"> Dark mode </a>
    <?php else : ?>
        <a href="/hospital/index.php?darklight=2" class="btn btn-light  my-2 my-sm-0" type="submit"> Light mode </a>
    <?php endif; ?>

    <h2 class="display-3 text-center my-3 text-primary  "> HOME PAGE </h2>
</div>


<?php include './shared/script.php'; ?>