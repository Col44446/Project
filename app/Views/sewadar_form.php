<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($sewadar) ? 'Edit' : 'Add' ?> Sewadar</title>
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
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
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
                            <h4 class="mb-0">
                                <i class="fas fa-<?= isset($sewadar) ? 'edit' : 'plus' ?>"></i>
                                <?= isset($sewadar) ? 'Edit' : 'Add New' ?> Sewadar
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <?php if (isset($validation)): ?>
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors() ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="<?= isset($sewadar) ? base_url('sewadars/edit/' . $sewadar['id']) : base_url('sewadars/add') ?>">
                                <?= csrf_field() ?>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="<?= old('name', isset($sewadar) ? $sewadar['name'] : '') ?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="<?= old('email', isset($sewadar) ? $sewadar['email'] : '') ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone" 
                                               value="<?= old('phone', isset($sewadar) ? $sewadar['phone'] : '') ?>" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="seva_type" class="form-label">Seva Type <span class="text-danger">*</span></label>
                                        <select class="form-select" id="seva_type" name="seva_type" required>
                                            <option value="">Select Seva Type</option>
                                            <option value="General" <?= old('seva_type', isset($sewadar) ? $sewadar['seva_type'] : '') == 'General' ? 'selected' : '' ?>>General Seva</option>
                                            <option value="Kitchen" <?= old('seva_type', isset($sewadar) ? $sewadar['seva_type'] : '') == 'Kitchen' ? 'selected' : '' ?>>Kitchen Seva</option>
                                            <option value="Security" <?= old('seva_type', isset($sewadar) ? $sewadar['seva_type'] : '') == 'Security' ? 'selected' : '' ?>>Security</option>
                                            <option value="Cleaning" <?= old('seva_type', isset($sewadar) ? $sewadar['seva_type'] : '') == 'Cleaning' ? 'selected' : '' ?>>Cleaning</option>
                                            <option value="Administration" <?= old('seva_type', isset($sewadar) ? $sewadar['seva_type'] : '') == 'Administration' ? 'selected' : '' ?>>Administration</option>
                                            <option value="IT" <?= old('seva_type', isset($sewadar) ? $sewadar['seva_type'] : '') == 'IT' ? 'selected' : '' ?>>IT Support</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3"><?= old('address', isset($sewadar) ? $sewadar['address'] : '') ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" 
                                               value="<?= old('city', isset($sewadar) ? $sewadar['city'] : '') ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state" 
                                               value="<?= old('state', isset($sewadar) ? $sewadar['state'] : '') ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="pincode" class="form-label">PIN Code</label>
                                        <input type="text" class="form-control" id="pincode" name="pincode" 
                                               value="<?= old('pincode', isset($sewadar) ? $sewadar['pincode'] : '') ?>">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="active" <?= old('status', isset($sewadar) ? $sewadar['status'] : 'active') == 'active' ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= old('status', isset($sewadar) ? $sewadar['status'] : '') == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                    <a href="<?= base_url('sewadars/manage') ?>" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> <?= isset($sewadar) ? 'Update' : 'Save' ?> Sewadar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
