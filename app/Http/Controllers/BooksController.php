<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Books;
use App\Models\Rent;
use App\Models\Rents;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data['books'] = Books::all();
        //$data['users'] = Users::all();

        return view('book.list', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $bookId)
    {
        $request->validate([
            'user' => 'required'
        ]);
        foreach ($request->user as $user) {
            $rent = new Rent;
            $rent->book_id = $book;
            $rent->user_id = $user;
            $rent->save();
        }
        
        return redirect()->back();
        
        }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books, $bookId)
    {
        $data['book']= Books::find($bookId);
        $data['users'] = Users::all();
        $data['rents'] = Rents::where('book_id', $bookId)->get();
        //$data['books'] = Books::find($bookId);
        return view('book.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
