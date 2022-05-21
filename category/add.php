<?php include '../shared/head.php';
include '../shared/nav.php';
include '../general/all.php';
include '../general/functions.php';


if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $insert = "INSERT INTO `categories` VALUES (NULL, '$name')";
    $i = mysqli_query($connect, $insert);
    testmessage($i, "category");
}

$name = '';
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM `categories` WHERE id = $id";
    $sel = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($sel);
    $name = $row['name'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $update = "UPDATE `categories` SET `name` = '$name' WHERE id = $id";
        $u = mysqli_query($connect, $update);
        header('location: /hospital/category/list.php');
    }
}




?>

<div>
    <?php if ($update) : ?>
        <h2 class="display-3 text-center my-3 text-primary "> ADD PAGE </h2>
    <?php else : ?>
        <h2 class="display-3 text-center my-3 text-primary "> UPDATE PAGE </h2>
    <?php endif; ?>
</div>

<div class="container col-md-7 mx-auto">
    <form method="POST" class="bg-secondary p-5 text-light">
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="name" class="form-control shadow" value="<?php echo $name ?>" name="name" id="exampleInputPassword1" placeholder="Name">
        </div>
        <?php if ($update) : ?>
            <button name="Submit" class="btn btn-outline-light btn-block w-25 mx-auto">Submit</button>
        <?php else : ?>
            <button name="update" class="btn btn-primary btn-block w-25 mx-auto">update</button>
        <?php endif; ?>
    </form>
</div>

<?php include '../shared/script.php'; ?>