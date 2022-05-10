<?php

            $user="root";
            $paswwd="1111";
            $host="localhost";
            $bdd="mabase";
            $dsn = "mysql:host=$host;dbname=$bdd";

            try
            {
                $cnx = new PDO($dsn,$user,$paswwd);
                if($cnx)
                {
                    // echo "connected to $bdd ".'<br>';
                }
            }
            catch(PDOException $e)
            {
                $error = $e->getMessage();
                echo $error;
                exit();
            }
?>