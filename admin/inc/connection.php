<?php

    //akhane Database ar sathe connect kora hoyese.
    $db = mysqli_connect('localhost', 'root', '', 'blog');

    if( $db){
        //echo 'Congratulation! Database connected successfully.';
    }else{
        echo 'Opps! Database not connected';
    }

?>