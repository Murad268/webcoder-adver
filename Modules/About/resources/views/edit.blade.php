@extends('layouts.app')

@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Məlumatlarımız</h5>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-10">
            <div class="card col-span-2">
                <div class="card-body">
                    <div>
                        <form enctype="multipart/form-data" method="post" action="{{ route('about.update', $model->id) }}">
                            @csrf
                            @method('PATCH')
                            <ul class="flex flex-wrap w-full text-sm font-medium text-center border-b border-slate-200 dark:border-zink-500 nav-tabs">
                                @php
                                $isFirst = true;
                                @endphp
                                @foreach($languages as $language)
                                <li class="group {{ $isFirst ? 'active' : '' }}">
                                    <a href="javascript:void(0);" data-tab-toggle="" data-target="{{ $language->code }}" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">{{ $language->name }}</a>
                                </li>
                                @php
                                $isFirst = false;
                                @endphp
                                @endforeach
                            </ul>
                            @sessionMessages
                            <div style="border: 1px solid black; padding: 30px" class="mt-5 mb-4 tab-content">
                                @php
                                $isFirst = true;
                                @endphp
                                @foreach($languages as $language)
                                <div class="tab-pane {{ $isFirst ? 'block' : 'hidden' }}" id="{{ $language->code }}">
                                    <div class="flex flex-wrap gap-5">
                                        <div class="mb-3 flex-1">
                                            <label for="textArea" class="inline-block mb-2 text-base font-medium">Ana səhifə haqqımızda mətni ({{ $language->code }})</label>
                                            <textarea name="home_page_about_text[{{ $language->code }}]" class="summ"  rows="3">{{ old('home_page_about_text.' . $language->code, $model->getTranslation('home_page_about_text', $language->code)) }}</textarea>
                                        </div>

                                        <div class="mb-3 flex-1">
                                            <label for="textArea" class="inline-block mb-2 text-base font-medium">Haqqımızda səhifəsi haqqımızda mətni ({{ $language->code }})</label>
                                            <textarea name="about_page_about_text[{{ $language->code }}]" class="summ"  rows="3">{{ old('about_page_about_text.' . $language->code, $model->getTranslation('about_page_about_text', $language->code)) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @php
                                $isFirst = false;
                                @endphp
                                @endforeach
                            </div>


                            <div class="flex flex-wrap gap-5">
                                <div class="mb-3 flex-1">
                                    <label for="nav_logo" class="inline-block mb-2 text-base font-medium">Ana səhifə haqqımızda şəkli</label>
                                    <div class="wrapper_image relative w-64 h-24">
                                        @foreach($model->images->where('type', 'home_page_image') as $image)
                                        <div style="width: 150px; " class="relative w-64 h-24">
                                            <a target="_blank" style="display: block; width: 100%; height: 100%;" href="{{ asset($image->url) }}">
                                                <img style="width: 100%; height: 100%;" src="{{ asset($image->url) }}" alt="">
                                            </a>
                                            <a href="{{ route('about.deleteFile', $image->id) }}" style="cursor: pointer; position: absolute; top: 0; right: 0; background-color: red; color: white; padding: 6px;" class="delete_image" data-id="{{ $image->id }}">
                                                X
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3">
                                        <input multiple name="home_page_image[]" type="file" class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                    </div>

                                </div>

                                <div class="mb-3 flex-1">
                                    <label for="footer_logo" class="inline-block mb-2 text-base font-medium">Haqqımızda səhifəsi şəkli</label>

                                    <div class="wrapper_image relative w-64 h-24">
                                        @foreach($model->images->where('type', 'about_page_image') as $image)
                                        <div class="relative w-64 h-24">
                                            <a target="_blank" style="display: block; width: 100%; height: 100%;" href="{{ asset($image->url) }}">
                                                <img style="width: 100%; height: 100%;" src="{{ asset($image->url) }}" alt="">
                                            </a>
                                            <a href="{{ route('about.deleteFile', $image->id) }}" style="cursor: pointer; position: absolute; top: 0; right: 0; background-color: red; color: white; padding: 6px;" class="delete_image" data-id="{{ $image->id }}">
                                                X
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3">
                                        <input multiple name="about_page_image[]" type="file" class="cursor-pointer form-file border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                    </div>

                                </div>
                            </div>



                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Yenilə
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
</div>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>



    document.querySelectorAll('.summ').forEach((textarea) => {
        $(textarea).summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: true
        });
    });


    document.querySelectorAll('.delete_image').forEach((button) => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            Swal.fire({
                title: 'Əminsiniz?',
                text: "Bu şəkli silmək istədiyinizdən əminsiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Bəli, silin!',
                cancelButtonText: 'Xeyr, ləğv et!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });
    });
</script>
@endpush
