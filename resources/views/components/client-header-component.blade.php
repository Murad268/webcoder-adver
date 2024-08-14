<header class="main-nav">
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="{{route('client.home')}}"><img src="{{ env('APP_URL') . '/' . optional(optional(ServiceFacade::getData())->with('images')->first()?->images->where('type', 'logo')->first())->url ?? '' }}" alt="logo"></a>
            </div>
            <a href="#" class="menu-btn"> <span class="bar hor-center effect"></span> <span class="bar hor-center effect"></span> <span class="bar hor-center effect"></span> </a>
        </div>
    </div>
    <div class="navigation page-table">
        <div class="nav-overlay main-color-bg">
        </div>
        <nav class="nav-list table-cell text-center">
            <ul class="">
                @foreach($links as $link)
                    @if($link->code != "work" and $link->code != "blog" and $link->code != "home")
                        <li><a href="{{$link->slug}}">{{$link->title}}</a></li>
                        @endif
                    @if($link->code == 'home')
                            <li><a href="/">{{$link->title}}</a></li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</header>
