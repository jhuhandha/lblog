<?php

namespace Blog\Http\Controllers;

use Blog\Models\Categoria;
use Blog\Models\Book;

use Request;
use Validator;
use Redirect;

use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BookController extends Controller
{

    function __construct(){
        $this->middleware('auth', ['only' => ['index', 'store', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       
        $books2 = Book::with("categoria")->get();

        $var    = "Variable prueba";
        return view('books.index', compact('books2', 'var'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $categoria = Categoria::all()->lists('nombre', 'id')->toArray();
       return view('books.create', compact('categoria'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Request::all(), Book::$rules, Book::$messages);

        if (Request::hasFile('imagen')){

            if (!$validator->fails()) {

                $book=Request::all();

                $nameImage = $book["titulo"].".".Request::file('imagen')->getClientOriginalExtension();

                $destinationPath =  base_path()."/public/Upload/";

                Request::file('imagen')->move($destinationPath, $nameImage);

                $book["imagen"] = $nameImage;

                Book::create($book);

                return Redirect::to('books');

            }else{
                return Redirect::to('books/create')->withErrors($validator);
            }
        }else{
            return Redirect::to('books/create')->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       $book=Book::find($id);
       return view('books.show',compact('book'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categoria = Categoria::all()->lists('nombre', 'id')->toArray();
       $book=Book::find($id);
       return view('books.edit',compact('book','categoria'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
       //
       $bookUpdate=Request::all();
       $book=Book::find($id);
       $book->update($bookUpdate);
       return redirect('books');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       Book::find($id)->delete();
       return redirect('books');
   }
}
