@props(['content'])

<div class="prose">
    {!! \Illuminate\Support\Str::of($content)->markdown() !!}
</div>
