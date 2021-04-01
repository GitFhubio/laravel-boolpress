@component('mail::message')
# Nuovi tag usati

Fai attenzione,abbiamo usato questi tag.
@foreach ($tags as $tag)
* {{$tag->name}}
@endforeach
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
