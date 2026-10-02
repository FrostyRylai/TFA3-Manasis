<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header text-white" style="background-color: #E18AAA;">
                <h4 class="mb-0">Add New User</h4>
            </div>
            <div class="card-body p-4">

                <!-- Display Validation Errors if any -->
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <form action="<?= base_url('/users/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #6b2d42;">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #6b2d42;">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="<?= old('full_name') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #6b2d42;">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">Select Role</option>
                            <option value="Administrator" <?= old('role') == 'Administrator' ? 'selected' : '' ?>>Administrator</option>
                            <option value="Manager" <?= old('role') == 'Manager' ? 'selected' : '' ?>>Manager</option>
                            <option value="Staff" <?= old('role') == 'Staff' ? 'selected' : '' ?>>Staff</option>
                            <option value="Accountant" <?= old('role') == 'Accountant' ? 'selected' : '' ?>>Accountant</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #6b2d42;">Avatar Image</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn text-white fw-bold" style="background-color: #E18AAA;">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>