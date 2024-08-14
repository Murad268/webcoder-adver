@extends('front.layouts.app')
@section('content')
    @push('links')
        <title>{{$seo->seo_title}}</title>
        <meta property="og:title" content="{{$seo->seo_title}}">
        <meta name="description" content="{{$seo->seo_description}}">
        <meta property="og:description" content="{{$seo->seo_description}}">
        {!! $seo->seo_links !!}
    @endpush
    @php
        // Define Azerbaijani month names
        $months = [
            'January' => 'Yanvar',
            'February' => 'Fevral',
            'March' => 'Mart',
            'April' => 'Aprel',
            'May' => 'May',
            'June' => 'İyun',
            'July' => 'İyul',
            'August' => 'Avqust',
            'September' => 'Sentyabr',
            'October' => 'Oktyabr',
            'November' => 'Noyabr',
            'December' => 'Dekabr',
        ];

        // Get the month name in Azerbaijani

    @endphp
<section style="background-image: url('{{ env('APP_URL') . '/' . optional(optional(ServiceFacade::getData())->with('images')->first()?->images->where('type', 'blog_banner_image')->first())->url ?? '' }}')" class="pages-header text-center">
    <div class="page-table">
        <div class="table-cell">
            <div class="container">
                <div class="pages-header-content">
                    <h1>
                        <span class="main-color-bg hor-center title-tl"></span>
                        {{ TranslateService::getTranslation('blogs_page', 'top_title', app()->getLocale()) }}
                    </h1>
                    <p>
                        {{ TranslateService::getTranslation('blogs_page', 'citation', app()->getLocale()) }} </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="post-groups">
                    <div id="blogs-list" class="list-view">
                        <div class="items">
                            @if($blogs->count() < 1)
                                <span class="empty">{{ TranslateService::getTranslation('site', 'result_not_found', app()->getLocale()) }}</span>
                            @endif
                            @foreach($blogs as $blog)
                                <div class="single-blog-standard mb-30">
                                    <div class="post-thumb-con">
                                        <img class="effect" src="{{$blog->image->url ?? ""}}" alt="">
                                    </div>
                                    <div class="single-blog-standard-meta">
                                        <a href="{{route('client.blog', $blog->slug)}}">
                                            <h3 class="effect">{{$blog->title}}</h3>
                                        </a>
                                        <p class="single-blog-standard-content"></p>
                                    </div>
                                    <div class="single-blog-standard-footer">
                                        <ul class="single-blog-standard-list">
                                            @php
                                                $month = $months[$blog->created_at->format('F')];
                                            @endphp

                                            <li>
                                                <i class="fa fa-calendar main-color"></i>
                                                {{ $blog->created_at->format('d') }} {{ $month }} {{ $blog->created_at->format('Y H:i') }}
                                            </li>

                                        </ul>
                                        <a href="{{route('client.blog', $blog->slug)}}" class="br-button main-color-bg effect rm-btn"> <span class="main-color effect">{{ TranslateService::getTranslation('blogs_page', 'more', app()->getLocale()) }}</span> </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        @if($blogs->count() > 0)
                            <div class="blog-pagination text-center mb-30">
                                {{ $blogs->appends(['q' => $q])->links('pagination::bootstrap-4') }}
                            </div>


                            <div class="keys" style="display:none" title="/az/bloq"><span>100102</span><span>100101</span><span>100100</span></div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="side-bar">
                    <div class="widget widget-search mb-30">
                        <form class="search-form" >
                            <div class="input-group">
                                <input class="input-field" name="q" value="{{$q}}" required="required" placeholder="{{ TranslateService::getTranslation('blogs_page', 'search_input_placeholder', app()->getLocale()) }} ..." type="text">
                                <button class="input-group-addon main-color-bg"> <i class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                    <div class="widget widget-latestposts">
                        <h3 class="widget-title">
                            {{ TranslateService::getTranslation('blogs_page', 'popular_blogs', app()->getLocale()) }}<span class="main-color-bg"></span>
                        </h3>
                        <ul class="recent-posts">
                            @foreach($popular_blogs as $blog)
                                <li class="main-color">
                                    <div class="post-sm-thmb">
                                        <img src="{{$blog->image->url ?? ""}}">
                                    </div>
                                    <div class="post-thumb-det">
                                        <a href="{{route('client.blog', $blog->slug)}}" class="effect">{{mb_substr($blog->title, 0, 30).'...'}} </a>
                                        <span>
                                               @php
                                                   $month = $months[$blog->created_at->format('F')];
                                               @endphp
                                        <time datetime="{{ $blog->created_at->format('d') }} {{ $month }} {{ $blog->created_at->format('Y H:i') }}">
                                            {{ $blog->created_at->format('d') }} {{ $month }} {{ $blog->created_at->format('Y H:i') }} </time>
                                    </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @push('scripts')
        {!! $seo->seo_scripts !!}
    @endpush
@endsection
