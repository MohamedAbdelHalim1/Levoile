@extends('layouts.custom-app')

@section('styles')

@endsection

@section('content')
@section('custom-error')
<div class="error-loging-img">
@endsection

                <div class="page-content">
                    <div class="container text-center text-dark">
                        <div class="display-1  text-dark mb-2">404</div>
                        <p class="h5 fw-normal mb-6 leading-normal">Oops! looks like you got lost...</p>
                        <a class="btn btn-primary" href="{{route('dashboard')}}">
                            Back To Home
                        </a>
                    </div>
                </div>
            </div>

@endsection

@section('scripts')

@endsection