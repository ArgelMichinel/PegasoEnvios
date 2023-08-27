<?php

$colum = array( 
                        `id_ship` => $data[$i][0][0],
                        `date_in` => new DateTime($data[$i][0][1][0]),
                        `status` => $data[$i][0][2],
                        `sender_id` => $data[$i][0][3],
                        `street_name` => $data[$i][1][0],
                        `street_number` => $data[$i][1][1],
                        `comment` => $data[$i][1][2],
                        `zip_code` => $data[$i][1][3],
                        `city` => $data[$i][1][4],
                        `state` => $data[$i][1][5],
                        `country` => $pais,
                        `receiver_name` => $data[$i][2][0],
                        `receiver_phone` => $data[$i][2][1],
                        `description` => $data[$i][3][0],
                        `date_first_visit` => new DateTime($data[$i][4][0]),
                        `date_delivered` => new DateTime($data[$i][4][1]),
                        `date_not_delivered` => new DateTime($data[$i][4][2]),
                        `status_logistica` => 0
            );