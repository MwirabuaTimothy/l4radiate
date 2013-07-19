@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop


@section('content')
<!-- replace the content below to suit your page content -->


@if(isset($data[0]["ItemAttributes"]["Title"]))

        <ul id="searchresults">

          @foreach($data as $item)
            <li>
            	<span class="bookimage">
            		@if(!isset($item["MediumImage"]["URL"]))
            		Image not Found
            		@else
            		<img src="{{ $item["MediumImage"]["URL"] }}" />
            		@endif
            	</span>
            	<span class="bookdata">
            		<h4>{{ $item["ItemAttributes"]["Title"] }}</h4>
            		<!-- @if(isset($item["ItemAttributes"]["Author"]))
            			<p>{{ var_dump($item["ItemAttributes"]["Author"]) }}</p>
            		@elseif(isset($item["ItemAttributes"]["Creator"]))
            			<p>{{ var_dump($item["ItemAttributes"]["Creator"]) }}</p>
            		@else
            			Unknown
            		@endif -->
            		@if(isset( $item["ItemAttributes"]["Binding"]))
            			<p>Binding: {{ $item["ItemAttributes"]["Binding"] }}</p>
            		@else
            			Unknown
            		@endif
            		@if(isset( $item["ItemAttributes"]["ListPrice"]["FormattedPrice"] ))
            			<p>Price: {{ $item["ItemAttributes"]["ListPrice"]["FormattedPrice"] }}</p>
            		@else
            			Price unspecified
            		@endif
            	</span>
            	<span class="bookactions">
            		<a id="view" href="{{ $item["DetailPageURL"] }}">View On Amazon</a>
            		<!-- <a href="{{ $item["ItemLinks"]["ItemLink"][3]["URL"] }}">Add To Cart</a> -->
                    <form id="addtocart" method="GET" action="http://www.amazon.com/gp/aws/cart/add.html">
                        <input type="hidden" name="AssociateTag" value="6345-8081-7310"/>
                        <input type="hidden" name="SubscriptionId" value="AKIAJCMQDVYRM6ZS674A"/> 
                        <input type="hidden" name="ASIN.1" value="{{ $item["ASIN"] }}"/><br/>
                        <input type="hidden" name="Quantity.1" value="1"/><br/>
                        <input type="image" name="add" value="Buy from Amazon.com" border="0" 
                         alt="Buy from Amazon.com" src="http://images.amazon.com/images/G/01/associates/add-to-cart.gif">
                    </form> 
                    <span class="blue">
                        <a id="bookshelf" class="btn btn-primary btn-small" href="{{ $item["ItemLinks"]["ItemLink"][3]["URL"] }}">Add To Bookshelf</a>
                        <a id="wishlist" class="btn btn-primary btn-small" href="{{ $item["ItemLinks"]["ItemLink"][3]["URL"] }}">Add To Wishlist</a>
                    </span>
            	</span>  
            	
            </li>
          @endforeach

        </ul>
@else

 {{ printf($data) }}

@endif




@stop

@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

 <link rel="stylesheet" href="{{ asset('assets/styles/css/searchresults.css')}} ">
 

@stop


