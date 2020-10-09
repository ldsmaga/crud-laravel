@extends('products.master')

@section('content')

    <div class="container my-3">

    @if (!empty($product))
    <table class="table table-striped table-hover">
        <thead class='bg-primary text-white'>
        <td>Descrição</td>
        <td>Preço</td>
        </thead>
        @foreach ($product as $prod)
        <h1><strong>{{$prod->name}}</strong></h1>
        <tr>
        <td>{{$prod->description}}</td>
        <td>R$ {{number_format($prod->price, 2, ",", ".")}}</td>
    </tr>
    @endforeach
        </thead>
    </table>
<a href="{{url('/products')}}"><button type="button" class="btn btn-light">Voltar</button></a>
@endif
</div>

@endsection