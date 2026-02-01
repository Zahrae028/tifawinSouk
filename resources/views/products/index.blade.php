<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>

    
    <a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>

    @foreach($products as $product)
        <div class="product">
            <h3>{{ $product->name }}</h3>
            <p>Reference: {{ $product->reference }}</p>
            <p>Description: {{ $product->short_description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <p>Stock: {{ $product->stock }}</p>
            <p>Category: {{ $product->category ? $product->category->name : 'None' }}</p>
            
            <a href="{{ route('products.edit', $product) }}" class="btn btn-success">Modifier</a>


            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        <hr>
    @endforeach
</body>
</html>
