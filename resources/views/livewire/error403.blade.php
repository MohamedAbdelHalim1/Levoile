@extends('layouts.custom-app')

@section('styles')

@endsection

@section('content')
@section('custom-error')
<div class="error-loging-img">
@endsection

                <div class="page-content">
                    <div class="container text-center">
                        <div class="display-1 mb-2">403</div>
                        <p class="h5 fw-normal mb-6 leading-normal">Oops! You've Reached the land of the dead..</p>
                        <a class="btn btn-primary" href="{{url('index')}}">
                            Back To Home
                        </a>
                    </div>
                </div>
            </div>

@endsection

@section('scripts')

@endsection