<?php
    include 'header.php'
?>
    <h2 class="text-center">Ajouter animal</h2>
    <form class="animalinputform" action="?page=6" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="nom">nom</span>
            <input type="text" name="nom" class="form-control" placeholder="ex : Cody" aria-label="Nom" aria-describedby="nom">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="age">Age</span>
            <input type="number" name="age" class="form-control" placeholder="ex: 6" aria-label="Age" aria-describedby="age">
            <select class="form-select" aria-label="Default select example">
                <option value="anne" selected>annee</option>
                <option value="mois">mois</option>
                <option value="jours">jours</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="race">race</span>
            <input type="text" name="race" class="form-control" placeholder="ex : Cody" aria-label="Nom" aria-describedby="nom">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="nom">image</span>
            <input type="text" name="image" class="form-control" placeholder="url de l'image" aria-label="Nom" aria-describedby="nom">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="age">Texte</span>
            <input type="number" class="form-control" placeholder="description" aria-label="description" aria-describedby="age">
        </div>


        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</body>
</html>