<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Tâches</title>
    
</head>
<body>
    <h1>Mes Tâches</h1>

    <!-- <a href="{{ route('products.create') }}" class="btn btn-primary">Nouvelle Tâche</a> -->

    @foreach($products as $product)
        <div class="product {{ $product->completed ? 'completed' : '' }}">
            <h3>{{ $product->title }}</h3>
            <p>{{ $product->description }}</p>
            <p>Statut: {{ $product->completed ? 'Terminée' : 'En cours' }}</p>

            <a href="{{ route('products.edit', $product) }}" class="btn btn-success">Modifier</a>

            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    @endforeach
</body>
</html>