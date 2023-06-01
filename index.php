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
                        $formation= $stmt->fetchAll(PDO::FETCH_ASSOC);
                        //echo '<pre>';
                        //print_r($formation);
         ?>

     </div>
<div class="row">
    <?php foreach($formation as $f):?>
        <div class="col-sm-4">
    <div class="card" style="width: 18rem;">
  <img src="uploads/<?=$f['image'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$f['libelle']?></h5>
    <p class="card-text"><?=$f['description']?></p>
    <?php 
    $query= 'SELECT libelle FROM type WHERE idType=:idType';
    $stmt= $pdo->prepare($query);
    $stmt->bindValue(":idType", $f['idType'],PDO::PARAM_INT);
    $stmt->execute();
    $types= $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <span class="badge bg-secondary"><?= $type['libelle'] ?></span>
    
  </div>
</div>
    </div>
    <?php endforeach;?>
</div>
    </div>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>