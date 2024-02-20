@extends('user.layoutUser')
@section('content')
<div class="container row pt-4">
    <section class="flter col-3" style="min-width: 250px;">
        <h4 class="fw-bold text-secondary">Filter : </h4>
        <h5 class="fw-bold text-secondary pt-4">Search : </h5>
        <input type="search" onkeyup="search()" name="search" id="search" class="form-control" style="width: 90%" placeholder="search">
        <h5 class="fw-bold text-secondary pt-4">Category : </h5>
        <section class="d-flex flex-column gap-4">
            <label for="Check d-flex gap-1">
                <div class="form-check">
                    <input class="form-check-input" onclick="filter('all')" type="radio" name="category_id" id="exampleRadios1" >
                    <label class="form-check-label" for="exampleRadios1">
                        All Product
                    </label>
                </div>
            </label>
            @foreach($categorys as $category)
            <label for="Check d-flex gap-1">
                <div class="form-check">
                    <input class="form-check-input" onclick="filter({{$category->id}})" type="radio" name="category_id" id="exampleRadios1" >
                    <label class="form-check-label" for="exampleRadios1">
                        {{$category->name}}
                    </label>
                </div>
            </label>
            @endforeach
        </section>
        <section class="mt-3 pt-4 pe-3">
            <h5 class="fw-bold text-secondary">Price : </h5>
            <input type="range" class="form-range" onchange="filterPrice()" value="0" min="0" max="100" id="minrange">
            <input type="range" class="form-range" onchange="filterPrice()" value="5000" min="100" max="5000" id="maxrange">
            <div class="d-flex align-items-center justify-content-between">
                <input type="number" readonly id="minrang" class="p-2 border rounded-1 text-secondary fw-bold w-50" value="0">
                <input type="number" readonly id="maxrang" class="p-2 border rounded-1 text-secondary fw-bold w-50" value="5001"> 
            </div>
        </section>
        <script>
            const min = document.getElementById('minrange');
            const max = document.getElementById('maxrange');
            const minspan = document.getElementById('minrang');
            const maxspan = document.getElementById('maxrang');
            min.addEventListener('input', function() {
                minspan.value = this.value;
            });
            max.addEventListener('input', function() {
                maxspan.value = this.value;
            });
        </script>
    </section>
    <section class="col-9">
        <div id="allProducts"  style="min-width: 600px; " class="d-flex flex-wrap gap-4 justify-content-between align-items-center">
            @if(!isset($products[0]))
            <div class="d-flex justify-content-center w-100 h2 text-secondary fw-bold">
                Product Not Match With Your Search !!!
            </div>
            
            @else
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
                                            <input type="hidden" name="product_id" class="form-control" value="{{$product->id}}">
                                            <input type="hidden" name="price" class="form-control" value="{{$product->price}}">
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
            @endif
        </div>
        <div class="pt-4 mt-2">
            {{$products->links()}}
        </div>
       
    </section>  
    <style>
        .flter{
            position: sticky !important;
            top: 130px !important;
        }   
        #allProducts::-webkit-scrollbar{
            display: none !important
        }
        #allProducts{
            height: 75vh !important;
            overflow-y: scroll !important;
        } 
    </style>  
    <script>
        function filterPrice(){
            var minValue = document.getElementById('minrange').value;
            var maxValue = document.getElementById('maxrange').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("allProducts").innerHTML = xhttp.responseText;
                }
            };
            var url = '/SearchProductPrice/'+minValue+"-"+maxValue;          
            xhttp.open("GET", url, true);
            xhttp.send(); 
        }
        function search(){
            var valueInput = document.getElementById('search').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("allProducts").innerHTML = xhttp.responseText;
                }
            };
            if(valueInput==''){
                var url = '/SearchProduct/AllProductSearch';
            }
            else {
                var url = '/SearchProduct/'+valueInput;
            }
           
            xhttp.open("GET", url, true);
            xhttp.send();  
        }
        function filter(idCategory){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("allProducts").innerHTML = xhttp.responseText;
                }
            };
            if(idCategory == 'all') var url = '/FilterProduct/All';
            else var url = '/FilterProduct/'+idCategory;
            
            xhttp.open("GET", url, true);
            xhttp.send();  
        }
        
    </script>
</div>

@endsection