<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 2rem;
            background-color: #f5f5f5;
        }

        .display-all-product {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-section {
            margin-bottom: 2rem;
            border-bottom: 2px solid #eee;
            padding-bottom: 1rem;
        }

        .page-title {
            color: #2c3e50;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }

        .page-description {
            color: #666;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .stats-container {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }

        .stat-item {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 6px;
            flex: 1;
        }

        .stat-label {
            color: #666;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 1rem;
        }

        th {
            background-color: #f8f9fa;
            padding: 1rem;
            text-align: center;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
            color: #444;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            align-items:center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-edit {
            background-color: #3498db;
            outline:none;
            border:none;
            cursor: pointer;
            color: white;
        }

        .btn-edit:hover {
            background-color: #2980b9;
        }

        .btn-delete {
            background-color: #e74c3c;
            outline:none;
            border:none;
            cursor: pointer;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
        .btn-add {
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
    <div class="display-all-product">
        <div class="header-section">
            <h1 class="page-title">Product Inventory Management</h1>
            <p class="page-description">View and manage your complete product catalog with real-time inventory tracking</p>
            
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-label">Total Products</div>
                    <div class="stat-value">{{$products->count()}}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Total Value</div>
                    <div class="stat-value">${{number_format($products->sum('price'), 2)}}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Items in Stock</div>
                    <div class="stat-value">{{$products->sum('quantity')}}</div>
                </div>
            </div>
        </div>
        <a href="{{ route('product.create') }}"><button class="btn-add">Add New Product(+) </button></a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <!-- <td>{{$product->id}}</td> -->
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td class="action-buttons">
                        <button class="btn btn-edit">
                            <a href="{{ route('product.edit', ['product'=>$product]) }}" class="btn btn-edit">Edit</a>
                        </button>
                        <form action="{{route('product.destroy',['product'=>$product])}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-delete">delete</button>
                        </form>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>