@extends('layouts.custom-app')

@section('styles')

@endsection

@section('content')
@section('custom-error')
<div class="error-loging-img">
@endsection

                <div class="page-content">
                    <div class="container text-center text-dark">
                        <div class="display-1  text-dark mb-2">400</div>
                        <p class="h5 fw-normal mb-6 leading-normal">Oops! The Page you were looking for doesn't exits...</p>
                        <a class="btn btn-primary" href="{{url('index')}}">
                            Back To Home
                        </a>
                    </div>
                </div>
            </div>

@endsection

@section('scripts')

@endsection