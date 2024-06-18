<x-mail::message>
<div >
   Hello {{ $data['clientName']}},
<br><br>
</div>

<div >
    {{$data['theMessage']}}
</div>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>