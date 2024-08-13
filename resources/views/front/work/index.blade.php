@extends('front.layouts.app')
@section('content')
<section style="background-image: url('{{ env('APP_URL') . '/' . optional(optional(ServiceFacade::getData())->with('images')->first()?->images->where('type', 'works_banner_image')->first())->url ?? '' }}')" class="pages-header text-center">
    <div class="page-table">
        <div class="table-cell">
            <div class="container">
                <div class="pages-header-content">
                    <h1>
                        <span class="main-color-bg hor-center title-tl"></span>
                        {{ TranslateService::getTranslation('works_page', 'top_title', app()->getLocale()) }}
                    </h1>
                    <p>
                        {{ TranslateService::getTranslation('works_page', 'citation', app()->getLocale()) }} </p>
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
                        {{ TranslateService::getTranslation('works_page', 'bottom_title', app()->getLocale()) }}  <span class="main-color-bg hor-center">
                        </span>
                    </h2>
                    <p> {{ TranslateService::getTranslation('works_page', 'bottom_citation', app()->getLocale()) }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($works as $work)
                <div class="col-xs-12 col-sm-6 col-md-4 work-item effect">
                    <div class="single-work mb-30">
                        <img class="effect" src="{{$work->image->url}}" alt="" style="width: 360; height: 327px;" />
                        <a href="{{route('client.work', $work->slug)}}" class="work-overlay effect">
                            <h3>{{$work->card_title}}</h3>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
