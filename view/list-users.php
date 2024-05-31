<?php 
    $page_name = 'Home';
    require_once 'layout/header.php'; 
?>


<div class="container pb-5">
    <h1 class="mb-4"><?= $page_name; ?></h1>
    <table class="table table-light table-striped text-center mb-4">
        <thead class="table-dark">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Birth Date</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($db_users as $user): ?>
                <tr>
                    <th><?= $user->id; ?></th>
                    <th><?= $user->name; ?></th>
                    <th><?= $user->phone; ?></th>
                    <th><?= $user->email; ?></th>
                    <th><?= $user->birth_date; ?></th>
                    <th><?= $user->role; ?></th>
                    <th>
                        <a href="index.php?action=edit&id=<?= $user->id; ?>" class="ps-3 pe-3 rounded-pill btn btn-success btn-sm">EDIT</a>
                        <a href="index.php?action=delete&id=<?= $user->id; ?>" class="ps-3 pe-3 rounded-pill btn btn-danger btn-sm">DELETE</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=add" class="rounded-pill btn btn-primary ps-4 pe-4">Add user</a>
</div>



<?php require_once 'layout/footer.php'; ?>