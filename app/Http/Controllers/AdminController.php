<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data=catagory::all();

        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data=new catagory;

        $data->catagory_name=$request->catagory;

        $data->save();

        return redirect()->back()->with('message','Catagory Added Successfully');

    }

    public function delete_catagory($id)
    {
        $data=catagory::find($id);
        $data->delete();

        return redirect()->back()->with('message','Catagory Deleted Successfully');
    }

    public function view_product()
    {
        $catagory=catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request)
    {
        $product=new product;
        $product->Product_name=$request->Product_name;

        $product->Brand=$request->Brand;

        $product->catagory=$request->catagory;

        $product->Quantity=$request->Quantity;

        $product->Cost_price=$request->Cost_price;

        $product->Sell_Price=$request->Sell_Price;

        $product->Description=$request->Description;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;

        $product->Rating=$request->Rating;

        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');


    }


    public function show_product()
    {
        $product = Product::orderBy('id', 'desc')->get(); // Orders by 'id' in descending order
        return view('admin.show_product', compact('product'));
    }


    public function delete_product($id)
    {

        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');


    }

    public function update_product($id)
    {

        $product=product::find($id);

        $catagory=catagory::all();

        return view('admin.update_product',compact('product','catagory'));
    }
    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);

        $product->Product_name=$request->Product_name;

        $product->Brand=$request->Brand;

        $product->catagory=$request->catagory;

        $product->Quantity=$request->Quantity;

        $product->Cost_price=$request->Cost_price;

        $product->Sell_Price=$request->Sell_Price;

        $product->Description=$request->Description;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;

        }



        $product->Rating=$request->Rating;

        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully');

    }
}
