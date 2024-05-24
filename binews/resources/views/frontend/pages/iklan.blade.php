@extends('frontend.front')

@section('main')
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Iklan</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            {{ $statispage[1]->value_content }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('frontend.pages.partials.ads')
                    @include('frontend.pages.partials.newsletter')
                </div>
            </div>
        </div>
    </div>
@endsection
