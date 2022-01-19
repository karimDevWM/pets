<?php
require 'db.php';
$message = '';
$insertIsOk='';

if (  isset($_POST['nom_animaux'])&&
      isset($_POST['age_animaux'])&&
      isset($_POST['typeage_animaux'])&&
      isset($_POST['espece_animaux'])&&
      isset($_POST['race_animaux'])&&
      isset($_POST['genre_animaux'])&&
      isset($_POST['description_animaux'])&&
      isset($_POST['image_animaux'])&&
      isset($_POST['enfant_animaux'])&&
      isset($_POST['dateaccuell_animaux'])&&
      isset($_POST['date_adoption_animaux'])&&
      isset($_POST['refuge'])&&
      isset($_POST['client'])
  ) 
{

      $nom_animaux=$_POST['nom_animaux'];
      $age_animaux=$_POST['age_animaux'];
      $typeage_animaux=$_POST['typeage_animaux'];
      $espece_animaux=$_POST['espece_animaux'];
      $race_animaux=$_POST['race_animaux'];
      $genre_animaux=$_POST['genre_animaux'];
      $description_animaux=$_POST['description_animaux'];
      $image_animaux=$_POST['image_animaux'];
      $enfant_animaux=$_POST['enfant_animaux'];
      $dateaccuell_animaux=$_POST['dateaccuell_animaux'];
      $date_adoption_animaux=$_POST['date_adoption_animaux'];
      $refuge=$_POST['refuge'];
      $client=$_POST['client'];

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
      
      if(empty($client)){
        $client=NULL;
      }

      // $client=$_POST['client'];

      $sql = "INSERT INTO animaux(nom_animaux, 
                                  age_animaux,
                                  typeage_animaux,
                                  espece_animaux,
                                  race_animaux,
                                  genre_animaux,
                                  description_animaux,
                                  image_animaux,
                                  enfant_animaux,
                                  dateaccuell_animaux,
                                  date_adoption_animaux,
                                  fk_refuge,
                                  fk_clients
                                ) 
              VALUES(             :nom_animaux, 
                                  :age_animaux,
                                  :typeage_animaux,
                                  :espece_animaux,
                                  :race_animaux,
                                  :genre_animaux,
                                  :description_animaux,
                                  :image_animaux,
                                  :enfant_animaux,
                                  :dateaccuell_animaux,
                                  :date_adoption_animaux,
                                  :refuge,
                                  :client
                                )";
  
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom_animaux'=>$nom_animaux,
      ':age_animaux'=>$age_animaux,
      ':typeage_animaux'=>$typeage_animaux,
      ':espece_animaux'=>$espece_animaux,
      ':race_animaux'=>$race_animaux,
      ':genre_animaux'=>$genre_animaux,
      ':description_animaux'=>$description_animaux,
      ':image_animaux'=>$image_animaux,
      ':enfant_animaux'=>$enfant_animaux,
      ':dateaccuell_animaux'=>$dateaccuell_animaux,
      ':date_adoption_animaux'=>$date_adoption_animaux,
      ':refuge'=>$refuge,
      ':client'=>$client
                          ]
                        )
    ) 
  {
    $message = 'data inserted successfully';
    header('Location:read-animaux.php');
  }
}
 ?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create an animal</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="POST">
        <div class="form-group mt-2">
          <label for="nom_animaux">nom_animaux</label>
          <input type="text" name="nom_animaux" id="nom_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="age_animaux">age_animaux</label>
          <input type="number" name="age_animaux" id="age_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="typeage_animaux">typeage_animaux</label>
          <input type="text" name="typeage_animaux" id="typeage_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="espece_animaux">espece_animaux</label>
          <input type="text" name="espece_animaux" id="espece_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="race_animaux">race_animaux</label>
          <input type="text" name="race_animaux" id="race_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="genre_animaux">genre_animaux</label>
          <input type="text" name="genre_animaux" id="genre_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="nom_animaux">description_animaux</label>
          <input type="text" name="description_animaux" id="description_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="description_animaux">image_animaux</label>
          <input type="text" name="image_animaux" id="image_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="enfant_animaux">enfant_animaux</label>
          <input type="number" name="enfant_animaux" id="enfant_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="dateaccuell_animaux">dateaccuell_animaux</label>
          <input type="date" name="dateaccuell_animaux" id="dateaccuell_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="date_adoption_animaux">date_adoption_animaux</label>
          <input type="date" name="date_adoption_animaux" id="date_adoption_animaux" class="form-control">
        </div>
        <div class="form-group mt-2">
          <label for="fk_refuge">fk_refuge</label>
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
                  $e->getMessage();
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
          <label for="fk_client">fk_client</label>
          <select type="number" class="form-control" name="client" id="client">
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
                            $e->getMessage();
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
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">Create an animal</button>
                </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>