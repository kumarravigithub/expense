<?php

require_once '../../bootstrap.php';

use Pop\Db\Record;

if (isset($_POST)) {
    $date = $_POST["date"];

    $price = $_POST["price"];
    $expense = $_POST["expense"];
    $head = $_POST["head"];
    $bystaffid = $_POST["bystaffid"];
    $refundable = isset($_POST["refundable"]) ? "1" : "0";
    $refundableto = $_POST["refundableto"];
    $receivable = isset($_POST["receivable"]) ? "1" : "0";
    $receivableto = $_POST["receivableto"];

    class extendedRecord extends Record {
        
    }

    $extendedrec = new extendedRecord(null, null, "expense");

    $extendedrec->date = $date;
    $extendedrec->expense = $expense;
    $extendedrec->price = $price;
    $extendedrec->head = $head;
    $extendedrec->bystaffid = $bystaffid;
    if ($refundable == "1") {
        $extendedrec->refundable = $refundable;
        $extendedrec->refundableto = $refundableto;
    }
    if ($receivable == "1") {
        $extendedrec->receivable = $receivable;
        $extendedrec->receivableto = $receivableto;
    }
    $extendedrec->save();
} else {
    echo "ERROR";
}