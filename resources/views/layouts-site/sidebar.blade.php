<div class="col-sm-3 offset-sm-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset mb-4">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    
    @if($categories && count($categories) > 0)
    <div class="sidebar-module">
        <h4>Categories</h4>
        <ul class="topnav list-unstyled">

            @foreach($categories as $category)
            <li>
                <a href="/{{ $category->name }}">{{ $category->name }}</a>
                @if(count($category->children))
                    @include('layouts-site.categories',['children' => $category->children])
                @endif
            </li>
            @endforeach

        </ul>
    </div>
    @endif
    
    @if($archives && count($archives) > 0)
    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">

            @foreach($archives as $value)
            <li><a href="/?month={{ $value->month }}&year={{ $value->year }}">{{ $value->month }} {{ $value->year }}</a></li>
            @endforeach

        </ol>
    </div>
    @endif
    
    @if($tags && count($tags) > 0)
    <div class="sidebar-module">
        <h4>Tags</h4>
        <ol class="list-unstyled">

            @foreach($tags as $tag)
            <li><a href="/posts/tags/{{ $tag }}">{{ $tag }}</a></li>
            @endforeach

        </ol>
    </div>
    @endif
    
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li>
                <a href="http://github.com/{{ $github }}" target="_blank">
                    <i class="fa fa-github soc-icons" aria-hidden="true"></i> GitHub
                </a>
            </li>
            <li>
                <a href="http://twitter.com/{{ $twitter }}" target="_blank">
                    <i class="fa fa-twitter soc-icons" aria-hidden="true"></i> Twitter
                </a>
            </li>
            <li>
                <a href="http://facebook.com/{{ $facebook }}" target="_blank">
                    <i class="fa fa-facebook soc-icons" aria-hidden="true"></i> Facebook
                </a>
            </li>
        </ol>
    </div>
    
</div><!-- /.blog-sidebar -->
