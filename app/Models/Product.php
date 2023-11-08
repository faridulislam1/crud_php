<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product,$image,$imageNewName,$directory,$imgUrl;
    public static function saveProduct($request){
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->category_name = $request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->description = $request->description;

        if($request->file('image')){
            self::$product->image = self::saveImage($request);


        }
        self::$product->save();
    }

      private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName='stu-'.rand().'.' .self::$image->getClientOriginalExtension();
        self::$directory='admin-asset/product-image/product/';
        self::$imgUrl= self::$directory.self::$imageNewName;
        self::$image->move( self::$directory,self::$imageNewName);

        return  self::$imgUrl;
    }
      public static function deleteProduct($id){
        self::$product=Product::find($id);
        self::$product->delete();

    }
      public static  function productUpdate($request){
        self::$product=Product::find($request->id);

        self::$product->name = $request->name;
        self::$product->category_name = $request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->description = $request->description;

        if( $request->file('image')){
            if(  self::$product->image){
                if(file_exists(  self::$product->image)){
                    unlink(  self::$product->image);
                    self::$product->image =self::saveImage($request);

                }}
            else{
                self::$product->image =self::saveImage($request);
           }

        }
        self::$product->save();



    }


}
