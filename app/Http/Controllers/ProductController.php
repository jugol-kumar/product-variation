<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\Size;
use App\Models\Sku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{
    public $success = "this is success";

    public function allProduct(){
        return view('product.all-product')->with(["products" => Product::all()]);
    }

    public function singleProduct($id){
        $product = Product::findOrFail($id);
        return view('product.single-product')->with(['product' => $product]);
    }

    public function singleProductColor($id){
        $color = Color::with('sizes')->with('images')->where('id', $id)->first();
        return response()->json(
           $color
        );

    }
    public function singleProductSize($id){
        $size = Size::with('colors')->where('id', $id)->first();
        return response()->json(
            $size
        );
    }

    // very important point
    // add product function with variation.

    public function addProductWithVariation(Request $request){
        $product_id = Product::create([
            'title' => $request->title
        ]);
        foreach ($request->get('color') as $k => $color) {

//            if(!isset($color[0])){
//                dd($color);
//            };

            $colorModel = Color::create([
                'product_id' => $product_id->id,
                'color_code' => !isset($color[0]) ? 'null' : $color[0],
            ]);

            $attribute = [];
            foreach($color['sku'] as $key => $sku) {
                $attribute[] = [
                    'sku' => $sku,
                    'price' => $color['price'][$key],
                    'size' => $color['size'][$key],
                    'qty' => $color['qty'][$key],
                ];
            }
            $colorModel->sizes()->createMany($attribute);

            $images = [];
            foreach ($request->file('color') as $key=>$image){
                foreach ($image as $key=>$img){
                    $images[] =[
                        'image' =>$img
                    ];
                }
            }

            $imageName = [];
            foreach ($images[$k]['image'] as $key=>$sImage){
                $ext = $sImage->getClientOriginalExtension();
                $fullName =  time().random_int(1, 1000).'.'.$ext;
                $imageName[] = [
                    'image' => $fullName
                ];
                $sImage->storeAs('public/product', $fullName);
            }
            $colorModel->images()->createMany($imageName);
        }
    }










}
