@extends('layouts.default')

@section('content')

    <!-- shock -->

    <div class="my-7 md:max-w-2xl lg:max-w-4xl max-w-6xl mx-auto">
      <div class="">
        <h2 class="block md:flex lg:flex items-center justify-center m-0 text-2xl font-bold">
        @if ($data['details']->name)
          {{ $data['details']->name }}
        @endif
        </h2>
      </div>
    </div>
    <!-- shock -->

    <!-- Specification section start -->
    <div class="md:max-w-2xl lg:max-w-4xl max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-4" >
      <div class="border border-grey-light h-72">

        @if ($data['details']->img)
            <img src="{{ $data['details']->img }}" class="w-full h-full mr-4">
          @else
          <img  src="https://assets.spareto.com/assets/noimage/product-a4f51a9bc46f281d2eb02881e53002530020cb5d0283bd0d020d4d305aa94971.png"  class="w-full h-full">
        @endif
        
      </div>
      <div class="table-box-row col-start-auto lg:col-start-2 col-end-auto lg:col-end-4 mt-10 lg:mt-0">
        <div class="rounded-t-md bg-gradient-to-r from-sky-normal to-normal-dark text-white">
          <p class="py-3 px-4"><i class="fa fa-list-alt pr-3" aria-hidden="true"></i> Specifications</p>
        </div>
        <table class="table table-condensed dark-black border border-grey-light  w-full" id="product-properties">
          <tbody>


              @if(count($data['specifications']) > 0)    
                          @foreach($data['specifications'] as $keyy => $specifications)                          
                          <tr itemprop="additionalProperty" itemscope="" itemtype="http://schema.org/PropertyValue" class="border-grey-light border-b">
                              @foreach($specifications as $key => $value)                               
                                @if ($key == 'key' )
                                  <td itemprop="name" class="p-4 text-xs text-black "> <b>{{ ucwords(Str::replace('_', ' ', $value)) }}</b></td>
                                @elseif ($key == 'value' )
                                    <td itemprop="value" class="p-4 text-xs text-black "> {{ $value }}</td>
                                @endif  
                              @endforeach
                              </tr>
                        @endforeach
              @else
              <tr itemprop="additionalProperty" itemscope="" itemtype="http://schema.org/PropertyValue" class="border-grey-light border-b">
                <td itemprop="value" class="p-4 text-xs text-black ">No  Specifications</td>
              </tr>  
              @endif


          </tbody>
          </table>
      </div>
      <div class="mt-10 lg:mt-0 lg:w-full">
        <div class="">
        <!-- table -->
              @if($data['details']->price)

              <div class="rounded-t-md bg-gradient-to-r from-sky-normal to-normal-dark text-white">
                <p class="py-3 px-4"> Price </p>
              </div>

              <table class="table table-condensed dark-black border border-grey-light  w-full" id="product-properties">
                <tbody>
                  <td >

                      <h2 class="price selling mb-1 text-2xl font-bold text-dark-blue">
                        <span class="currency_symbol" itemprop="priceCurrency" content="EUR">€</span>
                        <span itemprop="price" content="103.15">

                          {{ $data['details']->price }}

                        </span>
                      </h2>

                  </td>
                </tbody>
              </table>

              @endif
 

              
        </div>
      </div>
    </div>
    <!-- Specification section end -->


    <!-- bottom tab section start -->
    <div class="manu-toggle md:max-w-2xl lg:max-w-4xl max-w-6xl mx-auto mt-8 px-4 lg:px-0 lg:px-10 xl:px-0 mb-8">

      
      <div class="flex flex-wrap" id="tabs-id">
        <div class="w-full">
          <ul class="border-b-2 border-mb-0 list-none flex-wrap  grid grid-cols-1 md:grid-cols-5 lg:grid-cols-5 xl:grid-cols-6 ">
            <li class="border-b-4 border-normal-dark -mb-px mr-11 last:mr-0 flex-auto text-center md:text-left lg:text-left">
              <a style="cursor: pointer;" class="md:text-sm lg:text-xs xl:text-base font-bold uppercase pt-1 pb-3 block leading-normal text-normal-dark active" onclick="changeAtiveTab(event,'tab-profile')">
                DIMENSIONS
              </a>
            </li>
            <li class="-mb-px md:mr-11 mr-6 last:mr-0 flex-auto text-center md:text-left lg:text-left">
              <a style="cursor: pointer;" class="md:text-sm lg:text-xs xl:text-15px text-base font-bold uppercase pt-1 pb-3 block leading-normal" onclick="changeAtiveTab(event,'tab-settings')">
                 COMPATIBILITY
              </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center md:text-left lg:text-left">
              <a style="cursor: pointer;" class="md:text-sm lg:text-xs xl:text-15px text-base font-bold uppercase pt-1 pb-3 block leading-normal" onclick="changeAtiveTab(event,'tab-options')">
                OE NUMBERS
              </a>
            </li>
          </ul>
          <div class="w-full xl:w-2/5 mt-8 border border-light-border bg-light-white relative flex flex-col min-w-0">
            <div class="px-5 py-5 flex-auto">
              <div class="tab-content tab-space">
                <div class="block" id="tab-profile">
                 <div class="specifications-tabs">
                   <ul>                      
                      <li class="py-4 border-b-2 grid grid-cols-2">
                      @if(count($data['dimensions']) > 0)    
                          @foreach($data['dimensions'] as $key => $dimensions)

                                  @if($key == 0)
                                        @foreach ($dimensions  as $key => $value)
                                          @if ($key == 'key' )
                                                <p class="text-base"><b> {{$value}} </b></p> 
                                          @elseif ($key == 'value' )
                                              <span class="flex justify-end text-base text-black ">{{$value}}</span>
                                          
                                          @endif
                                        @endforeach
                                  @endif

                            @endforeach
                      @else
                      No Dimensions
                      @endif
                      </li>   
                   </ul>
                 </div>
                </div>


                <div class="hidden" id="tab-settings">
                  <ul>
                  @if(count($data['compatibility']) > 0) 
                      @foreach($data['compatibility'] as $key => $compatibility)
                              @if($key == 0)
                                  @foreach ($compatibility  as $key => $value)
                                  
                                    @if( gettype($key) !== 'integer' && $key !== 'product_id' && $key !== 'id' )
                                        <li class="py-4 border-b-2 grid grid-cols-2">
                                          <p><b> {{ ucwords(Str::replace('_', ' ', $key)) }} </b></p>
                                          <span class="flex justify-end text-base text-black ">{{$value}}</span>
                                        </li>                              
                                    @endif
                                  @endforeach
                              @endif
                          
                        @endforeach
                  @else
                  <li class="py-4 border-b-2 grid grid-cols-2">
                    No Compatibility
                  </li>
                  @endif

                   </ul>
                </div>
                <div class="hidden" id="tab-options">
                  <ul>
                  @if(count($data['oe']) > 0) 
                          @foreach($data['oe'] as $key => $oe)
                            
                                @if($key == 0)    
                                      @foreach ($oe  as $key => $value)    
                                        @if( gettype($key) !== 'integer' && $key !== 'product_id' && $key !== 'id' )
                                            <li class="py-4 border-b-2 grid grid-cols-2">
                                              <p><b> {{ ucwords(Str::replace('_', ' ', $key)) }} </b></p>
                                              <span class="flex justify-end text-base text-black ">{{$value}}</span>
                                            </li>                              
                                        @endif
                                      @endforeach
                                @endif

                          @endforeach

                  @else
                  <li class="py-4 border-b-2 grid grid-cols-2">
                                              
                    No Oe Number
                  </li>
                  @endif

                   </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </div> 
   <!-- bottom tab section end -->

@endsection



