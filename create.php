<?php
require 'config/db.php';

$message = '';

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name =  $_POST['name'];
    $email =  $_POST['email'];

    $sql = 'INSERT INTO company (name, email) VALUES (:name, :email)';

    $statement = $conn->prepare($sql);

    if($statement->execute(['name' => $name, 'email' => $email])){
        $message = 'Data inserted successfully';
        header('Location: index.php');
    }
}



?>



<?php require 'config/header.php'; ?>
<?php require 'config/nav.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create person</h2>
            </div>
            <div class="card-body">
                    <?php if(!empty($message)): ?>
                        <div class="alert alert-success">
                            <?php echo $message ?>
                        </div>
                    <?php endif; ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Enter your email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary" >
                    </div>
                </form>
            </div>
        </div>
    </div>

 <?php require 'config/footer.php'; ?>   
