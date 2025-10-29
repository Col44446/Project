<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sewadar Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .content-wrapper {
            padding: 30px 0;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border: none;
        }
        .info-row {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #667eea;
        }
        .badge {
            padding: 0.5em 1em;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-users"></i> Sewadar Management System
            </a>
            <div class="ms-auto">
                <a href="<?= base_url('sewadars/manage') ?>" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="fas fa-user"></i> Sewadar Details
                                </h4>
                                <div>
                                    <a href="<?= base_url('sewadars/edit/' . $sewadar['id']) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('sewadars/delete/' . $sewadar['id']) ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure you want to delete this sewadar?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="info-row row">
                                <div class="col-md-4 info-label">ID:</div>
                                <div class="col-md-8"><?= esc($sewadar['id']) ?></div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Full Name:</div>
                                <div class="col-md-8"><strong><?= esc($sewadar['name']) ?></strong></div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Email Address:</div>
                                <div class="col-md-8">
                                    <a href="mailto:<?= esc($sewadar['email']) ?>">
                                        <i class="fas fa-envelope"></i> <?= esc($sewadar['email']) ?>
                                    </a>
                                </div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Phone Number:</div>
                                <div class="col-md-8">
                                    <a href="tel:<?= esc($sewadar['phone']) ?>">
                                        <i class="fas fa-phone"></i> <?= esc($sewadar['phone']) ?>
                                    </a>
                                </div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Address:</div>
                                <div class="col-md-8"><?= esc($sewadar['address']) ?: '<em class="text-muted">Not provided</em>' ?></div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">City:</div>
                                <div class="col-md-8"><?= esc($sewadar['city']) ?: '<em class="text-muted">Not provided</em>' ?></div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">State:</div>
                                <div class="col-md-8"><?= esc($sewadar['state']) ?: '<em class="text-muted">Not provided</em>' ?></div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">PIN Code:</div>
                                <div class="col-md-8"><?= esc($sewadar['pincode']) ?: '<em class="text-muted">Not provided</em>' ?></div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Seva Type:</div>
                                <div class="col-md-8">
                                    <span class="badge bg-primary"><?= esc($sewadar['seva_type']) ?></span>
                                </div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Status:</div>
                                <div class="col-md-8">
                                    <?php if ($sewadar['status'] === 'active'): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Inactive</span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Created At:</div>
                                <div class="col-md-8">
                                    <i class="fas fa-calendar"></i> <?= date('F d, Y h:i A', strtotime($sewadar['created_at'])) ?>
                                </div>
                            </div>

                            <div class="info-row row">
                                <div class="col-md-4 info-label">Last Updated:</div>
                                <div class="col-md-8">
                                    <i class="fas fa-clock"></i> <?= date('F d, Y h:i A', strtotime($sewadar['updated_at'])) ?>
                                </div>
                            </div>

                            <div class="mt-4 text-center">
                                <a href="<?= base_url('sewadars/manage') ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                                <a href="<?= base_url('sewadars/edit/' . $sewadar['id']) ?>" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit Sewadar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
