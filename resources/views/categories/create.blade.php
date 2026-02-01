<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Category</title>
</head>
<body>

<h1>Create Category</h1>



<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name" >
    </div>

    <br>

    <div>
        <label>Slug</label><br>
        <input type="text" name="slug">
    </div>

    <br>

    <div>
        <label>Description</label><br>
        <textarea name="description"></textarea>
    </div>

    <br>

    <button type="submit">Save</button>
</form>

<br>

<a href="{{ route('categories.index') }}">Back</a>

</body>
</html>
