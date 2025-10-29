<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewadar Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: none;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 25px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .feature-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        .feature-card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="mb-0"><i class="fas fa-users"></i> Sewadar Management System</h1>
                        <p class="mb-0 mt-2">Manage and track all sewadars efficiently</p>
                    </div>
                    <div class="card-body p-5">
                        <div class="row text-center mb-4">
                            <div class="col-md-4 mb-4">
                                <div class="feature-card">
                                    <i class="fas fa-user-plus feature-icon"></i>
                                    <h4>Add Sewadars</h4>
                                    <p class="text-muted">Easily register new sewadars with complete details</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-card">
                                    <i class="fas fa-list feature-icon"></i>
                                    <h4>View List</h4>
                                    <p class="text-muted">Browse and search through all registered sewadars</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-card">
                                    <i class="fas fa-edit feature-icon"></i>
                                    <h4>Manage Records</h4>
                                    <p class="text-muted">Edit, update, or remove sewadar information</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-5">
                            <a href="<?= base_url('sewadars/manage') ?>" class="btn btn-primary btn-lg">
                                <i class="fas fa-database"></i> Manage Sewadars Database
                            </a>
                        </div>

                        <div class="alert alert-info mt-5" role="alert">
                            <h5 class="alert-heading"><i class="fas fa-info-circle"></i> Quick Guide</h5>
                            <hr>
                            <ul class="mb-0">
                                <li>Click "Manage Sewadars Database" to access the full CRUD interface</li>
                                <li>Use the "Add" button to register new sewadars</li>
                                <li>Click on any record to edit or view details</li>
                                <li>Use the search and filter options to find specific sewadars</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
