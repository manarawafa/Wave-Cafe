@extends('home')
@section('title','Special')
@section('contentt')

<!-- Special Items Page -->
<div id="special" class="tm-page-content">
    <div class="tm-special-items">
        @foreach( $Beveragee as $val )
        <div class="tm-black-bg tm-special-item">
            <img src="{{ asset('beverageee/'.$val->image) }}" alt="Image">
            <div class="tm-special-item-description">
                <h2 class="tm-text-primary tm-special-item-title">{{$val->title}}</h2>
                <p class="tm-special-item-text">{{$val->content}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- end Special Items Page -->

@endsection