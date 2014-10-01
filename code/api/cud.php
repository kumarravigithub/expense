<?php

require_once '../../bootstrap.php';

use Pop\Db\Record;

if (isset($_REQUEST['jsondata'])) {
    $jsondata = $_REQUEST['jsondata'];
} else {
    Message::NoInput();
    exit();
}


update($jsondata);
Message::Success();

function update($jsonData) {
    $json = json_decode($jsonData, true);
    $keys = array_keys($json);

    class extendedRecord extends Record {
        
    }

    $json["tbl"] = camelCaseToUnderscore($json["tbl"]);
    $action = $json["action"];
    switch ($action) {
        case "update":
            $extendedrec = extendedRecord::findById($json["id"], null, $json["tbl"]);

            for ($i = 0; $i < count($keys); $i++) {
                if ($keys[$i] === "id" || $keys[$i] === "tbl" || $keys[$i] === "action") {
                    continue;
                }
                $extendedrec->$keys[$i] = $json[$keys[$i]];
            }
            $extendedrec->update();
            break;
        case "insert":
            $extendedrec = new extendedRecord(null, null, $json["tbl"]);
            for ($i = 0; $i < count($keys); $i++) {
                if ($keys[$i] === "id" || $keys[$i] === "tbl" || $keys[$i] === "action") {
                    continue;
                }
                $extendedrec->$keys[$i] = $json[$keys[$i]];
            }
            $extendedrec->save();
            break;
    }
}

function camelCaseToUnderscore($string) {
    $strAry = str_split($string);
    $convert = null;
    $i = 0;
    foreach ($strAry as $chr) {
        if ($i == 0) {
            $convert .= strtolower($chr);
        } else {
            $convert .= (ctype_upper($chr)) ? ('_' . strtolower($chr)) : $chr;
        }
        $i++;
    }
    return $convert;
}
