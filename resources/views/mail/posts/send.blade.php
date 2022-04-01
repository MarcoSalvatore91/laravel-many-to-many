<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
    <style>
        body {
            background-color: dodgerblue;
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <h1>E' stato creato un nuovo post</h1>
    </div>
    <div>
        <p><strong>Titolo: </strong>{{ $post->title }}</p>
    </div>
    <div>
        <p><strong>Contenuto: </strong>{{ $post->content }}</p>
    </div>
    <div>
        <p><strong>Pubblicato il: </strong>{{ $post->created_at }}</p>
    </div>
    <div><strong>Tags: </strong>
        @foreach ($post->tags as $tag)
        <span>{{ $tag->label }}</span>
        @endforeach
    </div>
</body>

</html>