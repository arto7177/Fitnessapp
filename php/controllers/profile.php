<?php
    include_once '..Model/profile.php';
    
    $persons=Person::get();
    my_print($persons);