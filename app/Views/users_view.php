<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light mb-4 shadow-sm" style="background-color: #E18AAA;">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="/">POS System</a>
            <div class="navbar-nav">
                <a class="nav-link text-white" href="/">Home</a>
                <a class="nav-link text-white" href="/about">About</a>
                <a class="nav-link text-white" href="/customers">Customers</a>
                <a class="nav-link active text-white fw-bold" href="/users">Users</a>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0" style="color: #883955;">User & Staff Accounts</h2>
            <a href="<?= base_url('users/create') ?>" class="btn text-white fw-bold shadow-sm" style="background-color: #E18AAA;">+ Add New User</a>
        </div>

        <table class="table table-striped table-bordered shadow-sm bg-white align-middle">
            <thead class="table-light">
                <tr>
                    <th style="background-color: #ffb5c0; color: white; width: 80px;">Avatar</th>
                    <th style="background-color: #ffb5c0; color: white;">Username</th>
                    <th style="background-color: #ffb5c0; color: white;">Full Name</th>
                    <th style="background-color: #ffb5c0; color: white;">Role</th>
                    <th style="background-color: #ffb5c0; color: white; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="text-center">
                            <img src="<?= !empty($user['avatar']) ? base_url('uploads/' . $user['avatar']) : base_url('uploads/default-avatar.png') ?>" 
                                 alt="Avatar" width="45" height="45" class="rounded-circle shadow-sm" style="object-fit: cover; border: 2px solid #ffb5c0;">
                        </td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><span class="badge bg-info text-dark"><?= esc($user['role'] ?? 'Staff') ?></span></td>
                        <td class="text-center">
                            <a href="<?= base_url('/users/edit/' . $user['id']) ?>" class="btn btn-sm" style="background-color: #E18AAA; color: white;">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">No user accounts found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>