<?php
    require '../db.php';
    session_start();
    if ($_SESSION['logged_in'] != 1){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else{
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $email = $_SESSION['email'];

        $state = $conn->prepare("SELECT user_id FROM users WHERE email = '$email'");
        $state->execute();
        $result = $state->fetchAll(PDO::FETCH_ASSOC);

        $user_id = $result[0]['user_id'];

        $st = $conn->prepare("SELECT * FROM rented WHERE user_id = '$user_id'");
        $st->execute();
        // $rents = $st->fetchAll(PDO::FETCH_ASSOC);

        $rents = array();
        foreach ($st->fetchAll() as $key => $value) {
            array_push($rents, $value['info_id']);
        }
        if(in_array($id, $rents)){
        $stmt = $conn->prepare("SELECT title FROM info WHERE id = $id");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $video = '../video/'.str_replace('.', '', str_replace(':','', strtolower(str_replace(' ', '_', $results[0]['title'])))).'.mp4';
        ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin-ext" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <script src="../js/main.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>MovieRental</title>
    <style>
    #myVideo,.content{position:fixed;bottom:0}*{box-sizing:border-box}body{margin:0;font-family:Arial;font-size:17px}#myVideo{right:0;min-width:100%;min-height:100%}.content{background:rgba(0,0,0,.5);color:#f1f1f1;width:100%;padding:20px}#myBtn{width:200px;font-size:18px;padding:10px;border:none;background:#000;color:#fff;cursor:pointer}#myBtn:hover{background:#ddd;color:#000}
</style>

</head>
<body>

    <video autoplay id="myVideo" controls>
        <source src="<?= $video ?>" type="video/mp4">
    </video>


</body>
</html>
<?php } else{
            header('location: rented.php');
        }
} ?>
