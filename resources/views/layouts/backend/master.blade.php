@extends('layouts.backend.base')
@section('base.content')
    <div class="wrapper">

    @include('layouts.backend.partials.header')

    <div class="content-wrapper">

        @include('layouts.backend.partials.sidebar')

        <section class="content">
            @yield('master.content')
        </section>

    </div>

    @include('layouts.backend.partials.footer')

</div>

@endsection
