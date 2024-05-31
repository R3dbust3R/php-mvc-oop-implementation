<?php




require_once 'controller/users-controller.php';
$Users_controller = new Users_controller();


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {

        case 'list': $Users_controller->list_users(); break;
        
        case 'add': $Users_controller->add_user(); break;
        
        case 'insert': $Users_controller->insert_user(); break;
        
        case 'delete': $Users_controller->delete_user(); break;
        
        case 'destroy': $Users_controller->destroy_user(); break;
        
        case 'edit': $Users_controller->edit_user(); break;
        
        case 'update': $Users_controller->update_user(); break;
        
        default: $Users_controller->go_home();

    }
} else { $Users_controller->go_home(); }


