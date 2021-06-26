@component('mail::message')
# Introduction

The following foreigners have at least one date near expiry:

@foreach ($foreigners as $foreigner)
{{++$i}}. {{$foreigner->name}} {{$foreigner->sname}} ({{$foreigner->position->name}} @ {{$foreigner->company->name}})
@endforeach

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
