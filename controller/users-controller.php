<?php


require_once 'model/users-model.php';


class Users_controller extends Users_model {

    public function list_users() {
        $db_users = parent::get_db_users();
        require_once 'view/list-users.php';
    }

    public function add_user() {
        $db_roles = parent::get_roles();
        $email_existance_error = 0;
        if (isset($_GET['email-exists'])) {
            $email_existance_error = 1;
        }
        require_once 'view/add-user.php';
    }

    public function insert_user() {
        if (isset($_POST) && !empty($_POST)) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $birth_date = $_POST['birth_date'];
            $userrole = $_POST['userrole'];

            if (! parent::check_email_existance($email)) {
                if (parent::model_insert_user($name, $phone, $email, $birth_date, $userrole)) {
                    header('Location: index.php?action=list&user-inserted');
                }
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '&email-exists');
            }

        } else {
            $this->go_home();
        }
    }

    public function delete_user() {
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $user_data = parent::get_user_by_id($user_id);
            require_once 'view/delete-user.php';
        } else {
            $this->go_home();
        }
    }

    public function destroy_user() {
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            if (parent::model_destroy_user($user_id)) {
                header('Location: index.php?action=list&user-deleted');
            }
        } else {
            $this->go_home();
        }
    }

    public function go_home() {
        header('Location: index.php?action=list');
    }

    public function edit_user() {
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $user_data = parent::get_user_by_id($user_id);
            $db_roles = parent::get_roles();
            require_once 'view/edit-user.php';
        } else {
            $this->go_home();
        }
    }

    public function update_user() {
        if (isset($_POST) && !empty($_POST)) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $birth_date = $_POST['birth_date'];
            $userrole = $_POST['userrole'];
    
            $current_email = parent::get_user_email($id);
    
            if ($email !== $current_email && parent::check_email_existance($email)) {
                header('Location: index.php?action=list&email-exists');
            }
    
            if (parent::model_update_user($id, $name, $phone, $email, $birth_date, $userrole)) {
                header('Location: index.php?action=list&user-updated');
            } else {
                header('Location: index.php?action=list&update-failed');
            }
        } else {
            $this->go_home();
        }
    }
    


}