@component('mail::message')
# Introduction
{{ $data['title']}}
The body of your message.

@component('mail::button',['url' => $data['url']])
Visit MindsCMS Blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent