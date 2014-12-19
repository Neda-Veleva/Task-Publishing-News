<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /news
	 *
	 * @return Response
	 */
	public function index()
	{
            $all_news = News::all();
            
            return View::make('news.index')->with('all_news', $all_news);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /news/create
	 *
	 * @return Response
	 */
	public function create()
	{
            $categories = Category::all();
            
            return View::make('news.create')->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /news
	 *
	 * @return Response
	 */
	public function store()
	{
            $input = Input::all();
                        
            //model/News          
            $validator = News::validate($input);
            
            if ($validator->fails()) {
                return Redirect::to('news/create')->withErrors($validator)->withInput()->with('message', 'Невалидни данни!');
            }
            
            //model/News
	    News::saveNews($input);
            return Redirect::to('/')->with('message', 'Записът е успешен!');
	}

	/**
	 * Display the specified resource.
	 * GET /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            $news = News::find($id);
            return View::make('news.show')->with('news', $news);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /news/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $news = News::find($id);
            $categories = Category::all();
            if(Auth::user()->id === $news->user_id){
                return View::make('news.edit')->with('news', $news)->with('categories', $categories);
            } else{
                return Redirect::to("/news/{$id}")->with('message', 'Новината не може да бъде променена от вас!');                
            }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            $input = Input::all(); 
            
            //model/News          
            $validator = News::validate($input);
            
            if ($validator->fails()) {
                return Redirect::to("/news/{$id}/edit")->withErrors($validator)->withInput()->
                        with('message', 'Невалидни данни!');
            } else {                
                $user_id = Auth::user()->id;
                //model/News 
                News::updateNews($input, $id, $user_id);
                return Redirect::to("/news/{$id}")->with('message', 'Редакцията е успешена!');                
            }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            News::find($id)->delete();
            return Redirect::to('/')->with('message', 'Успешно изтриване!');
	}

}