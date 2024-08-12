@extends('front.layouts.app')
@section('content')
<script src="recaptcha/api.js" async="" defer=""></script>
<section id="home" style="background-image: url('{{ env('APP_URL') . '/' . optional(optional(ServiceFacade::getData())->with('images')->first()?->images->where('type', 'banner_image')->first())->url ?? '' }}')" class="page-table home-1">
    <div class="table-cell">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="intro-title">
                        {{ TranslateService::getTranslation('home_page', 'hero_title', app()->getLocale()) }}
                    </h1>
                    <ul class="intro-social">
                        <li class="main-color-bg">
                            <a class="text-center effect" target="_blank" href="{{ServiceFacade::getData()->facebook_link}}"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="main-color-bg">
                            <a class="text-center effect" target="_blank" href="{{ServiceFacade::getData()->linkedin_link}}"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                    <a href="{{route('client.about')}}" class="button home-btn main-color-bg effect scroll-btn">{{ TranslateService::getTranslation('home_page', 'hero_title_about_button', app()->getLocale()) }}</a>
                    <a href="#contact" class="br-button home-btn main-color-bg effect"> <span class="main-color effect">{{ TranslateService::getTranslation('home_page', 'hero_title_contact_button', app()->getLocale()) }}</span> </a>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-box text-center">
                    <h2>
                        {{ TranslateService::getTranslation('home_page', 'about_section_title', app()->getLocale()) }} <span class="main-color-bg hor-center"></span>
                    </h2>
                    <p>{{ TranslateService::getTranslation('home_page', 'about_section_citation', app()->getLocale()) }} </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="video-intro">
                    <img src="{{$about->home_page_about_image->url}}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="text-center personal-title">
                    {{ TranslateService::getTranslation('home_page', 'about_section_subtitle', app()->getLocale()) }} </h3>
                <div class="personal-info text-center">
                    {!! $about->home_page_about_text !!} <div>
                        <a href="{{route('client.about')}}" class="button about-btn main-color-bg effect"> {{ TranslateService::getTranslation('home_page', 'about_section_more_button', app()->getLocale()) }}</a>
                        <a href="#contact" class="br-button about-btn main-color-bg effect scroll-btn"><span class="main-color effect"> {{ TranslateService::getTranslation('home_page', 'about_section_contact_button', app()->getLocale()) }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section" id="work">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-box text-center">
                    <h2>
                        {{ TranslateService::getTranslation('home_page', 'works_section_title', app()->getLocale()) }} <span class="main-color-bg hor-center">
                        </span>
                    </h2>
                    <p>{{ TranslateService::getTranslation('home_page', 'works_section_citation', app()->getLocale()) }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($works as $work)
                <div class="col-xs-12 col-sm-6 col-md-4 work-item effect">
                    <div class="single-work mb-30">
                        <img class="effect" src="{{asset($work->image->url)}}" alt="" style="width: 360; height: 327px;">
                        <a href="/az/isler-natucare-100104" class="work-overlay effect">
                            <h3>{{$work->title}}</h3>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <a href="{{route('client.works')}}" class="br-button section-btn main-color-bg effect"><span class="main-color effect">{{ TranslateService::getTranslation('home_page', 'works_section_more', app()->getLocale()) }}</span></a>
    </div>
    <a href="#blog" class="left-link ver-center main-color scroll-btn"><i class="fa fa-long-arrow-left main-color"></i><span class="main-color">Bloq</span></a>
</section>
<section class="section second-bg" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-box text-center">
                    <h2>
                        {{ TranslateService::getTranslation('home_page', 'blogs_section_title', app()->getLocale()) }} <span class="main-color-bg hor-center"></span>
                    </h2>
                    <p>
                    {{ TranslateService::getTranslation('home_page', 'blogs_section_citation', app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-xs-12 col-md-4">
                <div class="single-blog mb-30">
                    <img src="{{$blog->image->url}}" alt="">
                    <div class="blog-meta">
                        <a href="/az/bloq-genislenen-bazar-bu-gun-ve-ya-icmeli-su-medeniyyeti-100102">
                            <h3 class="title effect">{{$blog->title}}</h3>
                        </a>
                        <p class="blog-details">
                        </p>
                        <div class="share-btn main-color effect text-center">
                            <i class="fa fa-share-alt"></i>
                            <a href="http://www.twitter.com/intent/tweet?url=https://adver.az/az/bloq-genislenen-bazar-bu-gun-ve-ya-icmeli-su-medeniyyeti-100102" class="social-btn effect"><i class="fa fa-twitter"></i></a>
                            <a href="http://plus.google.com/share?url=https://adver.az/az/bloq-genislenen-bazar-bu-gun-ve-ya-icmeli-su-medeniyyeti-100102" class="social-btn effect"><i class="fa fa-google-plus"></i></a>
                            <a href="http://www.facebook.com/sharer/sharer.php?u=https://adver.az/az/bloq-genislenen-bazar-bu-gun-ve-ya-icmeli-su-medeniyyeti-100102" class="social-btn effect"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <a href="{{route('client.works')}}" class="br-button section-btn main-color-bg effect"><span class="main-color effect">{{ TranslateService::getTranslation('home_page', 'blogs_section_more', app()->getLocale()) }} </span></a>
    </div>
    <a href="#contact" class="right-link ver-center main-color scroll-btn"><span class="main-color">{{ TranslateService::getTranslation('home_page', 'blogs_section_contact_button', app()->getLocale()) }}</span><i class="fa fa-long-arrow-right main-color"></i></a>
</section>
<section class="section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-box text-center">
                    <h2>
                        {{ TranslateService::getTranslation('home_page', 'contact_section_title', app()->getLocale()) }} <span class="main-color-bg hor-center">
                        </span>
                    </h2>
                    <p>{{ TranslateService::getTranslation('home_page', 'contact_section_subtitle', app()->getLocale()) }}</p>
                </div>
            </div>
        </div>
        <div id="contact" class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <form id="contact-form-new" action="/" method="post">
                    <div class="col-sm-6 col-xs-12">
                        <input class="input-field" placeholder="{{ TranslateService::getTranslation('home_page', 'contact_form_name', app()->getLocale()) }}" name="Contact[name]" id="Contact_name" type="text"> <span class="error text-center mb-30"></span>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <input class="input-field" placeholder="{{ TranslateService::getTranslation('home_page', 'contact_form_email', app()->getLocale()) }}" name="Contact[email]" id="Contact_email" type="email"> <span class="error text-center mb-30"></span>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <textarea class="input-field" placeholder="{{ TranslateService::getTranslation('home_page', 'contact_form_body', app()->getLocale()) }}" name="Contact[body]" id="Contact_body"></textarea> <span class="error text-center mb-30"></span>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <div class="g-recaptcha" data-sitekey="6LcZRLkUAAAAAC5KCdVciKUe4nAydJ1xJudnTszP"></div>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <button type="submit" class="button submit-btn main-color-bg effect" style="margin-top:30px;">
                            {{ TranslateService::getTranslation('home_page', 'contact_form_send', app()->getLocale()) }} <span>
                            </span>
                        </button>
                    </div>

                </form>
                <div id="form-message" class="mb-30 text-center"></div>
            </div>
        </div>
    </div>
    <a href="#home" class="left-link ver-center main-color scroll-btn"><span class="main-color">Ana Səhifə</span><i class="fa fa-long-arrow-right main-color"></i></a>
</section>
@endsection
