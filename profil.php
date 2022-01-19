<?php

    require 'crud/db.php';

    var_dump($utilisateur);
    var_dump($utilisateur_id);

?>

<div class="container" style="list-style-type: none !important;">
    <ul class="d-flex flex-row justify-content-center items">
    <a href="index.php?page=mesanimaux"><li class="mx-5"> mes animaux</li></a>
        <li>
            <form action="logout.php">
                <input class="btn btn-danger" type="submit" value="se déconnecter">
            </form>
        </li>
    </ul>
</div>