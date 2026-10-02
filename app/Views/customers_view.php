<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light mb-4 shadow-sm" style="background-color: #E18AAA;">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="/">POS System</a>
            <div class="navbar-nav">
                <a class="nav-link text-white" href="/">Home</a>
                <a class="nav-link text-white" href="/about">About</a>
                <a class="nav-link text-white active" href="/customers">Customers</a>
                <a class="nav-link text-white" href="/users">Users</a>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Customer Accounts</h2>
            <a href="/customers/new" class="btn text-white shadow-sm" style="background-color: #E18AAA;">+ Add New Customer</a>
        </div>
        <table class="table table-striped table-bordered shadow-sm bg-white">
            <thead class="table-light">
                <tr>
                    <th style="background-color: #ffb5c0; color: white;">Full Name</th>
                    <th style="background-color: #ffb5c0; color: white;">Email</th>
                    <th style="background-color: #ffb5c0; color: white;">Phone</th>
                    <th style="background-color: #ffb5c0; color: white; width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($customers) && is_array($customers)): ?>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                        <td>
                            <a href="/customers/edit/<?= $customer['id'] ?>" class="btn btn-sm text-white" style="background-color: #883955;">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">No customers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>