@extends('products.master')

@section('content')
    
<div class="container my-3">
    <h1>Produtos</h1>

    @if (!empty($content))
    <table class="table table-striped table-hover">
    <thead class='bg-primary text-white'>
        <td>Título</td>
        <td>Preço</td>
        <td>Ações</td>
        <td>Remover</td>
    </thead>

    @foreach ($content as $product)
    <tr>
    <td>{{$product->name}}</td>
    <td>R$ {{number_format($product->price, 2, ",", ".")}} </td>
    <td>
    <a href='{{url('/products/' . $product->url_name)}}'> Ver Mais</a> | 
    <a href='{{url('/products/' . $product->url_name)}}/edit'>Editar</a>
    </td>
    <td>
    <form action="{{route('products.destroy', $product->id)}}" method="POST">
        @csrf
        @method("DELETE")
        <button class="btn btn-danger" type="submit">Remover</button>
        </form>
    </td>
    </tr>
    @endforeach

    </table>

    @endif

</div>

@endsection