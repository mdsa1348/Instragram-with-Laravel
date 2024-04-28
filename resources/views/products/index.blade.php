<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    
    <br>
    <div style="font-weight: bold;color: rgb(0, 62, 0); background-color: rgb(240, 255, 107)">
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <br><br>
    <div>
        
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>QTY</th>
                <th>PRICE</th>
                <th>DESCRIPTION</th>
                <th>DELETE</th>

            </tr>
            @foreach($products as $product)

                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        <a href="{{route('product.edit',['product'=>$product])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('product.delete',['product'=>$product])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>

                </tr>

            @endforeach
        </table>
        <br>
        <div>
            <a href="{{route('product.create')}}">Add/Create a Product</a>
        </div>

        <br>
                    <br>
                    <a href="{{route('dashboard')}}" class="text-blue-500 hover:text-blue-950" >Dashboard</a>
    </div>
</body>
</html>