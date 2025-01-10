<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            min-height: 100vh;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .welcome-box {
            background: white;
            padding: 3rem 4rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        p {
            color: #666;
            font-size: 1.2rem;
        }
        .btn {
            padding: 1rem;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-box">
            <h1>Welcome to Laravel CRUD Application</h1>
            <p>Start building something amazing!</p>
            <a href="{{ route('product.index') }}"><button class="btn">View Products</button></a>
        </div>
    </div>
</body>
</html>