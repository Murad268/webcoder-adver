 @extends('front.layouts.app')
 @section('content')
     @push('links')
         <title>{{$seo->seo_title}}</title>
         <meta property="og:title" content="{{$seo->seo_title}}">
         <meta name="description" content="{{$seo->seo_description}}">
         <meta property="og:description" content="{{$seo->seo_description}}">
         {!! $seo->seo_links !!}
     @endpush
 <section style="background-image: url('{{ env('APP_URL') . '/' . optional(optional(ServiceFacade::getData())->with('images')->first()?->images->where('type', 'about_banner_image')->first())->url ?? '' }}')" class="pages-header text-center">
     <div class="page-table">
         <div class="table-cell">
             <div class="container">
                 <div class="pages-header-content">
                     <h1>
                         <span class="main-color-bg hor-center title-tl">
                         </span>
                         {{ TranslateService::getTranslation('about_page', 'top_title', app()->getLocale()) }}
                     </h1>
                     <p>
                         {{ TranslateService::getTranslation('about_page', 'citation', app()->getLocale()) }} </p>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <section class="section">
     <div class="container">
         <div class="row">
             <div class="col-md-6">
                 <div class="video-intro">
                     <img src="{{$about->about_page_about_image->url}}" alt="">
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="about-me-txt mb-30">
                     <h2 class="text-center">
                         {{ TranslateService::getTranslation('about_page', 'text_title', app()->getLocale()) }} <span class="main-color-bg hor-center"></span>
                     </h2>
                     {!! $about->about_page_about_text !!}
                     <div class="text-center">
                         <a href="{{route('client.works')}}" class="br-button about-btn main-color-bg effect"> <span class="main-color effect">{{ TranslateService::getTranslation('about_page', 'see_works', app()->getLocale()) }}</span> </a>
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
