@extends('products.master')

@section('content')
    
@php
//Sobrescreve a variavel product com o valor que está no índice 0, o objeto em si, para poder acessar como um objeto
$product = $product[0];
@endphp

<form action="{{url('/products', ['id' => $product->id])}}" method="post">

@csrf

@method("PUT")

<div class="container my-3">
<h1>Editar Produto :: {{$product->name}}</h1>

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

    <div class="form-group">
    <label for="name">Nome do Produto</label>
    <input type="text" name="name" id="name"  value="{{$product->name}}" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{$product->description}}</textarea>
    </div>

    <div class="form-group">
    <label for="price">Preço (R$)</label>
    <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control" required>
    </div>

    <button class="btn btn-primary" type="submit">Atualizar</button>
    <a href="{{url('/products')}}"><button type="button" class="btn btn-light">Voltar</button></a>

    </form>
</div>

@endsection