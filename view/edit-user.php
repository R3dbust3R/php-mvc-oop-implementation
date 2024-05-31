<?php 
    $page_name = 'Edit User';
    require_once 'layout/header.php'; 


?>


<div class="container">
    <h1 class="mb-4"><?= $page_name; ?></h1>
    <form action="index.php?action=update" method="post">
        <div class="form-group mb-3">
            <input value="<?= $user_data->id; ?>" type="hidden" class="form-control" name="id">
        </div>
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input value="<?= $user_data->name; ?>" required type="text" class="form-control" id="name" name="name" placeholder="User Full Name (Required)">
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone</label>
            <input value="<?= $user_data->phone; ?>" type="text" class="form-control" id="phone" name="phone" placeholder="User Phone Number (Optional)">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input value="<?= $user_data->email; ?>" required type="email" class="form-control" id="email" name="email" placeholder="User Email Address (Optional)">
        </div>
        <div class="form-group mb-3">
            <label for="birth_date">Birth Date (Required)</label>
            <input value="<?= $user_data->birth_date; ?>" required type="date" class="form-control" id="birth_date" name="birth_date">
        </div>
        <div class="form-group mb-3">
            <label for="userrole">User Role</label>
            <select class="form-control" id="userrole" name="userrole">
                <?php foreach ($db_roles as $role): ?>
                    <option <?php echo ($role->role == $user_data->role) ? 'selected' : ''; ?> value="<?= $role->role; ?>"><?= $role->role; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <input type="submit" value="Update User" class="btn btn-success rounded-pill ps-4 pe-4" name="submit">
        </div>
    </form>
</div>



<?php require_once 'layout/footer.php'; ?>