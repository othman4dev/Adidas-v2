@extends('user.layoutUser')
@section('content')
<div class="container pt-4">
    <div id="allProducts"  style="min-width: 600px; " class="d-flex flex-wrap gap-4 justify-content-between align-items-center">
        @if(!isset($sales[0]))
        <div class="d-flex justify-content-center w-100 h2 text-secondary fw-bold">
            Not Order Yet !!!
        </div>
        @else
        
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                <tr>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Quantite</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <form action="/Payment" method="POST">
                        @csrf
                    @php
                    $total = 0;
                    @endphp
                    @foreach($sales as $sale)
                    @php
                    if($sale->status != "completed")
                    $total += $sale->quantite * $sale->price;
                    
                    @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/images/'.$sale->product->imageuri) }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                <p class="fw-bold mb-1">{{$sale->product->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($sale->status == 'pending')
                            <p class="fw-normal mb-1 text-warning">{{$sale->status}} </p>
                            @else
                            <p class="fw-normal mb-1 text-success">{{$sale->status}} </p>
                            @endif
                        </td>
                        <td>
                            <p class="fw-normal mb-1">$ {{$sale->price}} </p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"> {{$sale->quantite}} </p>
                        </td>
                        <td colspan="2">
                            <p class="fw-normal mb-1 fw-bold">$ {{$sale->quantite * $sale->price}} </p>
                        </td>
                    </tr>
                    <input type="hidden" name="sale_id[]" value=" {{$sale->id}}">
                @endforeach
                <tr>
                    <td colspan="4" class="fw-bold text-secondary">Total Payment</td>
                    <td  class="fw-normal mb-1 fw-bold">$ {{ $total}}</td>
                    <input type="hidden" name="totlaPayment" value="{{$total}}">
                    <td>
                        @if($total != 0)
                        <button type="submit" class="btn btn-primary">
                            Paiement
                        </button>
                        @endif
                    </td>
                </tr>
                </tbody>
                </form>
            </table>
        
        @endif
    </div>
    <div class="pt-4 mt-2">
        {{-- {{$products->links()}} --}}
    </div>
</div>

@endsection