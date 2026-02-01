<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Tâches</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <style>
        /* body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .category {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .completed {
            background-color: #d4edda;
        }

        .btn {
            padding: 8px 15px;
            margin: 5px;
            text-decoration: none;
            border-radius: 3px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        } */
    </style>
</head>

<body>
    <div>

        <h1>Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>
    <div class="index-container">
        @foreach($categories as $category)
            <div class="category">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->slug }}</p>

                <a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Modifier</a>

                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        @endforeach
    </div>

    <!-- <a href="{{ route('categories.create') }}" class="btn btn-primary">Nouvelle category</a> -->

    <!-- @foreach($categories as $category)
        <div class="category">
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->slug }}</p>

            <a href="{{ route('categories.edit', $category) }}" class="btn btn-success">Modifier</a>

            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    @endforeach -->
</body>

</html>