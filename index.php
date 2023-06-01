<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
     <div class=" row">
        <div class="col-12 text-center">
        <h1>Formation</h1>
        </div>
        <?php $connect ='mysql:dbname=formation;host=localhost';
         $user='root';
         $password='';
         try{
            $pdo=new PDO($connect, $user, $password);}
            catch(PDOException $e){
                            echo 'Connection failed: '. $e->getMessage();
                        }
                        $sql='SELECT * FROM cours';
                        $stmt= $pdo->prepare($sql);
                        $stmt->execute();
                        $cours= $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo '<pre>';
                        print_r($cours);
         ?>

     </div>

    </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>