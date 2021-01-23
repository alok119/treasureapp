<?php

    if (isset($_POST['other_payment'])){
        $other_payment = $_POST['other_payment'];
        include 'Model.php';
        $model = new Model();
        $rows = $model->fetch_Subband($other_payment);
         echo json_encode($rows);
    }
    if (isset($_POST['other_payment_sub'])){
        $other_payment_sub = $_POST['other_payment_sub'];
        include 'Model.php';
        $model = new Model();
        $rows = $model->fetch_Categories($other_payment_sub);
         echo json_encode($rows);
    }
    if (isset($_POST['currentValue'])){
        $currentValue = $_POST['currentValue'];
        include 'Model.php';
        $model = new Model();
        $rows = $model->calculate_Age($currentValue);
         echo json_encode($rows);
    }