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

                case '/get_emp_data':
                    
                    try{
                        $all_data = $this->SelectData('employee');
                        echo json_encode($all_data);
                    } catch (\Exception $ex) {
                        throw $ex;
                    }

                    break;


                    case '/get_edit_data':
                    
                    try{
                        $all_data = $this->SelectData('employee',['id'=>$this->htmlValidation($_REQUEST['checkid'])]);

                        echo json_encode($all_data);
                    } catch (\Exception $ex) {
                        throw $ex;
                    }

                    break;



                case '/ins_emp_data':
                    
                    try{

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $ins_data = [
                                'emp_id' => $this->htmlValidation($_POST['emp_id']),
                                'name' => $this->htmlValidation($_POST['name']),
                                'email' => $this->htmlValidation($_POST['email']),
                                'department' => $this->htmlValidation($_POST['department']),
                                'designation' => $this->htmlValidation($_POST['designation']),
                                'joining_date' => $this->htmlValidation($_POST['joining_date']),
                                'gender' => $this->htmlValidation($_POST['gender']),
                            ];

                            $name = $this->htmlValidation($_POST['name']);
                            $email = $this->htmlValidation($_POST['email']);
                            $insert = $this->InsertData('employee', $ins_data, $name , $email);
                            echo json_encode($insert);    
                        } else {
                            $Response = [
                                'Data' => null,
                                'Message' => 'Method must be POST.',
                                'Code' => 0
                            ];
                            echo json_encode($Response);   
                        }
                        

                    } catch (\Exception $ex) {
                        throw $ex;
                    }

                    break;
                case '/upd_emp_data':
                    
                    try{

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $upd_data = [
                                'emp_id' => $this->htmlValidation($_POST['emp_id']),
                                'name' => $this->htmlValidation($_POST['name']),
                                'email' => $this->htmlValidation($_POST['email']),
                                'department' => $this->htmlValidation($_POST['department']),
                                'designation' => $this->htmlValidation($_POST['designation']),
                                'joining_date' => $this->htmlValidation($_POST['joining_date']),
                                'gender' => $this->htmlValidation($_POST['gender']),
                            ];
                            $update = $this->UpdateData('employee', $upd_data, ['id'=>$this->htmlValidation($_POST['id'])]);
                            echo json_encode($update);    
                        } else {
                            $Response = [
                                'Data' => null,
                                'Message' => 'Method must be POST.',
                                'Code' => 0
                            ];
                            echo json_encode($Response);   
                        }
                        

                    } catch (\Exception $ex) {
                        throw $ex;
                    }

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