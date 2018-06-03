<ul class="list-unstyled">
    @foreach($children as $child)
        <li>
            <a href="{{ url('/') }}/{{ $child->name }}">{{ $child->name }}</a>
            @if(count($child->children))
                <!-- sortNestedCategories is a helper -->
                @include('layouts-site.categories',['children' => sortNestedCategories($child->children)])
            @endif
        </li>
    @endforeach
</ul>
