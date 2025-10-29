<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sewadars - Grocery CRUD</title>
    
    <?php foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?= $file ?>" />
    <?php endforeach; ?>
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            padding: 20px;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .header h1 {
            margin: 0;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 10px;
            color: white;
            text-decoration: none;
            opacity: 0.9;
        }
        
        .back-link:hover {
            opacity: 1;
        }
        
        .content {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Manage Sewadars</h1>
        <a href="<?= base_url('sewadar') ?>" class="back-link">← Back to Home</a>
    </div>
    
    <div class="content">
        <?= $output ?>
    </div>
    
    <?php foreach($js_files as $file): ?>
        <script src="<?= $file ?>"></script>
    <?php endforeach; ?>
</body>
</html>
