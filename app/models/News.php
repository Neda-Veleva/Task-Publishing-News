<?php

class News extends Eloquent {
	protected $fillable = [];
        /*
         * Reletionship: One to Many
         */
        public function user() {
            return $this->belongsTo('User');
        }

        /*
         * Reletionship: Many to Many
         */
        public function categories() {
            return $this->belongsToMany('Category');
        }

        /*
         * Validation Rules
         */
        public static $rules = array(
            'title' => 'required|min:6',
            'body' => 'required',
            'category' => 'required',
        );
        
        public static $errors_message = array(
            'title.required' => 'Въведете заглавие!',            
            'title.min' => 'Заглавието трябва да съдържа повече от 6 символа!',
            'body.required' => 'Въведете съдържание!',
            'category.required' => 'Изберете категрия!',            
        );
        /*
         * Validation
         */
        public static function validate($data) {

            return Validator::make($data, static::$rules, static::$errors_message);        
        }
                
        /*
         * Create News
         */
        public static function saveNews($input) {

            $news = new News();
            $news->user_id = Auth::user()->id;
            $news->title = ucwords(Input::get('title'));
            $news->body = Input::get('body');
            if($news->save()){
                $categories = Input::get('category');
                foreach ($categories as $category_id) {
                    $news->categories()->attach($category_id);
                }
            }
        }
        
        /*
         * Edit News
         */
        public static function updateNews($input,$id,$user_id){
            
            $news = News::find($id);
            $news->user_id = $user_id;
            $news->title = ucwords(Input::get('title'));
            $news->body = Input::get('body');
            if($news->save()){
                $categories = Input::get('category');
                $news->categories()->sync($categories);
            }
        }

}