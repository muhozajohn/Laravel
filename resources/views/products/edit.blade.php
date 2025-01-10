<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            justify-content: center;
            align-items: center;
        }

        form {
            padding: 20px;
            border-radius: 10px;
            width: 600px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .form-control-desc {
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            min-height: 100px;
        }

        .btn {
            padding: 1rem;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="form-container">
    <h1>Create Products</h1>
    
    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;  border-radius: 10px; width: 500px; background-color:lightsteelblue; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); text-align:center; padding:0.5rem">
            <u style="list-style:none;text-decoration:none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('product.update',['product'=>$product]) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name"  value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity"  value="{{$product->quantity}}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control-desc" value="{{$product->description}}" name="description">{{$product->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" value="{{$product->price}}" >
        </div>
        <input type="submit" class="btn btn-primary" value="Edit">
    </form>
</div>  
</body>

</html>
