<ul class="list-unstyled">
    @foreach($children as $child)
        <li>
            <a href="#">{{ $child->name }}</a>
            @if(count($child->children))
                @include('layouts.manageChild',['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
