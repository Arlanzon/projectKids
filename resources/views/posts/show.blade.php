<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    
    <p><strong>Autor:</strong> {{ $post->user->name }}</p>
    <p><strong>Categoría:</strong> {{ $post->category->name }}</p>
    
    <div>
        <h2>Contenido</h2>
        <p>{{ $post->text }}</p>
    </div>
    
    <div>
        <h3>Etiquetas</h3>
        <ul>
            @foreach($post->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
    
    <div>
        <h3>Comentarios ({{ $post->comments->count() }})</h3>
        @foreach($post->comments as $comment)
            <div>
                <strong>{{ $comment->user->name }}:</strong>
                <p>{{ $comment->text }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>