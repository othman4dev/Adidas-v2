@extends('user.layoutUser')
@section('content')
<section class="hero d-flex align-items-center justify-content-around">
    <div class="textHero ">
        <h1 class="mb-3"><span>Adi</span>das</h1>
        <p class=" mb-3">make a place where everyone can work together, <br> create, find and share product in an easy and interesting way.</p>
        <div class="inputNewUser">
            <input type="email" placeholder="Subscribe With Your Email ..." class="form-control" >
        </div>
        <button type="button" class="btn butt btn-primary mt-2">Subscribe Now </button>
    </div>
    <div class="image ">
        <img src="{{ asset('user/img/WikiWorld.png') }}" style="width: 600px;" class="rounded-full"  alt="">
    </div>
</section>
<h1 class="mb-3 mt-5 ml-2 fw-bold titleSection">Our services</h1><hr>
<section class="services p-4 d-flex flex-wrap gap-4 justify-content-between align-items-center">
    <div class="card shadow" style="width: 18rem;">
        <img src="{{ asset('user/img/services.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="fw-bold card-title"><span>Free</span> Wikis</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <div class="card shadow" style="width: 18rem;">
        <img src="{{ asset('user/img/services2.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="fw-bold card-title"><span>Fast</span> Answor</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <div class="card shadow" style="width: 18rem;">
        <img src="{{ asset('user/img/services3.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="fw-bold card-title"><span>Support</span> 24/24</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
</section>
<h1 class="mb-3 mt-5 ml-2 fw-bold titleSection">Last 4 Product</h1><hr>
<section class="services p-4 d-flex flex-wrap gap-4 justify-content-between align-items-center">
    @foreach($products as $product)
    <div class="card shadow" style="width: 18rem;">
        <div class="text-center p-2 " style="width: 100%">
            <img src="{{ asset('storage/images/'.$product->imageuri) }}" style="height: 220px; width:220px" class="card-img-top" alt="...">
        </div>
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="fw-bold card-title"><span>#1</span> {{$product->name}}</h5>
            <p class="card-text" style="height: 76px; overflow: hidden">{{$product->description}}</p>
             <div class="prixinfo d-flex gap-5">
                <button class="btn btn-danger">$ {{$product->price}}</button>
                @if(session()->has('user_id'))
                <button data-bs-toggle="modal" data-bs-target="#order{{$product->id}}" class="btn btn-primary">Order Now</button>  
                @else
                <a href="/login" class="btn btn-primary">Order Now</a>  
                @endif
            </div>
            <div class="modal fade" id="order{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form action="/OrderProduct" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Product : {{$product->name}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <input type="number" required min="1" name="quantite" class="form-control" placeholder="Quantite">
                                    <input type="hidden" name="product_id " class="form-control" value="{{$product->id}}">
                                    <input type="hidden" name="price " class="form-control" value="{{$product->price}}">
                                    <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Make Your Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach
    <script>
        function orderNow(idProduct){

        }
    </script>
</section>

<h1 class="mb-3 mt-5 ml-2 fw-bold titleSection">Last 4 Category</h1><hr>
<section class="services p-4 d-flex flex-wrap gap-4 justify-content-between align-items-center">
    @foreach($categorys as $category)
    <div class="card shadow" style="width: 18rem;">
        <img src="{{ asset('user/img/category.png') }}" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="fw-bold card-title"><span>Cat : </span> {{$category->name}}</h5>
            <p class="card-text">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. </p>
        </div>
    </div>
    @endforeach
</section>
<section class="Contact shadow mt-5 p-2 mb-3 d-flex  gap-5 p-4">
    <div class="ratio ratio-16x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contctForm container d-flex justify-content-center">
        
        <form action="">
            <h5 class="h2 fw-bold card-title"><span>Contact Us </span> & Get In <span>Touch </span></h5>
            <div class="mt-3">
                <label>Your Name</label>
                <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="mt-3">
                <label>Your Email</label>
                <input type="email" class="form-control" placeholder="Your Email">
            </div>
            <div class="mt-3">
                <label>Your Subject</label>
                <input type="text" class="form-control" placeholder="Your Subject">
            </div>
            <div class="mt-3">
                <label>Your Message</label>
                <textarea class="form-control" placeholder="Your Message"></textarea>
            </div>
            <button type="button" class="btn butt btn-primary mt-2">Send Message Now </button>
        </form>
    </div>
</section>
@endsection