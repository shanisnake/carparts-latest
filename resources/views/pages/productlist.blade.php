@extends('layouts.default')

@section('content')

<?php
  // get cookie and set layout of page as grid or list 
if(isset( $_COOKIE['remember-list-grid'])) {
  $remember_list_grid =  $_COOKIE['remember-list-grid'];
}else{
  $remember_list_grid = '';
};  ?>


<!-- button-list  section end-->

<div class=""></div>
<main class="mx-auto max-w-3xl mb-24 grid-page-layout list-grid-buttons"
    x-data="{'layout': '@if ($remember_list_grid) {{$remember_list_grid }} @else  list @endif'}">

    <div class="grid grid-cols-2 mt-5 md:max-w-6xl lg:max-w-6xl max-w-6xl mx-auto w-full lg:w-full px-4 lg:px-0">
        <div class=""></div>
        <div class="flex justify-end">
            <div class=" flex border-2 border-normal-dark w-28 rounded product-grid grid-button carpet-grid-sectn">
                <nav id="nav-list-grid">
                    <button remember='list' type="button"
                        class="mx-1 px-2 py-1 hover:bg-indigo-900 w-2/4 py-1.5 bg-normal-dark  listing-view"
                        id='list-button' x-on:click="layout = 'list'"
                        x-bind:class="{'bg-indigo-800': layout === 'list'}">
                        <i class="fa fa-list-ul text-base text-white" aria-hidden="true"></i>
                    </button>
                    <button remember='grid' type="button" class="mx-1 px-2 py-1 listing-view "
                        x-on:click="layout = 'grid'" id='grid-button'
                        x-bind:class="{'bg-indigo-800': layout === 'grid'}">
                        <i class="fa fa-th-large text-base text-normal-dark w-2/4" aria-hidden="true"></i>
                    </button>
                </nav>
            </div>
        </div>
    </div>



    <!-- button-list  section end-->


    <!-- grid and list body content start form here -->

    <div class="grid_list">
        <!-- produtc-list -->
        <div class="md:max-w-6xl lg:max-w-6xl max-w-6xl mx-auto w-full lg:w-full px-4 lg:px-0">


            <section id="main-content-section"
                class="grid_section_main flex flex-wrap @if ($remember_list_grid == 'grid') grid-content p-2 @else list-custom @endif"
                x-bind:class="{'pb-4': layout === 'list', 'p-2': layout === 'grid'}">
                @foreach ($data as $key => $products)
                @if($products->sku)

                <div class="@if ($remember_list_grid == 'grid') w-1/3 @endif  product-grid-single"
                    x-bind:class="{'w-full m-4 mb-0': layout === 'list', 'w-1/3 p-2': layout === 'grid'}">
                    <article class="">
                        <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-6 mt-10 main-carpet_grid_sectn">
                            <div class="grid_carpet_img">
                                <div class="border border-grey-light carpet-grid-img">
                                    @if ($products->img)
                                    <a href="/product/detail/{{$products->id}}" target='_blank'>
                                        <img src="{{$products->img}}" class="w-full">
                                    </a>
                                    @else
                                    <a href="/product/detail/{{$products->id}}" target='_blank'>
                                        <img src="https://assets.spareto.com/assets/noimage/product-a4f51a9bc46f281d2eb02881e53002530020cb5d0283bd0d020d4d305aa94971.png"
                                            class="w-full">
                                    </a>
                                    @endif

                                </div>
                            </div>

                            <div
                                class="carpet_description_grid pl-0 md:pl-8 lg:pl-8 col-start-auto md:col-start-2 md:col-start-2 lg:col-start-2 col-end-auto md:col-end-5 lg:col-end-5">
                                <a href="/product/detail/{{$products->id}}" target='_blank'>
                                    <div class="full-height-width">
                                        <h2 class="m-0 text-xl font-bold">
                                            <span class="brand" itemprop="brand">{{$products->name}}</span>
                                        </h2>
                                    </div>
                                </a>
                            </div>

                            <div
                                class="carpet_description_price col-start-auto md:col-start-5  lg:col-start-5 col-end-auto md:col-end-7 lg:col-end-7">
                                <a href="/product/detail/{{$products->id}}" target='_blank'>
                                    <div class="full-height-width">
                                        <h4 class="m-0 text-xl font-bold mb-1">
                                            @if($products->price)
                                            $ {{$products->price}}
                                            @endif
                                        </h4>
                                    </div>
                                </a>
                                <div class="mt-3 flex">

                                </div>
                            </div>
                        </div>
                    </article>

                </div>
                @endif
                @endforeach
            </section>
        </div>
    </div>

</main>
<!-- grid and list body content end form here -->
<!-- pagination nav bar start  pagination-->
<div class="pagination-nav product-navigation" style="text-align: center;">

    {{ $data->onEachSide(2)->links() }}

</div>
<!-- pagination nav bar end  pagination-->

@endsection
