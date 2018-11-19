<?php

require 'config/db.php';


    $id = $_GET['id'];
        
    $sql = 'SELECT * FROM company WHERE id = :id ';

    $statement = $conn->prepare($sql);

    $statement->execute([':id' => $id]);

    $person = $statement->fetch(PDO::FETCH_OBJ);

    
if (isset($_POST['name']) && isset($_POST['email'])) {
    
    $name =  $_POST['name'];
    $email =  $_POST['email'];

    $sql = 'UPDATE company SET name = :name, email = :email WHERE id = :id';

    $statement = $conn->prepare($sql);

    if($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])){
        header('Location: index.php');
    }
}
?>


<?php require 'config/header.php'; ?>
<?php require 'config/nav.php'; ?>
    <div class="container">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update name and email</h2>
            </div>
            <div class="card-body">
                    <?php if(!empty($message)): ?>
                        <div class="alert alert-success">
                            <?php echo $message ?>
                        </div>
                    <?php endif; ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" value="<?php echo $person->name; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Enter your email" class="form-control" value="<?php echo $person->email; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>

 <?php require 'config/footer.php'; ?>   
