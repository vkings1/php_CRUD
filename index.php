<?php 
require 'config/db.php';

$sql = "SELECT * FROM company";

$statement = $conn->prepare($sql);

$statement->execute();

$people = $statement->fetchAll(PDO::FETCH_OBJ);

?>


<?php require 'config/header.php'; ?>
<?php require 'config/nav.php'; ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>All name and email</h2>
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                        <?php foreach($people as $person): ?>
                    <tr>
                        <td><?= $person->name; ?></td>
                        <td><?= $person->email; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $person->id; ?>" class="btn btn-info">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?php echo $person->id; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

<?php require 'config/footer.php'; ?>