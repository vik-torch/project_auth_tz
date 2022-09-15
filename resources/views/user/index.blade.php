@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User') }}</div>

                    <div class="m-3">
                        <form id="loginform">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Hello, World!</label>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
