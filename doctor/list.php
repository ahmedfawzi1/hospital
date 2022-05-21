<?php include '../shared/head.php';
include '../shared/nav.php';
include '../general/all.php';
include '../general/functions.php';

$select = "SELECT doctors.id AS docID , doctors.name AS docName , doctors.email AS docEmail ,doctors.phone_number AS docNumber, categories.name AS categoryName FROM `doctors` JOIN categories ON doctors.category_id = categories.id";
$s = mysqli_query($connect, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `doctors` WHERE id = $id";
    $d = mysqli_query($connect, $delete);
    header('location: /hospital/doctor/list.php');
}
?>

<div>
    <h2 class="display-3 text-center my-3 text-primary "> LIST PAGE </h2>
</div>

<div class="container col-md-8 mx-auto">
    <div class="card bg-secondary  text-light">
        <div class="card-body">
            <table class=" table table-hover table-secondary">
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Email Adress </th>
                    <th> Phone Number </th>
                    <th> Category ID </th>
                    <th> Action </th>
                </tr>
                <?php foreach ($s as $data) { ?>
                    <tr>
                        <th> <?php echo $data['docID'] ?> </th>
                        <th> <?php echo $data['docName'] ?> </th>
                        <th> <?php echo $data['docEmail'] ?> </th>
                        <th> <?php echo $data['docNumber'] ?> </th>
                        <th> <?php echo $data['categoryName'] ?> </th>
                        <th>
                            <a class="btn btn-outline-dark" href="/hospital/doctor/add.php?edit=<?php echo $data['docID'] ?> "> edit </a>
                        </th>
                        <th>
                            <a class="btn btn-outline-danger" onclick="return confirm('Do you really want to delete that data !') " href="/hospital/doctor/list.php?delete=<?php echo $data['docID'] ?> "> delete </a>
                        </th>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</div>

<?php include '../shared/script.php'; ?>