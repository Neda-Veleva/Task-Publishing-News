<?php

class CategoriesController extends \BaseController {	

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            $category = Category::find($id);
            return View::make('categories.show')->with('category', $category);
	}
	

}