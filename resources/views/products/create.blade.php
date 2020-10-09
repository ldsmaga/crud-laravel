@extends('products.master')

@section('content')

<div class="container my-3">

<h1>Cadastrar Produto</h1>

<!-- DISPLAY DOS ERROS DE VALIDAÇÃO BACK-END -->
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

<!-- FORMULÁRIO COM O ACTION PARA A FUNÇÃO STORE, MÉTODO POST -->
<form action="{{url('/products')}}" method="post">

<!-- VALIDAÇÃO CROSS-SITE REQUEST FORGERY --> 
@csrf

<div class="form-group">
    <label for="description">Nome do Produto:</label>
    <input type="text" name="name" id="name" cols="30" rows="10" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="description">Descrição do Produto:</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
    </div>

    <div class="form-group">
    <label for="rental_price">Preço (R$):</label>
    <input type="number" name="price" id="price" class="form-control" required>
    </div>

    <button class="btn btn-primary" type="submit">Cadastrar</button>
    <a href="{{url('/products')}}"><button type="button" class="btn btn-light">Voltar</button></a>

    </form>
</div>

@endsection