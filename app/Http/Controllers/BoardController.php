<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BoardController extends Controller
{

    ####################################################################################################################
    ##
    ## >>  Method : View
    ##
    ####################################################################################################################

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function list()
    {
        $model = new Board();

        $view = view('board.list',[
            'boards' => $model->dataList(),
        ]);



        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $view = view('board.create');

        return $view;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function detail($id)
    {

        $model = new Board();
        $board = $model->find($id);



        return view('board.detail',['board'=>$board]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        //
    }

    ####################################################################################################################
    ##
    ## >>  Method : Proc
    ##
    ####################################################################################################################


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $model = new Board();
        $user = Auth::user();
        $model->writer = $user->name;
        $model->subject = $request->input('subject');
        $model->contents = $request->input('contents');
        $model->save();

        return redirect()->route('board.list');
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
    public function delete($id)
    {
        //
    }


//    ####################################################################################################################
//    ##
//    ## >>  Method : Data
//    ##
//    ####################################################################################################################
//    /**
//     *
//     * -----------------------------------------------------------------------------------------------------------------
//     * @param Request $request
//     * @return JsonResponse
//     */
//    public function data(Request $request){
//
//        return response()->json();
//    }
}
