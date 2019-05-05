@extends('layouts.app')

@section('content')

  <style>
    .like-btn1{
      width: 40px;
      height: 40px;
      background-color: #FD6D24;
      text-decoration: none;
      position: absolute;
      right: 10px;
      top: 10px;
      border-radius: 50%;
      padding: 7px;
      font-size: 20px;
      // text-shadow: 0 0 10px #000;
      z-index: 2;
      border: none;
      color: #fff;
      outline: none;
      transition: all ease 0.4s;
    
    }
    .like-btn1 .fa{
      transition: all ease 0.4s;
    }
    .liked {
      background: #fff;
    }
    .liked .fa{
      color: #FD6D24;
    }
  </style>
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<div class="container-fluid">
    <!-- header -->
    <div class="row header" id="header">
      <div class="col-md-6 col-sm-6">
        <div class="row">
          <div class="header-title">
            <div class="header-block">
              <h1>Choosing <br> quality food.</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, optio. </p>
              <a class="header-btn" href='#food'>Explore All <span>&#8250;</span></a>
            </div>
          </div>
        </div>
        <div class="social-block">
          <ul>
            <li><a href=""><i class="fab fa-facebook"></i></a></li>
            <li><a href=""><i class="fab fa-instagram"></i></a></li>
            <li><a href=""><i class="fab fa-telegram"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="row">
          <div class="header-image"></div>
        </div>
      </div>
    </div>


    <!-- popular food section -->
    <div class="row popular-foods" id="food">
      <div class="col-md-12 nopadding">
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-md-9">
              <h5 class="popular-foods-title">Discover</h5>
              <h1>Our Featured Food</h1>
            </div>
            <div class="col-md-3">
              <p class="allFoodBtn"><a id="menuBtn" href="#menu"> See All Foods</p></a> 
            </div>
          </div>
          <div class="row popular-foods-tabs">
            @if(count($foodtype) > 0)
            <div class="col-md-6">
              <h5>Popular foods</h5>
              <div class="row">
              	@foreach($foodtype as $ft)
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="food-tabs">
                    <div class="tabs-overlay"></div>
                    <img src="/storage/images/{{$ft->image}}" alt="">
                    <a name="forms">
                    <a name="csrf-field">
                    <form {{-- id="myForm" --}} action="/like" method="POST">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="id" id="id" value="{{$ft->id}}">
                      @php
                        $liked = '';
                        if($ft->liked)
                          $liked = 'liked';
                      @endphp
                      <button class="{{$liked}} like-btn button-like{{$ft->id}}">

                        <i class="fa fa-heart"></i>
                      </button>          
                    </form>
                    </a>
                  </a>
                    <div class="food-desc">
                      <h4 class="food-name">{{$ft->name}}</h4>
                      <p class="food-type">{{$ft->nationality}} food</p>
                      <button type="button" data-toggle="modal" data-target="#food{{$ft->id}}" class="seeMore">Read more...</button>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endif
            @if(count($saladtype) > 0)
            <div class="col-md-6">
              <h5>Popular salads</h5>
              <div class="row">
              	@foreach($saladtype as $ft)
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="food-tabs">
                    <div class="tabs-overlay"></div>
                    <img src="/storage/images/{{$ft->image}}" alt="">
                    <a name="forms">
                    <a name="csrf-field">
                    <form {{-- id="myForm" --}} action="/like" method="POST">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="id" id="id" value="{{$ft->id}}">
                      @php
                        $liked = '';
                        if($ft->liked)
                          $liked = 'liked';
                      @endphp
                      <button class="{{$liked}} like-btn button-like{{$ft->id}}">

                        <i class="fa fa-heart"></i>
                      </button>          
                    </form>
                    </a>
                  </a>
                    <div class="food-desc">
                      <h4 class="food-name">{{$ft->name}}</h4>
                      <p class="food-type">{{$ft->nationality}} food</p>
                      <button type="button" data-toggle="modal" data-target="#food{{$ft->id}}" class="seeMore">Read more...</button>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endif
            @if(count($snacktype) > 0) 
            <div class="col-md-6">
              <h5>Popular snacks</h5>
              <div class="row">
              	@foreach($snacktype as $ft)
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="food-tabs">
                    <div class="tabs-overlay"></div>
                    <img src="/storage/images/{{$ft->image}}" alt="">
                    <a name="forms">
                    <a name="csrf-field">
                    <form {{-- id="myForm" --}} action="/like" method="POST">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="id" id="id" value="{{$ft->id}}">
                      @php
                        $liked = '';
                        if($ft->liked)
                          $liked = 'liked';
                      @endphp
                      <button class="{{$liked}} like-btn button-like{{$ft->id}}">

                        <i class="fa fa-heart"></i>
                      </button>          
                    </form>
                    </a>
                  </a>
                  <div class="food-desc">
                      <h4 class="food-name">{{$ft->name}}</h4>
                      <p class="food-type">{{$ft->nationality}} food</p>
                      <button type="button" data-toggle="modal" data-target="#food{{$ft->id}}" class="seeMore">Read more...</button>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endif
            @if(count($desserttype) > 0)
            <div class="col-md-6">
              <h5>Popular Desserts</h5>
              <div class="row">
              	@foreach($desserttype as $ft)
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="food-tabs">
                    <div class="tabs-overlay"></div>
                    <img src="/storage/images/{{$ft->image}}" alt="">
                    <a name="forms">
                    <a name="csrf-field">
                    <form {{-- id="myForm" --}} action="/like" method="POST">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="id" id="id" value="{{$ft->id}}">
                      @php
                        $liked = '';
                        if($ft->liked)
                          $liked = 'liked';
                      @endphp
                      <button class="{{$liked}} like-btn button-like{{$ft->id}}">
                        <i class="fa fa-heart"></i>
                      </button>          
                    </form>
                    </a>
                  </a>
                  <div class="food-desc">
                      <h4 class="food-name">{{$ft->name}}</h4>
                      <p class="food-type">{{$ft->nationality}} food</p>
                      <button type="button" data-toggle="modal" data-target="#food{{$ft->id}}" class="seeMore">Read more...</button>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @endif


          </div>
        </div>
      </div>
    </div>

    <!-- about section -->
    <div class="row about" id="about">
      <div class="col-md-9 offset-md-1">
        <div class="row">
          <div class="col-md-6">
            <img src="data/images/about.jpg" alt="about-img">
          </div>
          <div class="col-md-6">
            <div class="about-block">
              <h3 class="my-4">Welcome</h3>
              <h1 class="mb-5">
                <strong>About <br> Restaurant booking </strong>
              </h1>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Accusamus non deserunt asperiores harum cupiditate perferendis nisi id dicta sed commodi 
                eaque nemo veniam suscipit, sit reiciendis ab, excepturi quo iure!Pariatur voluptatibus non 
              </p>
              <p class="my-5">
                <a class="about-btn" href='#menu'>Explore All <span>&#8250;</span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- menu section -->
    <div class="row menu" id="menu">
      <div class="col-md-10 offset-md-1">
        <h3 class="text-center">Menu</h3>
        <div class="menu-filter d-flex justify-content-center">
          <ul id="filterOptions">
            <li><button type="button" class="all activeFood">All</a></li>
            <li><button type="button" class="food">Food</a></li>
            <li><button type="button" class="salad">Salad</a></li>
            <li><button type="button" class="snack">Snack</a></li>
            <li><button type="button" class="dessert">Dessert</a></li>
          </ul>
        </div>
        <div id="ourHolder">
          <div class="row">
          	@foreach($menu as $m)
            <div class="item {{$m->type}} col-md-4 col-sm-4 col-xs-4">
              <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img src="/storage/images/{{$m->image}}" class="card-img">
                  </div>
                  <a name="forms">
                    <a name="csrf-field">
                    <form {{-- id="myForm" --}} action="/like" method="POST">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="id" id="id" value="{{$m->id}}">
                      @php
                        $liked = '';
                        if($m->liked)
                          $liked = 'liked';
                      @endphp
                      <button class="{{$liked}} like-btn1 button-like{{$m->id}}" id="ajaxSubmit{{$m->id}}">
                        <i class="fa fa-heart"></i>
                      </button>          
                    </form>
                    </a>
                  </a>
                    
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title mb-3">{{$m->name}}</h5>
                      <p class="card-text">{{$m->nationality}} food</p>
                      <h4 class="my-4 card-price">{{$m->price}} sum</h4>
                      <button type="button" data-toggle="modal" data-target="#food{{$m->id}}" class="seeMore">See more</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            {{$menu->links()}}
          </div>
        </div>
      </div>
    </div>

    <!-- booking section -->
    <div class="row booking" id="book">
      <div class="col-md-8 offset-md-2">
        <div class="booking-block">
          <h5 class="text-center my-3">Table</h5>
          <h2 class="text-center my-4">Book A Table</h2>
          <a name="forms">
          <a name="csrf-field">
    
          <form action="/bookings" method="POST">
          	@csrf
            @method('POST')
            <div class="col-md-8 offset-md-2 my-5">
              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 my-3">
                  <label for="date">Date <i class="fas fa-angle-down"></i></label>
                  <input type="text" class="form-control" id="date"   data-inputmask="'alias': 'date'" name="date" required>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 my-3">
                  <label for="time">Time <i class="fas fa-angle-down"></i></label>
                  <input type="text" class="form-control" id="endTime" placeholder="12:00" name="time" required>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 my-3">
                  <label for="guests">Guests <i class="fas fa-angle-down"></i></label>
                  <input type="text" class="form-control" id="guests" placeholder="Guest number" name="guests" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="book-btn mt-5" type="submit">Check availability</button>
                </div>
              </div>
            </div>
          </form>
        </a>
      </a>
        </div>
      </div>
    </div>

    <!-- contact us section -->
    <div class="row contact" id="contact">
      <div class="col-md-12">
        <h4 class="text-center">Get in Touch</h4>
        <h2 class="text-center my-3">You can send us a message</h2>

	
  
    <a name="forms">
      <a name="csrf-field">
          <form action="/messages" method="POST">
          @csrf
      @method('POST')

        <div class="row mt-5">
          <div class="col-md-4 offset-md-2">
              <input type="text" class="form-control" name="name" required placeholder="Enter name">
            <div class="row my-3">
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <input type="email" class="form-control" name="email"id="email" required placeholder="Email">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <input type="phone" class="form-control" id="phone" name="phone" required placeholder="Phone number">
              </div>
            </div>
            <div class="my-3">
              <textarea id="message" class="form-control" name="body" placeholder="Message"></textarea>
            </div>
          </div>
          <div class="col-md-4 offset-xs-1">
            <div class="mapBody" style="height: 210px;">
                <div id="map" style="height: 100%; width: 100%;"></div>
              </div>
            </div>
          </div>
          <div class="row my-3">
            <button type="submit" class="contact-btn">Send</button>
          </div>
        </form>
		    </a>
		</a>
      </div>
    </div>
  </div>

{{-- {{dd($foodtype)}} --}}

@foreach($foods as $food)
   <!-- The Modal -->
  <div class="modal fade" id="food{{$food->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{$food->name}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5">
              <img src="/storage/images/{{$food->image}}" alt="">
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <h3>{{$food->name}}</h3>
                  <p>{{$food->nationality}} cuisine</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <span><i class="fa fa-heart"></i> {{$food->likesCount}} people liked it</span>
                </div>
              </div>
              <p>Ingredients:</p>
              <p>{{$food->ingredients}}</p>
              <h3 class="text-right m-3">{{$food->price}} sum</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 commentInputBlock">

            <a name="forms">
              <a name="csrf-field">
              <form action="/comments" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="food_id" value="{{$food->id}}">
                <textarea class="commentInput" name="body" id="" placeholder="Leave your comment"></textarea>
                <button class="commentBtn">Comment</button>
              </form>
            </a>
          </a>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12 commentsBlock">
              <h4 class="mb-3">Comments:</h4>
              @foreach($food->comments as $comment)
              <div class="row m-3">
                <div class="col-xs-3">
                    <img src="storage/images/{{$comment->user->avatar}}" alt="">
                </div>
                <div class="col-xs-9">
                  <h5 class="my-2">{{$comment->user->name}}</h5>
                  <p class="my-3">{{$comment->body}}</p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
@endforeach
<script type="text/javascript">
  $(function() {
  @foreach($foods as $food)
    $('.button-like{{$food->id}}')
      .bind('click', function(event) {
        $(".button-like{{$food->id}}").toggleClass("liked");
      })
    @endforeach
  });


  
ymaps.ready(init);

function init() {
  var myMap = new ymaps.Map("map", {
    center: [41.338651, 69.334776],
    zoom: 16,
    controls: ['searchControl', 'zoomControl']
  }, {
      searchControlProvider: 'yandex#search',
  }),
  
  // Создаем геообъект с типом геометрии "Точка".
  myGeoObject = new ymaps.GeoObject({
    // Описание геометрии.
    geometry: {
      type: "Point",
      coordinates: [41.338651, 69.334776]
      },
    }, {
      // Опции.
      // Иконка метки будет растягиваться под размер ее содержимого.
      preset: 'islands#redDotIcon',
      // Метку можно перемещать.
      draggable: false
    });
    myMap.geoObjects.add(myGeoObject);
    myMap.behaviors.disable('scrollZoom'); 
    myMap.behaviors.disable('drag');
    myMap.events.remove('click');
}
</script>

@endsection
