<?php 
$filename="./data/data.json";

const VALIDATE_MESSAGE =" Félicitations, vous êtes bien enregistrée !";
$edit =[
    'action' => FILTER_VALIDATE_BOOLEAN,FILTER_NULL_ON_FAILURE,
    'id' => FILTER_VALIDATE_INT,FILTER_SANITIZE_NUMBER_INT,
];
$_POST = filter_input_array(INPUT_POST, $edit);

$id = $_POST['id'] ?? '';
$action = $_POST['action'] ?? '';

if($id & $action){
    $users= json_decode(file_get_contents($filename, true))?? [];
    $edit= array_search($id, array_column($users, 'id'));
    if($action==='envoi') $users[$edit]['register']=!$users[$edit]['register'];
      
};



    



?>