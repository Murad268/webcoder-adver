@extends('layouts.app')

@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Yeni bloq əlavə et</h5>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
            <div class="card col-span-2">
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{route('admin.blog.store')}}">
                        @csrf

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
                                        <label for="inputText1" class="inline-block mb-2 text-base font-medium">Başlıq ({{$language->code}})<span class="text-red-500">*</span></label>
                                        <input type="text" id="inputText1" name="title[{{$language->code}}]" value="{{old('title'.$language->code)}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputText3" class="inline-block mb-2 text-base font-medium">Seo başlığı ({{$language->code}})<span class="text-red-500">*</span></label>
                                        <input type="text" id="inputText3" name="seo_title[{{$language->code}}]" value="{{old('seo_title'.$language->code)}}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="textArea1" class="inline-block mb-2 text-base font-medium">Mətn ({{$language->code}})</label>
                                    <textarea name="text[{{ $language->code }}]" class="summernote form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="textArea1" rows="3">{{ old('text.' . $language->code) }}</textarea>
                                </div>
                                <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                                    <div class="mb-3">
                                        <label for="textArea2" class="inline-block mb-2 text-base font-medium">Seo açar sözlər ({{$language->code}})</label>
                                        <textarea name="seo_keywords[{{ $language->code }}]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="textArea2" rows="3">{{ old('seo_keywords.' . $language->code) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="textArea3" class="inline-block mb-2 text-base font-medium">Seo açıqlama ({{$language->code}})</label>
                                        <textarea name="seo_description[{{ $language->code }}]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="textArea3" rows="3">{{ old('seo_description.' . $language->code) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @php
                            $isFirst = false;
                            @endphp
                            @endforeach
                        </div>

                        <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2">
                            <div class="mb-3">
                                <label for="seo_links" class="inline-block mb-2 text-base font-medium">Seo linkləri</label>
                                <textarea name="seo_links" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="seo_links" rows="3">{{ old('seo_links') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="seo_scripts" class="inline-block mb-2 text-base font-medium">Seo skriptləri</label>
                                <textarea name="seo_scripts" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="seo_scripts" rows="3">{{ old('seo_scripts') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="inline-block mb-2 text-base font-medium">Şəkil</label>
                            <input name="image" type="file" class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                        </div>

                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                            Əlavə et
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
</div>
@endsection
@push('scripts')
<!-- Include Summernote CSS and JS -->
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.summernote').forEach((textarea) => {
            $(textarea).summernote({
                height: 200,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
        });
    });
</script>
@endpush
