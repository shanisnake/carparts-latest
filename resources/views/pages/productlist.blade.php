@extends('layouts.default')

@section('content')

<style>
  .carpet-grid-img {
    display: block;
    width: 100%;
    position: relative;
    height: 0;
    padding: 67% 0 0 0;
    overflow: hidden;
    vertical-align: middle;
    border: 1px solid #dee2e6;
    }
    .carpet-grid-sectn {
      display: block !important;
  }
  .grid_section_main {
    width: 100%;
    display:block !IMPORTANT;
}
.list-custom .main-carpet_grid_sectn{
  display: flex;
  width:100%;
}
.list-custom .grid_carpet_img{
  width:25%;
}
.list-custom .carpet_description_grid{
  width: 55%;
  padding-top: 10px;
}
.list-custom .carpet_description_price {
  width:20%;
  text-align: right;
  padding-top: 5px;
  padding-right: 5px;
}
.list-custom .product-grid-single{
  margin: 0px;
}
.grid-content{
  display:flex !IMPORTANT;
  justify-content: center;
}
.grid-content .product-grid-single {
  width: 31%;
  margin: 6px;
  padding: 0px;
}
.grid-content{
  padding: 0px !important;
}
.grid-content .product-grid-single.w-1/3{
  width: 31% !important;
  margin: 6px;
  padding: 0px !important;
}
   .carpet-grid-img img.w-full {
    position: absolute;
    display: block;
    max-width: 100%;
    max-height: 100%;
    left: 0;
    right: 0;
    top: 50%;
    bottom: 0;
    transform: translate(0% , -50%);
}

.grid-content h2{
  line-height: 17px;
  font-size:15px;
  color:#333;
  padding-top:10px;
}
.grid-content a:hover{
  text-decoration:none;
}
.grid-content .col-start-auto{
  padding-left:5px;
}
.grid-content .grid{
  display: block;
}
.grid-content .grid h4{
  color:#15508a;
  padding-top: 6px;
  font-size: 14px;
  }
   .product-grid {
    display: block;
    width: 26%;
    }
  #nav-list-grid {
    display: flex;
  }
 .product-grid button {
    padding: 12px 10px;
    margin: 0px;
    flex: 1;
}
.product-grid button i {
    font-size: 13px;
}
.grid-cols-2 .justify-end{
  padding-right: 1px;
}
/*--29---*/
.grid-button .bg-indigo-800 i{
  color:#fff;
}
.grid-button button{
  /*background:#fff;*/
}
.grid-content .carpet-grid-img{
    border: 1px solid #dee2e6;
}
/*.carpet-grid-img img.w-full{
    top: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
}*/
.carpet-grid-img .carpet-grid-img a {
    width: 100%;
    height: 100%;
    display: block;
}
.product-grid-single article:hover{
  box-shadow: 0 5px 10px rgb(18 35 63 / 20%);
  z-index: 10;
}
.grid-button button.mx-1.px-2.py-1.py-1\.5.bg-normal-dark{
  background:#fff !important;
}
.grid-button button.mx-1.px-2.py-1.py-1\.5.bg-normal-dark i.fa.fa-list-ul.text-base.text-white {
    color: #106de2;
}

.grid-button button.mx-1.px-2.py-1.py-1\.5.bg-normal-dark.bg-indigo-800{
  background: rgb(92,198,247) !important;
  background: linear-gradient(90deg, rgba(92,198,247,1) 0%, rgba(15,109,226,1) 52%) !important;
}
.grid-button button.mx-1.px-2.py-1.bg-indigo-800{
  background: rgb(92,198,247) !important;
  background: linear-gradient(90deg, rgba(92,198,247,1) 0%, rgba(15,109,226,1) 52%) !important;
}
 .grid-button button.mx-1.px-2.5.bg-normal-dark.bg-indigo-800 i{
  color: #fff !important;
  }
  .product-grid-single h2 {
  font-size: 17px;
  color:#333;
  line-height: 18px;
}
.grid-button button.mx-1.px-2.py-1.py-1\.5.bg-normal-dark.bg-indigo-800 i{
  color:#fff !important;
}
.product-grid-single  h4 {
    color: #15508a;
    font-size: 16px;
}
.product-navigation ul{
    display:flex;
    justify-content: center;
}
.product-navigation ul li {
    border: 1px solid rgb(92 198 247);
    border-left: 0;
    padding: 5px;
}
.pagination-nav.product-navigation {
    margin-bottom: 60px;
}
.product-navigation .active{
    background:#0f6de2;
    padding: 4px 10px;
    background: rgb(92 198 247);
}
.product-navigation ul li:nth-child(1){
    border-left:1px solid rgb(92 198 247);
    background: rgb(92, 198, 247, 0.6);
    background:linear-gradient(90deg, rgba(92,198,247,1) 0%, rgba(15,109,226,1) 52%) !important;
}
.product-navigation ul li:nth-child(1) a{
    color: #fff !important;
}
.product-navigation ul li:last-child a{
    color: #fff !important;
}
.product-navigation ul li:last-child{
    background: rgb(92, 198, 247, 0.6);
    background:linear-gradient(90deg, rgba(92,198,247,1) 0%, rgba(15,109,226,1) 52%) !important;
}
.product-navigation ul li a {
    color: #106de2;
    margin:0px 10px;
}
.product-navigation .active a{
    color:#fff;
}
@media screen and (max-width: 992px) {
.product-grid-single  h4 {
    font-size: 13px;
}
}
@media screen and (max-width: 768px) {
.grid-content .carpet-grid-img {
    min-height: 140px;
    }
    .product-grid button{
    padding: 10px;
    }
    .product-grid-single h2 {
    font-size: 13px;
    }
    .product-navigation ul li a{
    font-size: 14px;
    margin: 0px 6px;
    }
  }
  @media screen and (max-width: 767px) {
  .product-grid-single h2 {
  padding-top: 10px;
}
.grid-content .product-grid-single{
    width: 45%;
    margin: 10px;
}
.list-custom .carpet_description_grid{
  padding-left: 20px;
}
.list-custom .carpet_description_grid h2 {
  font-size: 15px;
}
.list-custom  .carpet_description_price h4{
  font-size: 15px;
}
  }
@media screen and (max-width: 575px) {
    .product-grid button i {
        font-size: 10px;
    }
    .product-grid button {
    padding: 10px;
    }
    .product-grid{
    width: 30%;
    }
    .product-navigation ul li a {
    font-size: 12px;
    margin: 0px 2px;
    }
    .grid-page-layout {
    margin-bottom: 20px;
    }
    .list-custom .main-carpet_grid_sectn{
    display: block; 
    }
    .list-custom .grid_carpet_img {
      width: 100%;
  }
  .list-custom .carpet_description_grid{
    padding-left: 10px;
    width: 100%; 
  }
  .list-custom .carpet_description_price{
   width: 100%; 
   text-align: left;
   padding-left: 10px;
  }
}
@media screen and (max-width: 432px) {
  .grid-content .product-grid-single {
    width: 45%;
    margin: 8px;
  }
}
@media screen and (max-width: 425px) {
    .product-navigation ul li a{
    font-size: 10px;
    }
}
@media screen and (max-width: 375px) {
  .product-grid {
    width: 45%;
}
.grid-content .product-grid-single {
  width: 100%;
  margin: 0px;
}
.product-navigation .active{
  line-height: 27px;
  font-size: 14px;
}
}


/* only for welcome page --start */

.welcome-heading{
    background: dodgerblue;
    font-size: -webkit-xxx-large;
    color: white;
    font-family: fangsong;
    padding: 150px;
    font-size: 4rem;
}

.btn-m{
    color: chartreuse;
}
/* only for welcome page --start */
</style>


<?php if (isset( $_COOKIE['remember-list-grid'])) {
  $remember_list_grid =  $_COOKIE['remember-list-grid'];
}else{
  $remember_list_grid = '';
}  ?>
    <!-- header -->
      <div class="header z-50 w-full top-0 bg-gradient-to-r from-sky-normal to-normal-dark">
        <div class="header-item">
          <nav id="header" class="w-full z-30 top-0 text-white">
            <div
              class="w-full grid grid-col-1 lg:grid-cols-1 mt-0 md:max-w-2xl lg:max-w-4xl max-w-6xl mx-auto py-2 lg:py-6"
            >
              <div class="block lg:flex items-center justify-center">
                <a
                  class="mr-12 text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                  href="#"
                >
                <H1>CARPARTS</H1> <!-- <img src="images/logo_img.png"> -->
                </a>
              </div>
          </nav>
        </div>
      </div>
    <!-- header -->

    <!-- button-list -->


      <!-- grid and list body content start form here -->  
      <!-- cookie list type define here  -->  
      
      <main class="mx-auto max-w-3xl mb-24 grid-page-layout list-grid-buttons" x-data="{'layout': '@if ($remember_list_grid) {{$remember_list_grid }} @else  list @endif'}" >

    <div class="grid grid-cols-2 mt-5 md:max-w-6xl lg:max-w-6xl max-w-6xl mx-auto w-full lg:w-full px-4 lg:px-0">
      <div class=""></div>
      <div class="flex justify-end">
        <div class=" flex border-2 border-normal-dark w-28 rounded product-grid grid-button carpet-grid-sectn">
            <nav id="nav-list-grid">
              <button remember='list' type="button" class="mx-1 px-2 py-1 hover:bg-indigo-900 w-2/4 py-1.5 bg-normal-dark  listing-view" id='list-button' x-on:click="layout = 'list'" x-bind:class="{'bg-indigo-800': layout === 'list'}">
                <i class="fa fa-list-ul text-base text-white" aria-hidden="true"></i>
              </button>
              <button remember='grid' type="button" class="mx-1 px-2 py-1 listing-view " x-on:click="layout = 'grid'" id='grid-button' x-bind:class="{'bg-indigo-800': layout === 'grid'}">
                <i class="fa fa-th-large text-base text-normal-dark w-2/4" aria-hidden="true"></i>
              </button>
            </nav>
        </div>
      </div>
    </div>



    <!-- button-list -->
    <div class="grid_list">
      <!-- produtc-list -->
    <div class="md:max-w-6xl lg:max-w-6xl max-w-6xl mx-auto w-full lg:w-full px-4 lg:px-0">

     
    <section id="main-content-section" class="grid_section_main flex flex-wrap @if ($remember_list_grid == 'grid') grid-content p-2 @else list-custom @endif" x-bind:class="{'pb-4': layout === 'list', 'p-2': layout === 'grid'}">    
    @foreach ($data  as $key => $products)
    @if($products->sku)
        <div  class="@if ($remember_list_grid == 'grid') w-1/3 @endif  product-grid-single" x-bind:class="{'w-full m-4 mb-0': layout === 'list', 'w-1/3 p-2': layout === 'grid'}">
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
                      <img  src="https://assets.spareto.com/assets/noimage/product-a4f51a9bc46f281d2eb02881e53002530020cb5d0283bd0d020d4d305aa94971.png"  class="w-full">
                      </a>
                    @endif
                  
                </div>
              </div>
              <div class="carpet_description_grid pl-0 md:pl-8 lg:pl-8 col-start-auto md:col-start-2 md:col-start-2 lg:col-start-2 col-end-auto md:col-end-5 lg:col-end-5">
                <a href="/product/detail/{{$products->id}}" target='_blank'>
                  <h2 class="m-0 text-xl font-bold">
                    <span class="brand" itemprop="brand">{{$products->name}}</span>
                  </h2>
                </a>
              </div>
              
              <div class="carpet_description_price col-start-auto md:col-start-5  lg:col-start-5 col-end-auto md:col-end-7 lg:col-end-7">
                <h4 class="m-0 text-xl font-bold mb-1"> $ 
                {{$products->price}}</h4>
                <div class="mt-3 flex">
        
                </div>
              </div>
            </div>
          </article>
        </div>
        @endif
        @endforeach
    </section>
    </main>
    <!-- grid and list body content end form here -->
      
    </div>

  <!-- pagination nav bar start  pagination-->
  <div class="pagination-nav product-navigation" style="text-align: center;">
  {{ $data->onEachSide(2)->links() }}

  </div>
  <!-- pagination nav bar end  pagination-->

  @endsection
