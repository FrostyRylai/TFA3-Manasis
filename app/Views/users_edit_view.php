<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light mb-4 shadow-sm" style="background-color: #E18AAA;">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="/">POS System</a>
            <div class="navbar-nav">
                <a class="nav-link text-white" href="/users">Users</a>
                <a class="nav-link text-white" href="/customers">Customers</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0" style="border-top: 4px solid #E18AAA !important;">
                    <div class="card-body p-4">
                        <h3 class="mb-4" style="color: #883955;">Edit User Account</h3>

                        <!-- Show validation errors if any -->
                        <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach (session('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>

                        <form action="<?= base_url('/users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label class="form-label fw-bold" style="color: #6b2d42;">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold" style="color: #6b2d42;">Full Name</label>
                                <input type="text" name="full_name" class="form-control" value="<?= esc($user['full_name']) ?>" required>
                            </div>

                            <div class="mb-3 text-center">
                                <label class="form-label d-block text-start fw-bold" style="color: #6b2d42;">Current Avatar</label>
                                <img src="<?= !empty($user['avatar']) ? base_url('uploads/' . $user['avatar']) : base_url('uploads/default-avatar.png') ?>" 
                                     alt="Avatar" width="70" height="70" class="rounded-circle shadow-sm mb-2" style="object-fit: cover; border: 2px solid #ffb5c0;">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold" style="color: #6b2d42;">Upload New Avatar (JPG/PNG, Max 2MB)</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn text-white" style="background-color: #E18AAA;">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>