@extends('front.layouts.app')
@section('content')
    @push('links')
        <title>{{$work->seo_title}}</title>
        <meta property="og:title" content="{{$work->seo_title}}">
        <meta name="description" content="{{$work->seo_description}}">
        <meta property="og:description" content="{{$work->seo_description}}">
        <meta property="og:image" content="{{$work->image->url ? ""}}">
        {!! $work->seo_links !!}
    @endpush
<section style="background-image: url('{{ env('APP_URL') . '/' . optional(optional(ServiceFacade::getData())->with('images')->first()?->images->where('type', 'works_banner_image')->first())->url ?? '' }}')" class="pages-header text-center">
    <div class="page-table">
        <div class="table-cell">
            <div class="container">
                <div class="pages-header-content">
                    <h1>
                        <span class="main-color-bg hor-center title-tl"></span>
                        {{ TranslateService::getTranslation('work_page', 'about_work_title', app()->getLocale()) }}
                    </h1>
                    <p>
                        {{$work->seo_description}} </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title-box text-center">
                    <h2>
                        {{$work->title}} <span class="main-color-bg hor-center">
                        </span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="owl-carousel pf-details-slider">
                    <div class="single-pf-img">
                        <img src="{{$work->image->url ? ""}}" alt="">
                    </div>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="row single-pf-content">
                    <div class="col-sm-12">
                        <h3>
                            {{$work->title}} </h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
    {!! $work->seo_scripts !!}
@endpush
