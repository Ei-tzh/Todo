<?php
require('config.php');
if($_POST){
    $title=$_POST['title'];
    $desc=$_POST['description'];

    $sql="INSERT INTO todo(`title`,`description`) VALUES (:title,:description)";

    $pdostatement=$db->prepare($sql);
    $result=$pdostatement->execute([
        ':title'=>$title,
        ':description'=>$desc
    ]);
    if($result){
        echo "<script>alert('New todo is added!');window.location.href='index.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New ToDo</h2>
            <form action="add.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Enter Your Description..."></textarea>
                </div>
                <div class="mb-2">
                    <input type="submit" class="btn btn-primary" value="ADD">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
            </form>    
        </div>
    </div>
</body>
</html>