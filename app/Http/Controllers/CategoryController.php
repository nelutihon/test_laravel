<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use App\Category;

class CategoryController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        return view( 'category.index' )->with( 'categories', Category::all() );
    }

    /**
     *
     * @return Response
     */
    public function create() {
        return view( 'category.create' );
    }

    /**
     *
     * @return Response
     */
    public function store() {
        $rules = array(
            'category' => 'required',
        );
        $validator = Validator::make( Input::all(), $rules );

        if ( $validator->fails() ) {
            return Redirect::to( 'category/create' )
                            ->withErrors( $validator );
        } else {
            $category = new Category;
            $category->category = Input::get( 'category' );
            $category->save();

            Session::flash( 'message', 'Category created!' );
            return Redirect::to( 'category' );
        }
    }

    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function show( $id ) {
        try {
            $category = \App\Category::findOrFail( $id );
            return view( 'category.show' )->with( 'category', $category );
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
            $category = \App\Category::findOrFail( $id );
            return view( 'category.edit' )->with( 'category', $category );
        } catch ( ModelNotFoundException $e ) {
            return Redirect::route( 'category.index' );
        }
    }

    /**
     *
     * @param  int  $id
     * @return Response
     */
    public function update( $id ) {

        $rules = array(
            'category' => 'required',
        );
        $validator = Validator::make( Input::all(), $rules );

        if ( $validator->fails() ) {
            return Redirect::to( 'category/' . $id . '/edit' )
                            ->withErrors( $validator );
        } else {
            try {
                $category = \App\Category::findOrFail( $id );
                $category->category = Input::get( 'category' );
                $category->save();
                return Redirect::route( 'category.index' )->with( 'message', 'Category updated.' );
            } catch ( ModelNotFoundException $e ) {
                return Redirect::route( 'category.index' )->with( 'message', 'Update failed.' );
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
            $category = \App\Category::findOrFail( $id );
            $category->delete();
            return (new Response( json_encode( ['success' => true ] ), 200 ) );
        } catch ( ModelNotFoundException $e ) {
            return (new Response( json_encode( ['success' => false ] ), 204 ) );
        }


        
    }

}
