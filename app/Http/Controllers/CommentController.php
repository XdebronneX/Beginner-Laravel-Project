<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\GroomingService;
use Illuminate\Http\Request;
use View;
use Auth;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = GroomingService::all()->whereNull('deleted_at');
        return view::make('reviews.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $services = GroomingService::all()->whereNull('deleted_at');
        return view::make('reviews.create',compact('services'));
       
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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function showServices($service_id)
    {


         $services = GroomingService::find($service_id);
         $servicess = DB::table('comment_reviews')

            ->leftJoin('grooming_service','grooming_service.service_id','=','comment_reviews.service_id')
            ->select('comment_reviews.name','comment_reviews.comment','comment_reviews.created_at')
            ->where('comment_reviews.service_id', '=', $service_id)
            //->first();
            ->orderBy('comment_id','DESC')
            ->get();
             return View::make('reviews.show',compact('services','servicess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function updateComment(Request $request,$service_id)
    {
            $comments = new Comment;
            $comments->service_id = $service_id;
            $comments->name = $request->name;
            $comments->comment = $request->comment;
            $comments->save();
            return redirect()->back();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
