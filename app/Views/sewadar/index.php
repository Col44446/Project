<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewadar Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2.5rem;
        }
        
        p {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-right: 15px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .features {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .feature {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            text-align: center;
        }
        
        .feature h3 {
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .feature p {
            font-size: 0.9rem;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sewadar Management System</h1>
        <p>Manage sewadar records with CodeIgniter 4 and Grocery CRUD</p>
        
        <div>
            <a href="<?= base_url('sewadar/manage') ?>" class="btn">Manage Sewadars (Grocery CRUD)</a>
            <a href="<?= base_url() ?>frontend/build/index.html" class="btn btn-secondary">React Frontend</a>
        </div>
        
        <div class="features">
            <div class="feature">
                <h3>✨ Grocery CRUD</h3>
                <p>Full CRUD operations with beautiful UI</p>
            </div>
            <div class="feature">
                <h3>🚀 CodeIgniter 4</h3>
                <p>Modern MVC framework</p>
            </div>
            <div class="feature">
                <h3>⚛️ React Frontend</h3>
                <p>Modern responsive interface</p>
            </div>
            <div class="feature">
                <h3>🔌 RESTful API</h3>
                <p>Clean API endpoints</p>
            </div>
        </div>
    </div>
</body>
</html>
