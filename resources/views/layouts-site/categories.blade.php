<ul class="list-unstyled">
    @foreach($children as $child)
        <li>
            <a href="/{{ $child->name }}">{{ $child->name }}</a>
            @if(count($child->children))
                @include('layouts-site.categories',['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
