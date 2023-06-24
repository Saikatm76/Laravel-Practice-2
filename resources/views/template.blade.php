{{ Carbon\Carbon::create(2012, 1, 1, 0, 0, 0, 'America/Toronto')->diffForHumans() }}
{{ 1 + 2 }}
{!! '<h1>abc</h1>' !!}
Hello @{{ name }}

@php
    $var = 'hello';
@endphp

{{ $var }}

<div>

    <a href={{ route('user.index') }}>contact</a>
    {{-- <a href={{ route('admin.company.name', 'saikat') }}>test</a> --}}

</div>

<div>

    @foreach ($contact as $num => $contacts)
        {{ $contacts['id'] }}
        {{ $contacts['name'] }}
        <a href={{ route('user.single_contact', 1) }}>test</a>
        <br>
    @endforeach

</div>
