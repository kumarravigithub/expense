        <?php
        require_once __DIR__ . '/../../code/xcrud/xcrud.php';
        $d = "";
        if (isset($_GET['d'])) {
            $d = explode("-", $_GET['d']);
            if (count($d) == 3) {
                $year = intval($d[0]);
                $month = intval($d[1]);
                $day = intval($d[2]);
                if (!(checkdate($month, $day, $year))) {
                    $d = "invd";
                } else {
                    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
                    $day = str_pad($day, 2, "0", STR_PAD_LEFT);
                    $d = "$year-$month-$day";
                }
            } else {
                $d = "invd";
            }
        } else {
            exit("ERROR");
        }
        if ($d != "invd") {
            $xcrud = Xcrud::get_instance();
            $xcrud->query("SELECT `expense`, `price`, `head`, `name`, `refundable`, `refundableto`, `receivable`, `receivableto` FROM `view_expense` WHERE date='$d'");
            $xcrud->limit(10);
            echo $xcrud->render();
        } else {
            echo "ERROR";
        }
        ?>
