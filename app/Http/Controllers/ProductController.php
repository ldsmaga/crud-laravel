<?php

namespace CrudLaravel\Http\Controllers;

use Illuminate\Http\Request;
use CrudLaravel\Http\Controllers\Controller;
use CrudLaravel\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Product::all();
        return view('products.index')->with('content', $content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validação dos dados que estão sendo enviados:

        $rules = [
            'price' => 'required|numeric' ,
            'name' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'required' => 'Por favor, preencha todo o formulário.',
            'numeric' => 'Insira um valor numérico para o preço.'
        ];

        $this->validate($request, $rules, $messages);

        $productSlug = $this->setName($request->name);

        $product = [
            'name' => $request->name,
            'price' => $request->price,
            'url_name' => $productSlug,
            'description' => $request->description
        ];

        Product::create($product);

        return redirect()->action('ProductController@index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $product = Product::where('url_name', $name)->get();

        if (!empty($product)) {
            return view('products.show')->with('product', $product);
        } else {
            return redirect()->action('ProductController@index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $product = Product::where('url_name', $name)->get();

        if (!empty($product)) {
            return view('products.edit')->with('product', $product);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validação dos dados que estão sendo enviados:

        $rules = [
            'price' => 'required|numeric' ,
            'name' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'required' => 'Por favor, preencha todo o formulário.',
            'numeric' => 'Insira um valor numérico para o preço.'
        ];

        $this->validate($request, $rules, $messages);

        $productSlug = $this->setName($request->name);

        $product = Product::find($id);

        $product->description = $request->description;
        $product->url_name = $productSlug;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return redirect()->action('ProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->get();

        if (!empty($product)) {
            Product::destroy($id);
        }

        return redirect()->action('ProductController@index');
    }

    //Função para formatar o nome do produto, para utilizar como URL amigável
    private function setName($name)
    {
        $propertySlug = Str::slug($name);

        $products = Product::all();

        $t = 0;

        foreach ($products as $product) {
            if (Str::slug($product->name) === $propertySlug) {
                $t++;
            }
        }

        if ($t > 0) {
            $propertySlug = $propertySlug . '-' . $t;
        }

        return $propertySlug;
    }
}