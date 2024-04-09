<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       


        //$data = product::latest()->paginate(5);
        $data=product::simplePaginate(5);


        return view('index', compact('data'));
    }
     public function searchdata(Request $request)
    {
     
        $data = product::select("*")
                    ->where('title', 'LIKE', '%'. $request->get('query'). '%')->orWhere('author', 'LIKE', '%'. $request->get('query'). '%')
                    ->get();
     echo "<pre>";
     print_r($data);exit;


          return view('searchdata', compact('data'));
    }

 
     public function autocomplete(Request $request)
    {
     
         $data = product::select("*")
                    ->where('title', 'LIKE', '%'. $request->get('query'). '%')->orWhere('author', 'LIKE', '%'. $request->get('query'). '%')
                    ->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            
        ]);
        
        product::create($request->post());

        return redirect()->route('product.index')->with('success','product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            
        ]);
        
        $product->fill($request->post())->save();

        return redirect()->route('product.index')->with('success','Product Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
         $product->delete();
        return redirect()->route('product.index')->with('success','product has been deleted successfully');
    }
}
