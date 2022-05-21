<?php include '../shared/head.php';
include '../shared/nav.php';
include '../general/all.php';
include '../general/functions.php';

$select = "SELECT * FROM `categories`";
$ss = mysqli_query($connect, $select);

if (isset($_POST['submit'])) {
    $docName = $_POST['docName'];
    $docEmail = $_POST['docEmail'];
    $docNumber = $_POST['docNumber'];
    $categoryID = $_POST['categoryID'];
    $insert = "INSERT INTO `doctors` VALUES(NULL,'$docName','$docEmail', '$docNumber', '$categoryID' )";
    $ins = mysqli_query($connect, $insert);
    testmessage($ins, 'insert data');
};

$name = '';
$docEmail = '';
$docNumber = '';
$categoryID = '';
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM `doctors` WHERE id = $id";
    $sel = mysqli_query($connect, $select);
    $row = mysqli_fetch_assoc($sel);
    $name = $row['name'];
    $docEmail = $row['email'];
    $docNumber = $row['phone_number'];
    $categoryID = $row['category_id'];



    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $docEmail = $_POST['docEmail'];
        $docNumber = $_POST['docNumber'];
        $categoryID = $_POST['categoryID'];
        $update = "UPDATE `doctors` SET `name` = '$name', email = $docEmail , phone_number = $docNumber , category_id = $categoryID WHERE id = $id";
        $u = mysqli_query($connect, $update);
        header('location: /hospital/category/list.php');
    }
}

?>

<div>
    

    <?php if($update) : ?>
        <h2 class="display-3 text-center my-3 text-primary "> UPDATE PAGE </h2>
        <?php else : ?>
            <h2 class="display-3 text-center my-3 text-primary "> ADD PAGE </h2>
        <?php endif ; ?>
</div>

<div class="container col-md-7 mx-auto">
    <form method="POST" class="bg-secondary p-5 text-light">
        <div class="form-group">
            <label>Name</label>
            <input type="name" name="docName" value="<?php echo $name ?>" class="form-control shadow" placeholder="Name">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="docEmail" value="<?php echo $docEmail ?>" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
            <small class="form-text text-light font-weight-lighter">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="docNumber" value="<?php echo $docNumber ?>" class="form-control shadow" placeholder="Phone Number">
        </div>
        <div class="form-group">
            <label> CategoryID : <?php echo $categoryID ?> </label>
            <select name="categoryID" class="form-control">
                <?php foreach ($ss as $data) { ?>
                    <option value="<?php echo $data['id']; ?>"> <?php echo $data['name'] ?> </option>
                <?php } ?>
            </select>


        </div>
        <?php if($update) : ?>
        <button name="Update" class="btn btn-outline-dark btn-block w-25 mx-auto">Update</button>
        <?php else : ?>
        <button name="submit" class="btn btn-outline-light btn-block w-25 mx-auto">Submit</button>
        <?php endif ; ?>
    </form>
</div>

<?php include '../shared/script.php'; ?>