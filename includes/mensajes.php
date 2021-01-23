<?php
    if(isset($_SESSION['error'])){
        echo "
            <div class='alert alert-danger text-center transicion'>                               
                ".$_SESSION['error']."
            </div>
        ";
        unset($_SESSION['error']);
    }
    
    if(isset($_SESSION['success'])){
        echo "
            <div class='alert alert-success text-center transicion'>
                ".$_SESSION['success']."
            </div>
        ";
        unset($_SESSION['success']);
    }
?>