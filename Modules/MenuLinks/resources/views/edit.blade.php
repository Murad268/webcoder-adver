@extends('layouts.app')

@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Link əlavə edin</h5>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
            <div class="card col-span-2">
                <div class="card-body">
                    <form method="post" action="{{route('menulinks.update', $menuLink->id)}}">
                        @csrf
                        @method('PATCH')
                        <ul class="flex flex-wrap w-full text-sm font-medium text-center border-b border-slate-200 dark:border-zink-500 nav-tabs">
                            @php
                            $isFirst = true;
                            @endphp
                            @foreach($languages as $language)
                            <li class="group {{ $isFirst ? 'active' : ''}}">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="{{$language->code}}" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">{{$language->name}}</a>
                            </li>
                            @php
                            $isFirst = false;
                            @endphp
                            @endforeach
                        </ul>

                        <div class="mt-5 mb-4 tab-content">
                            @php
                            $isFirst = true;
                            @endphp
                            @foreach($languages as $language)
                            <div class="block tab-pane {{ $isFirst ? 'block' : 'hidden'}}" id="{{$language->code}}">
                                <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                                    <div class="mb-3">
                                        <label for="title_{{$language->code}}" class="inline-block mb-2 text-base font-medium">Link adı ({{$language->code}})<span class="text-red-500">*</span></label>
                                        <input type="text" id="title_{{$language->code}}" name="title[{{$language->code}}]" value="{{old('title.'.$language->code, $menuLink->getTranslation('title', $language->code))}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label for="seo_title_{{$language->code}}" class="inline-block mb-2 text-base font-medium">SEO Title ({{$language->code}})</label>
                                        <input type="text" id="seo_title_{{$language->code}}" name="seo_title[{{$language->code}}]" value="{{old('seo_title.'.$language->code, $menuLink->getTranslation('seo_title', $language->code))}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    </div>
                                    <div class="mb-3">
                                        <label for="seo_keywords_{{$language->code}}" class="inline-block mb-2 text-base font-medium">SEO Keywords ({{$language->code}})</label>
                                        <textarea id="seo_keywords_{{$language->code}}" name="seo_keywords[{{$language->code}}]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">{{old('seo_keywords.'.$language->code, $menuLink->getTranslation('seo_keywords', $language->code))}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="seo_description_{{$language->code}}" class="inline-block mb-2 text-base font-medium">SEO Description ({{$language->code}})</label>
                                        <textarea id="seo_description_{{$language->code}}" name="seo_description[{{$language->code}}]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">{{old('seo_description.'.$language->code, $menuLink->getTranslation('seo_description', $language->code))}}</textarea>
                                    </div>
                                </div>
                            </div>
                            @php
                            $isFirst = false;
                            @endphp
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="code" class="inline-block mb-2 text-base font-medium">Səhifə kodu (eyni kateqoriyaya aid səhifələrdə eyni kod olmalıdır)<span class="text-red-500">*</span></label>
                            <input type="text" id="code" name="code" value="{{old('code', $menuLink->code)}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                        </div>
                        <div class="mb-3">
                            <label for="seo_links" class="inline-block mb-2 text-base font-medium">SEO Links</label>
                            <textarea id="seo_links" name="seo_links" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">{{old('seo_links', $menuLink->seo_links)}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="seo_scripts" class="inline-block mb-2 text-base font-medium">SEO Scripts</label>
                            <textarea id="seo_scripts" name="seo_scripts" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">{{old('seo_scripts', $menuLink->seo_scripts)}}</textarea>
                        </div>


                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                            Yenilə
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Include necessary scripts -->
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-tab-toggle]').forEach(tab => {
            tab.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.add('hidden');
                    pane.classList.remove('block');
                });
                document.getElementById(target).classList.add('block');
                document.getElementById(target).classList.remove('hidden');
                document.querySelectorAll('[data-tab-toggle]').forEach(tab => {
                    tab.parentElement.classList.remove('active');
                });
                this.parentElement.classList.add('active');
            });
        });
    });
</script>
@endpush
