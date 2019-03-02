<?php require_once('admin/script/config.php');
if(isset($_GET['id'])){
    $tbl = 'tbl_movies';
    $col = 'movies_id';
    $id = $_GET['id'];
    $results = getSingle($tbl, $col, $id);
}else{
    echo 'Missing movie id';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Movie Details</title>
</head>
<body>
    <?php include('templates/header.php');?>

    <section class="movies">
    <?php  while($row = $results->fetch(PDO::FETCH_ASSOC)): ?>

    <div class="movieBox">
        <h2 class="title">Movie Title:<?php echo $row['movies_title']; ?> </h2>
        <p><?php echo $row['movies_runtime']; ?></p>
        <p><?php echo $row['movies_year']; ?></p>
        <p><?php echo $row['movies_release']; ?></p>
        <img src="images/<?php echo $row['movies_cover']; ?>" alt="">
    </div>

    <?php endwhile ?>
    </section>

    <footer>
        <p>this is a footer copyright - 2019</p>
    </footer>
</body>
</html>