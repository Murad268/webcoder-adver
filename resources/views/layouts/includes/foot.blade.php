
<script src="{{asset('panel/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('panel/assets/libs/lucide/umd/lucide.js')}}"></script>
<script src="{{asset('panel/assets/js/tailwick.bundle.js')}}"></script>

<script src="{{asset('panel/assets/js/app.js')}}"></script>
@if (!request()->routeIs('about.edit'))
    <script src="{{ asset('panel/assets/libs/ckeditor/ckeditor.js') }}"></script>
@endif
@stack('scripts')
