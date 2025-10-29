<!DOCTYPE html>
<html>
<head>
    <title>Sewadaar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sewadaar</h1>
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <div class="card mt-4">
            <div class="card-body">
                <form method="post" action="/Project/index.php/add">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                    <button type="submit" class="btn btn-primary mt-2">Add</button>
                </form>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <table class="table">
                    <tr><th>ID</th><th>Name</th><th></th></tr>
                    <?php foreach ($sewadaars as $s): ?>
                    <tr>
                        <td><?= $s['id'] ?></td>
                        <td><?= $s['name'] ?></td>
                        <td><a href="/Project/index.php/delete/<?= $s['id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
