@extends('layouts.home_admin')

@section('content')
<section class="masthead page-section" id="contact">
    <div class="container">

<div class="masthead container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Zalogowano jako Administrator - ') }}
                    {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
