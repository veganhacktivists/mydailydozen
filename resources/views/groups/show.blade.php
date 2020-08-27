@extends('layouts.app')

@section('title', title(__('Group')))

@section('content')

<div class="container">
    <div class="banner group-banner">
        <img class="img-fluid" src="{{ $group->banner_location }}" alt="{{ $group->name }}">
        <div class="bottom-left">
            <h3>{{ $group->name }}</h3>
        </div>
    </div>
    <div class="d-flex justify-content-between my-4">
        <div>
            <h4 class="group-heading">Serving Sizes</h4>
        </div>
        <div class="btn-group btn-group-toggle inline" data-toggle="buttons">
            <label class="btn btn-light active">
                <input type="radio" name="options" id="imperial" checked> Imperial
            </label>
            <label class="btn btn-light">
                <input type="radio" name="options" id="metric"> Metric
            </label>
        </div>
    </div>
    <div class="card mb-2">
        <div class="card-body">1 cup fresh or frozen</div>
    </div>
    <div class="card mb-2">
        <div class="card-body">1/4 cup dried</div>
    </div>
    <div class="my-4">
        <h4 class="group-heading">Types</h4>
    </div>
    <div class="card mb-2">
        <div class="card-body d-flex justify-content-between py-3">
            <div>Black</div>
            <div><h6 class="text-secondary">VIDEOS</h6></div>
        </div>
    </div>
    <div class="card mb-2">
        <div class="card-body d-flex justify-content-between py-3">
            <div>Kidney</div>
            <div><h6 class="text-secondary">VIDEOS</h6></div>
        </div>
    </div>
    <div class="card mb-2">
        <div class="card-body d-flex justify-content-between py-3">
            <div>Navy</div>
            <div><h6 class="text-secondary">VIDEOS</h6></div>
        </div>
    </div>
    <div class="card mb-2">
        <div class="card-body d-flex justify-content-between py-3">
            <div>Pinto</div>
            <div><h6 class="text-secondary">VIDEOS</h6></div>
        </div>
    </div>
</div>
@endsection
