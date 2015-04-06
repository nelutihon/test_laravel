<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Session;
use App\Product;
use App\Category;

class ProductController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        return view( 'product.index' )->with( 'products', Product::all() );
    }

    /**
     *
     * @return Response
     */
    public function create() {
        return view( 'product.create' )->with( 'categories', Category::lists( 'category', 'id' ) );
    }

    /**
     *
     * @return Response
     */
    public function store() {
        $rules = array(
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
        );
        $validator = Validator::make( Input::all(), $rules );

        if ( $validator->fails() ) {
            return Redirect::to( 'product/create' )
                            ->withErrors( $validator );
        } else {
            $product = new Product;
            $product->product_name = Input::get( 'product_name' );
            $product->product_price = Input::get( 'product_price' );
            $product->category_id = Input::get( 'category_id' );
            $product->save();

            Session::flash( 'message', 'Product created!' );
            return Redirect::to( 'product' );
        }
    }

    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function show( $id ) {
        try {
            $product = \App\Product::findOrFail( $id );
            return view( 'product.show' )->with( compact( 'product') );
        } catch ( ModelNotFoundException $e ) {
            return (new Response( json_encode( ['success' => false ] ), 404 ) );
        }
    }

    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function edit( $id ) {
        try {
            $product = \App\Product::findOrFail( $id );
            $categories = Category::lists( 'category', 'id' );
            return view( 'product.edit' )->with( compact( 'product', 'categories' ) );
        } catch ( ModelNotFoundException $e ) {
            return Redirect::route( 'product.index' );
        }
    }

    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function update( $id ) {

        $rules = array(
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
        );
        $validator = Validator::make( Input::all(), $rules );

        if ( $validator->fails() ) {
            return Redirect::to( 'product/' . $id . '/edit' )
                            ->withErrors( $validator );
        } else {
            try {
                $product = \App\Product::findOrFail( $id );
                $product->product_name = Input::get( 'product_name' );
                $product->product_price = Input::get( 'product_price' );
                $product->category_id = Input::get( 'category_id' );
                $product->save();
                return Redirect::route( 'product.index' )->with( 'message', 'Product updated.' );
            } catch ( ModelNotFoundException $e ) {
                return Redirect::route( 'product.index' )->with( 'message', 'Update Failed.' );
            }
        }
    }

    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy( $id ) {
        try {
            $product = \App\Product::findOrFail( $id );
            $product->delete();
            return (new Response( json_encode( ['success' => true ] ), 200 ) );
        } catch ( ModelNotFoundException $e ) {
            return (new Response( json_encode( ['success' => false ] ), 404 ) );
        }
    }

}
