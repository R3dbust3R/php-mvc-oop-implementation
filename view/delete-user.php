<?php 
    $page_name = 'Delete User';
    require_once 'layout/header.php'; 
    
?>


<div class="container">
    <h1 class="mb-4"><?= $page_name; ?></h1>
    <h3>Are you sure that you wanna delete this user?</h3>
    <table class="table table-light table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $user_data->id; ?></td>
                <td><?= (!empty($user_data->name)) ? $user_data->name : 'No data'; ?></td>
                <td><?= (!empty($user_data->email)) ? $user_data->email : 'No data'; ?></td>
            </tr>
        </tbody>
    </table>
    <a href="index.php?action=destroy&id=<?= $user_id?>" class="ps-4 pe-4 rounded-pill btn btn-danger btn-lg">DELETE USER</a>
    <a href="index.php?action=list" class="ps-4 pe-4 rounded-pill btn btn-warning btn-lg">CANCEL</a>
</div>



<?php require_once 'layout/footer.php'; ?>