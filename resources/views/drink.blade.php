@extends('home')

@section('contentt')


<div id="drink" class="tm-page-content">
    <!-- Drink Menu Page -->
    <nav class="tm-black-bg tm-drinks-nav">
        <ul>
            @foreach($Category as $val)
            <li>
                <a href=" /linkcategory/{{$val->id}} " class="tm-tab-link"
                    data-id="{{$val->id}}">{{$val->categoryname}}</a>
            </li>
            @endforeach
        </ul>
    </nav>
    @foreach($Category as $val)
    <div id="{{$val->id}}" class="tm-tab-content">
        @endforeach
        <div class="tm-list">
            @foreach($Beverage as $vall)
            @if($vall->special =="no")
            <div class="tm-list-item">
                <img src="{{ asset('beverageee/'.$vall->image) }}" alt="Image" class="tm-list-item-img">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{$vall->title}}<span class="tm-list-item-price">
                            @php
                            $pp=$vall->price;
                            $priceformated=number_format($pp, 2, ".", "");
                            @endphp
                            {{ $priceformated }} $
                        </span>
                    </h3>
                    <p class="tm-list-item-description">{{$vall->content}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <!-- end Drink Menu Page -->
</div>
<!-- end Contact Page -->

@endsection