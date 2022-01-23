<?php
    require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        $pdostatement=$db->prepare("SELECT * FROM todo ORDER BY id DESC");
        $pdostatement->execute();
        $result=$pdostatement->fetchAll();
        if(isset($_GET['sms'])):
    ?>
        <div class="alert alert-success">
            <?= $_GET['sms'] ?>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-body">
            <h2>Todo Home Page</h2>
            <a href="add.php" class="btn btn-success mb-2">Create New</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        if($result):
                            foreach($result as $value): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $value['title'] ?></td>
                                    <td><?= substr($value['description'],0,50)  ?></td>
                                    <td><?= date('Y-m-d',strtotime($value['created_at'])) ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $value['id']?>" class="btn btn-primary mb-2">Edit</a>
                                        <a href="delete.php?id=<?= $value['id']?>" class="btn btn-danger mb-2">Delete</a>
                                    </td>
                                </tr>
                        <?php 
                                $i++;
                            endforeach;
                        endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>