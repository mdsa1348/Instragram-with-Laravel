<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Create</h1>
    
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> 
    </div>
    @endif

    <form method="post" action="{{route('product.update',['product'=>$product])}}">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name"  value="{{$product->name}}">
        </div>
        <div>
            <label for="qty">QTY</label>
            <input type="text" name="qty" id="qty" placeholder="Quantity" value="{{$product->qty}}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" placeholder="Price" value="{{$product->price}}">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description" value="{{$product->description}}">
        </div>
        <div>
            <input type="submit" value="Update">
            
        </div>
    </form>
</body>
</html>
