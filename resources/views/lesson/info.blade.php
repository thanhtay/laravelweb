@extends('layouts.site')
@section('content')

<div class="container-title-top p-3">
    <div class="container title-top">
        <div class="row">
            <div class="col-6">
                <h1 class="display-5">Info: Toán 1</h1>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <ul class="nav nav-tabs tab-lesson">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-ative="theory-content">Theory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-ative="practice-content">Practice</a>
            </li>
        </ul>
    </div>
    <div class="container" id="theory-content">
        
    </div>
    <div class="container" id="practice-content"></div>
</div>
@endsection
