<?php

$requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier
                            FROM users
                            LEFT JOIN jobs
                            ON users.id = jobs.id_user');

                            ?>