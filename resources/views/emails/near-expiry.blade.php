@component('mail::message')
## The following foreigners have at least one date near expiry:

@foreach ($foreigners as $foreigner)
{{++$i}}. {{$foreigner->name}} {{$foreigner->sname}} ({{$foreigner->position->name}} @ {{$foreigner->company->name}})
@endforeach

Please fix.
@endcomponent
