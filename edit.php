<?php
require('config.php');
if($_POST){
    $title=$_POST['title'];
    $desc=$_POST['description'];

    $pdostatement=$db->prepare("UPDATE todo SET `title`=:title,`description`=:desc WHERE id=".$_GET['id']);
    $result=$pdostatement->execute([
        ':title'=>$title,
        ':desc'=>$desc
    ]);
    if($result){
        echo "<script>alert('Edited todo is added!');window.location.href='index.php';</script>";
    }
}else{
    $pdostatement=$db->query("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result=$pdostatement->fetchAll();
    // print_r($result[0]['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Edit New ToDo</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $result[0]['id']?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" required value="<?= $result[0]['title']?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Enter Your Description..."><?= $result[0]['description']?></textarea>
                </div>
                <div class="mb-2">
                    <input type="submit" class="btn btn-warning" value="UPDATE">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
            </form>    
        </div>
    </div>
</body>
</html>