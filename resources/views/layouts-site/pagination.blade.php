@if($posts->total() > $posts->perPage())

    <nav class="blog-pagination">

        @if($posts->lastPage() === $posts->currentPage())
            <a class="btn btn-outline-primary disabled link-disabled" 
               href="{{ $posts->nextPageUrl() ? : '#' }}" 
               data-toggle="modal" 
            >Older</a>
        @else
            <a class="btn btn-outline-primary" href="{{ $posts->nextPageUrl() }}" >Older</a>
        @endif

        @if($posts->currentPage() === 1)
            <a class="btn btn-outline-primary disabled link-disabled" 
               href="{{ $posts->previousPageUrl() ? : '#' }}" 
               data-toggle="modal" 
            >Newer</a>
        @else
            <a class="btn btn-outline-primary" href="{{ $posts->previousPageUrl() }}">Newer</a>
        @endif

    </nav>

@endif
