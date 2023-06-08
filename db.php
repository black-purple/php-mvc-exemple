<?php
    class DB {
        public static function connect() {
            try {
                $c = new PDO("mysql:host=localhost;dbname=exemple_mvc", "root", "");
                return $c;
            } catch (PDOException $e){
                echo $e;
                return null;
            }
        }
    }