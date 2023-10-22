<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'article</title>
</head>
<body>
<h1>{{ $item->title }}</h1>
<p>Date de création : {{ $item->created_at->format('Y-m-d H:i:s') }}</p>
<p>État : {{ $item->state }}</p>
<p>Propriétaire : {{ $item->user->name }}</p>
<p>Catégorie : {{ $item->category->name }}</p>
<p>Description : {{ $item->description }}</p>

<!-- Utilisez asset() pour les images -->
{{--<img src="{{ asset('uploads/' . $item->picture) }}" alt="Image de l'article">--}}
</body>
</html>
