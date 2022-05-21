<?php include '../shared/head.php';
include '../shared/nav.php';
include '../general/all.php';
include '../general/functions.php';

$select = "SELECT * FROM `categories`";
$s = mysqli_query($connect, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `categories` WHERE id = $id";
    $d = mysqli_query($connect, $delete);
    header('location: /hospital/category/list.php');
}
?>

<div>
    <h2 class="display-3 text-center my-3 text-primary "> LIST PAGE </h2>
</div>

<div class="container col-md-7 mx-auto">
    <form method="POST" class="bg-secondary p-5 text-light">
        <form class="form-group">
            <table class=" table table-hover table-secondary">
                <tr>
                    <th> Name </th>
                    <th> ID </th>
                    <th> Action </th>
                </tr>
                <?php foreach ($s as $data) { ?>
                    <tr>
                        <th> <?php echo $data['id'] ?> </th>
                        <th> <?php echo $data['name'] ?> </th>
                        <th>
                            <a class="btn btn-outline-dark" href="/hospital/category/add.php?edit=<?php echo $data['id'] ?>"> edit </a>
                            <a class="btn btn-outline-danger" onclick="return confirm('Do you really want to delete that data !') " href="/hospital/category/list.php?delete=<?php echo $data['id'] ?>"> delete </a>
                        </th>
                    </tr>
                <?php } ?>
            </table>
        </form>

    </form>
</div>

<?php include '../shared/script.php'; ?>