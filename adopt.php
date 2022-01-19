<?php

    require 'crud/db.php';

    $today=date('d-m-Y H:i:s');
    echo $today;
    $id_animaux = $_GET['id_animaux'];

        $sql = 'UPDATE animaux SET date_adoption_animaux=now(), fk_clients='.$utilisateur_id.'
        WHERE id_animaux=:id_animaux';
        $statement = $connection->prepare($sql);
        if ($statement->execute([':id_animaux' => $id_animaux
                                    ]
                                )
            ) 
        {
            header("Location: index.php?page=profil");
            echo 'date inserted successfully !!!';
        }
?>