<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Edit User</h1>
        <?php if (isset($user) && !empty($user)) { ?>
            <form method="post" action="<?php echo site_url('UserController/update_user'); ?>">
            <?php } else { ?>
                <form method="post" action="<?php echo site_url('UserController/insert_user'); ?>">

                <?php } ?>
                <input type="hidden" name="id" value="<?php echo (isset($user['id']) && !empty($user['id'])) ? $user['id'] : ""; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($user['name']) && !empty($user['name'])) ? $user['name'] : ""; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo (isset($user['email']) && !empty($user['email'])) ? $user['email'] : ""; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
                </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>