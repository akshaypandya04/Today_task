<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth,DB;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      public function index()
    {
        $products=Product::where('created_by', Auth::user()->id)->get();
        $category = DB::table('categories')->get();
        return view('products.index',compact('products','category'));
    }

 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
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
            'name'=>'required',
            'category_id'=>'required',
            'qty'=>'required',
            'price'=>'required'
            ]);

                $products = new Product;
                $products->name = $request->name;
                $products->price = $request->price;
                $products->qty = $request->qty;
                $products->category_id = $request->category_id;
                $products->created_by = Auth::user()->id;
                $products->save();


                return redirect()->back()
                    ->with('success', 'Product add Successfully');
    }                


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $products = Product::find($id);
        $category = DB::table('categories')->get();
        return view('products.edit',compact('products','category'));
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
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'qty'=>'required',
            'price'=>'required'
        ]);

               $products = Product::find($id);

               $products->name = $request->name;
                $products->price = $request->price;
                $products->qty = $request->qty;
                $products->category_id = $request->category_id;
                $products->created_by = Auth::user()->id;
                $products->save();


       return redirect()->route('products.index')
                        ->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
      public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Product Deleted Successfully');
    }


    public function restoreDeleted($id) 
    {

        $user = Product::where('id', $id)->withTrashed()->first();

        $user->restore();

         return redirect()->back()
            ->with('success', 'You successfully restored the user');
    }

   
     public function deletePermanently($id)
    {
        $user = Product::where('id', $id)->withTrashed()->first();

        $user->forceDelete();

         return redirect()->back()
            ->with('success', 'You successfully deleted the user from the Recycle Bin');

    }

     
   

   
}
