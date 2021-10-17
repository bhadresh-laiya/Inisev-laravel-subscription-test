@component('mail::message')
# Hello {{$user->name}},
<br>
Post:: {{$post->title}}.
<br><br>
Post contents::
<br><br>
{{$post->description}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent