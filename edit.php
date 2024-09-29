<!doctype html>
<?php
 define("MAX_DESCRIPTION_LENGTH", 294);

error_reporting (E_ALL);

ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";    // Логін MySQL
$password = "root";    // Пароль MySQL
$dbname = "blog";      // Назва бази даних
$port = 3306;          // Порт MySQL (наприклад, 8889 для MAMP)

// Створюємо підключення
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Перевіряємо підключення
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}


?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="./images/fav3.jpg" sizes="180x180">
    <link rel="icon" href="./images/fav2.jpg" sizes="32x32" type="image/jpg">
    <link rel="icon" href="./images/fav1.jpg" sizes="16x16" type="image/jpg">
<meta name="theme-color" content="#7952b3">


    <style>

        .text {
            text-align: justify;
        }

        .image2 {
          float: left;
          margin-right: 20px;
          max-width: 150px;
          max-height: 150px; 
        }


      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">ГЬІГЬІ,



        </h1>
        <p class="lead text-muted">ХАХА</p>

        <p>
          <a href="#" class="btn btn-primary my-2"></a>
          <a href="#" class="btn btn-secondary my-2"></a>
        </p>
      </div>

    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container text">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php

        $postId=0;
      
        if(isset($_POST['postId']))
         $postId=(int)$_POST['postId'];

          if(isset($_POST['text'])&&isset($_POST['postId'])){

           //echo $_POST['text'];
           //echo $_POST['postId'];
            $sql2 =  'UPDATE posts SET text = \''.$_POST['text'].'\' WHERE posts.id = '.$postId.';';
          // echo '<br>'; 
           //echo $sql2;
          $result = $conn->query($sql2);
        }
        

        $sql =  "SELECT posts.*, images.*
                      FROM posts
                     JOIN images ON posts.img_id = images.id
                    WHERE posts.id = $postId;
                ";

        $result = $conn->query($sql);

         // SQL-запит для отримання даних з таблиці `posts`
           $sql =  "SELECT posts.*, images.*
            FROM posts
            JOIN images ON posts.img_id = images.id
            WHERE posts.Id = $postId;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {

                        
                    echo '<div style="overflow: hidden; width:100%;">';
                    echo '<form action="./edit.php" method="post">';
                    echo '<input type="hidden" name="postId" value="'.$row['id'].'">';
          echo '<img class="image2" src="' . $row['path'] . '" alt="Изображение для поста ' . $row["id"] . '" >';

          echo '<div class="form-floating">
                <textarea style="height: 200px;" name="text" sclass="form-control" placeholder="Leave a comment here" id="floatingTextarea">'.$row['text'].'</textarea>
                <label for="floatingTextarea">Comments</label>
                </div>';

                echo '<button>Книпка</button>';
                echo '</form>';

          echo '</div>';

          
                  }
                }
        ?>
        
       
     

       
       
       
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

// Закриваємо підключення
<?php
$conn->close();
?>
      
  </body>
</html>