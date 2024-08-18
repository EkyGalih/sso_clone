@props(['alphabet'])

@if($alphabet)
{{--    <div class="flex w-full bg-gray-500 text-white grid content-center justify-center" style="aspect-ratio: 1">--}}
{{--        <div class="flex-1">--}}
{{--        {{ $alphabet }}--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="flex w-full" style="aspect-ratio: 1">
        <div class="flex-1 bg-gray-600 text-center rounded-full text-white text-4xl grid content-center justify-center">
            {{ $alphabet }}
        </div>
    </div>
@endif

