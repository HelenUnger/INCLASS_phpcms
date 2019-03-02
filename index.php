<?php require_once('admin/script/config.php');
if(isset($_GET['filter'])){
    $tbl = 'tbl_movies';
    $tbl_2 = 'tbl_genre';
    $tbl_3 = 'tbl_mov_genre';
    $col = 'movies_id';
    $col_2 = 'genre_id';
    $col_3 = 'genre_name';
    $filter = $_GET['filter'];
    $results = filterResults($tbl, $tbl_2, $tbl_3, $col, $col_2, $col_3, $filter);
}else{
    $results = getAll('tbl_movies');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>movie reviews</title>
</head>
<body>
    
    <?php include('templates/header.php');?>

    <section class="movies">
    <?php  
    
    while($row = $results->fetch(PDO::FETCH_ASSOC)): ?>

    <div class="movieBox">
        <h2 class="title"><?php echo $row['movies_title']; ?> </h2>
        <p><?php echo $row['movies_runtime']; ?></p>
        <p><?php echo $row['movies_year']; ?></p>
        <p><?php echo $row['movies_release']; ?></p>
        <a href="details.php?id=<?php echo $row['movies_id']; ?>"><img src="images/<?php echo $row['movies_cover']; ?>" alt=""></a>
    </div>

    <?php endwhile ?>
    </section>

    <?php include('templates/footer.php'); ?>

</body>
</html>