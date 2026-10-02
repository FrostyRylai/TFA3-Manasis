<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
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
                        <h3 class="mb-4" style="color: #883955;">Edit Customer</h3>

                        <?php $validationErrors = session('errors'); ?>
                        <?php if (!empty($validationErrors)): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($validationErrors as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/customers/update/' . $customer['id']) ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label class="form-label fw-bold" style="color: #6b2d42;">Customer Name</label>
                                <!-- Changed input name to full_name and checked both database keys for safety -->
                                <input type="text" name="full_name" class="form-control" value="<?= esc($customer['full_name'] ?? $customer['name'] ?? '') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold" style="color: #6b2d42;">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= esc($customer['email'] ?? '') ?>" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold" style="color: #6b2d42;">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?= esc($customer['phone'] ?? '') ?>" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('/customers') ?>" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn text-white" style="background-color: #E18AAA;">Update Customer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>