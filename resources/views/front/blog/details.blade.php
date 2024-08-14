@extends('front.layouts.app')
@section('content')
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
    @endphp
    @push('links')
        <title>{{$blog->seo_title}}</title>
        <meta property="og:title" content="{{$blog->seo_title}}">
        <meta name="description" content="{{$blog->seo_description}}">
        <meta property="og:description" content="{{$blog->seo_description}}">
        <meta property="og:image" content="{{$blog->image ? env('APP_URL') . '/' .$blog->image->url : ''}}">
        {!! $blog->seo_links !!}
    @endpush
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
                        {{ TranslateService::getTranslation('blogs_page', 'citation', app()->getLocale()) }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="single-post-details">
                    <article class="single-post">
                        <div class="post-header">
                            <div class="post-thumb-con">
                                <img class="effect" src="https://adver.az/az/showImage/ArticleFiles/129?&crop=main&w=748&h=491" alt="" />
                            </div>
                        </div>
                        <h3 class="post-title">
                            {{$blog->title}} </h3>
                        {!! $blog->text !!}
                    </article>
                </div>
                <div class="blog-details-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <ul class="list-inline list-unstyled social-menu text-center pull-left">
                                <li>
                                    <strong>
                                        {{ TranslateService::getTranslation('blogs_page', 'share', app()->getLocale()) }}:
                                    </strong>
                                </li>
                                <li>
                                    <a href="http://www.facebook.com/sharer/sharer.php?u={{ route('client.blog', $blog->slug) }}"><i class="fa fa-facebook main-color effect"></i></a>
                                </li>
                                <li>
                                    <a href="http://www.twitter.com/intent/tweet?url={{ route('client.blog', $blog->slug) }}"><i class="fa fa-twitter main-color effect"></i></a>
                                </li>
                                <li>
                                    <a href="http://plus.google.com/share?url={{ route('client.blog', $blog->slug) }}"><i class="fa fa-google main-color effect"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="side-bar">
                    <div class="widget widget-search mb-30">
                        <form class="search-form" action="{{route('client.blogs')}}">
                            <div class="input-group">
                                <input class="input-field" name="q" required="required" placeholder="{{ TranslateService::getTranslation('blogs_page', 'search_input_placeholder', app()->getLocale()) }} ..." type="text">
                                <button class="input-group-addon main-color-bg"> <i class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                    <div class="widget widget-latestposts">
                        <h3 class="widget-title">
                            {{ TranslateService::getTranslation('blogs_page', 'popular_blogs', app()->getLocale()) }} <span class="main-color-bg"></span>
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
        {!! $blog->seo_scripts !!}
    @endpush
@endsection
