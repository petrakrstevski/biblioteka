<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Books;
use App\Models\Rent;
use App\Models\Rents;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = Users::all();
        return view('user.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $userId)
     { 
            $request->validate([
            'book' => 'required'
        ]);
        foreach ($request->book as $book) {
            $rent = new Rent;
            $rent->book_id = $book;
            $rent->user_id = $userId;
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
    public function show($userId)
    {
        $data['users'] = Users::find($userId);
        $data['rents'] = Rents::where('user_id', $userId)->get();
        $data['books'] = Books::all();
        return view('user.show', $data);
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
        $request->validate([       
            'return_date'=>'required|date'    
       ]);
  
      Rent::find($id)->update($request->all());
  
      return redirect()->back()->with('message', 'You have successfully updated the rent');
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
