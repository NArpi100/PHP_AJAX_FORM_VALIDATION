<?php

date_default_timezone_set('Asia/Kolkata');
require_once("Model/MyModel.php");
session_start();

class MyController extends MyModel {

    function __construct() {
        parent::__construct();
        if (isset($_SERVER['PATH_INFO'])) {
            
            switch ($_SERVER['PATH_INFO']) {

                case '/index':
                    include 'Views/index.php';
                    break;

                
                default:
                    include 'Views/index.php';
                break;
            }
        } else {
            ?>
            <script type="text/javascript">
                window.location.href = 'index';
            </script>
            <?php

        }
    }

}

$obj = new MyController;
?>