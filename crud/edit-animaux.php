<?php
require 'db.php';
$id_animaux = $_GET['id_animaux'];
$sql = 'SELECT * FROM animaux WHERE id_animaux=:id_animaux';
$statement = $connection->prepare($sql);
$statement->execute([':id_animaux' => $id_animaux]);
$animaux = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['nom_animaux']) &&
    isset($_POST['age_animaux']) &&
    isset($_POST['typeage_animaux']) &&
    isset($_POST['espece_animaux']) &&
    isset($_POST['race_animaux']) &&
    isset($_POST['genre_animaux']) &&
    isset($_POST['description_animaux']) &&
    isset($_POST['image_animaux']) &&
    isset($_POST['enfant_animaux']) &&
    isset($_POST['dateaccuell_animaux']) &&
    isset($_POST['date_adoption_animaux'])
    ) 
{
  $nom_animaux = $_POST['nom_animaux'];
  $age_animaux = $_POST['age_animaux'];
  $typeage_animaux = $_POST['typeage_animaux'];
  $espece_animaux = $_POST['espece_animaux'];
  $race_animaux = $_POST['race_animaux'];
  $genre_animaux = $_POST['genre_animaux'];
  $description_animaux = $_POST['description_animaux'];
  $image_animaux = $_POST['image_animaux'];
  $enfant_animaux = $_POST['enfant_animaux'];
  $dateaccuell_animaux = $_POST['dateaccuell_animaux'];
  $date_adoption_animaux = $_POST['date_adoption_animaux'];
  $refuge = $_POST['refuge'];
  $clients = $_POST['clients'];

  if(empty($dateaccuell_animaux))
      {
        $dateaccuell_animaux = NULL;
      }

      if(empty($date_adoption_animaux))
      {
        $date_adoption_animaux = NULL;
      }

      // cette ligne permet d'autoriser les valeurs nulles dans le champ fk refuge de la base de données
      if(empty($refuge)){
        $refuge=NULL;
      }

      if(empty($clients)){
        $clients=NULL;
      }
  
  $sql = 'UPDATE animaux SET nom_animaux=:nom_animaux, 
                              age_animaux=:age_animaux,
                              typeage_animaux=:typeage_animaux,
                              espece_animaux=:espece_animaux,
                              race_animaux=:race_animaux,
                              genre_animaux=:genre_animaux,
                              description_animaux=:description_animaux,
                              image_animaux=:image_animaux,
                              enfant_animaux=:enfant_animaux,
                              dateaccuell_animaux=:dateaccuell_animaux,
                              date_adoption_animaux=:date_adoption_animaux,
                              fk_refuge = :refuge,
                              fk_clients = :clients
                        WHERE id_animaux=:id_animaux';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':id_animaux' => $id_animaux,
                          ':nom_animaux' => $nom_animaux,
                          ':age_animaux' => $age_animaux,
                          ':typeage_animaux' => $typeage_animaux,
                          ':espece_animaux' => $espece_animaux, 
                          ':race_animaux' => $race_animaux, 
                          ':genre_animaux' => $genre_animaux, 
                          ':description_animaux' => $description_animaux,
                          ':image_animaux' => $image_animaux,
                          ':enfant_animaux' => $enfant_animaux, 
                          ':dateaccuell_animaux' => $dateaccuell_animaux, 
                          ':date_adoption_animaux' => $date_adoption_animaux,
                          ':refuge' => $refuge,
                          ':clients' => $clients
                          ]
                        )
      ) 
  {
    header("Location: read-animaux.php");
  }
}
 ?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nom_animaux">nom_animaux</label>
          <input type="text" value="<?= $animaux->nom_animaux; ?>" name="nom_animaux" id="nom_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="age_animaux">age_animaux</label>
          <input type="number" value="<?= $animaux->age_animaux; ?>" name="age_animaux" id="age_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="typeage_animaux">typeage_animaux</label>
          <input type="text" value="<?= $animaux->typeage_animaux; ?>" name="typeage_animaux" id="typeage_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="espece_animaux">espece_animaux</label>
          <input type="text" value="<?= $animaux->espece_animaux; ?>" name="espece_animaux" id="espece_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="race_animaux">race_animaux</label>
          <input type="text" value="<?= $animaux->race_animaux; ?>" name="race_animaux" id="race_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="genre_animaux">genre_animaux</label>
          <input type="text" value="<?= $animaux->genre_animaux; ?>" name="genre_animaux" id="genre_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="description_animaux">description_animaux</label>
          <input type="text" value="<?= $animaux->description_animaux; ?>" name="description_animaux" id="description_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="image_animaux">image_animaux</label>
          <input type="text" value="<?= $animaux->image_animaux; ?>" name="image_animaux" id="image_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="enfant_animaux">enfant_animaux</label>
          <input type="number" value="<?= $animaux->enfant_animaux; ?>" name="enfant_animaux" id="enfant_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="dateaccuell_animaux">dateaccuell_animaux</label>
          <input type="date" value="<?= $animaux->dateaccuell_animaux; ?>" name="dateaccuell_animaux" id="dateaccuell_animaux" class="form-control">
        </div>
        <div class="form-group">
          <label for="date_adoption_animaux">date_adoption_animaux</label>
          <input type="date" value="<?= $animaux->date_adoption_animaux; ?>" name="date_adoption_animaux" id="date_adoption_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="fk_refuge">fk_refuge</label><br>
          <label for="">existant key : <?= $animaux->fk_refuge; ?></label>
          <label for="">new key</label>
          <select type="number" class="form-control" name="refuge" id="refuge">
            <option value=""></option>
            <?php
              function refuges()
              {
                $dsn = 'mysql:host=localhost;dbname=pets';
                $username = 'root';
                $password = '';
                $options = [];
                try 
                {
                  $connection = new PDO($dsn, $username, $password, $options);
                } 
                catch(PDOException $e) 
                {

                }
                $refuges = $connection -> prepare("SELECT * FROM refuge");
                $refuges->execute();

                $array=$refuges->setFetchMode(PDO::FETCH_ASSOC);

                while($refuge = $refuges->fetch())
                {
                  extract($refuge);
                            
                  echo "<option value = '$id_refuge'>$id_refuge</option>";
                }
              }
              refuges();
            ?>
          </select>
        </div>
        <div class="form-group mt-2">
          <label for="fk_client">fk_client</label><br>
          <label for="">existant key : <?= $animaux->fk_clients; ?></label>
          <label for="">new key</label>
          <select type="number" class="form-control" name="clients" id="clients">
            <option value=""></option>
            <?php
              function clients()
              {
                          $dsn = 'mysql:host=localhost;dbname=pets';
                          $username = 'root';
                          $password = '';
                          $options = [];
                          try 
                          {
                              $connection = new PDO($dsn, $username, $password, $options);
                          } 
                          catch(PDOException $e) 
                          {

                          }

                          $clients = $connection -> prepare("SELECT * FROM clients");
                          $clients->execute();

                          $array=$clients->setFetchMode(PDO::FETCH_ASSOC);

                          while($client = $clients->fetch())
                          {
                            extract($client);
                            
                            echo "<option value = '$id_clients'>$id_clients</option>";
                          }
                        }
                        clients();
                      ?>
                    </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update animaux</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
