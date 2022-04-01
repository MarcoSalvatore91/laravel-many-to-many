@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($post->exists)
<form class="container" action="{{ route('admin.posts.update', $post->id) }}" method="POST">
    @method('PUT')
    @else
    <form class="container" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @endif
        @csrf
        <div class="row">
            <div class="form-group col-8">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" required minlength="5" maxlength="50" value="{{ old('title', $post->title) }}">
                <small class="form-text text-muted">Inserisci un titolo</small>
            </div>
            <div class="form-group col-4">
                <label for="category">Categoria</label>
                <select class="form-control" id="category" name="category_id">
                    <option value="">--</option>
                    @foreach($categories as $category)
                    <option @if (old('category_id', $post->category_id)==$category->id) selected @endif value="{{ $category->id }}">{{ $category->label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p>Tags</p>
        <div class="form-check form-check-inline">
            @foreach($tags as $tag)
            <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', $post_ids ?? []))) checked @endif>
            <label class="form-check-label mr-3" for="$tag-{{ $tag->id }}">{{ $tag->label }}</label>
            @endforeach
        </div>
        <div class="form-group mt-3">
            <label for="image">Immagine</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <small class="form-text text-muted">Inserisci un'immagine</small>
        </div>
        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea class="form-control" id="content" @error('content') is-invalid @enderror name="content" rows="5" required minlength="5">{{ old('content', $post->content) }}</textarea>
            <small class="form-text text-muted">Aggiungi una descrizione</small>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Invia</button>
        </div>
    </form>