<?php
    include '../inc/global.php';
    class Person {
        static function Get(){
            return FetchAll("SELECT * FROM PERSON");
        }
    }
Person::Get();
