<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        /*
         * Reletionship: One to Many
         */
                
        public function news() {
            return $this->hasMany('News');
        }
        
        /*
         * Validation Rules
         */
        
        public static $rules = array(
            'username' => 'required|alpha_dash|min:4',
            'email' => 'required|email',
            'password' => 'required|alpha_num|between:6,18',
            'confirm_password' => 'required|same:password'
        );
        
        public static $errors_message = array(
            'username.required' => 'Въведете потребителско име!',
            'username.alpha_dash' => 'Потребителско име може да има букви, цифри, тирета и долни черти!',
            'username.min' => 'Потребителско име трябва да съдържа повече от 4 символа!',
            'email.required' => 'Въведете email!',
            'email.required' => 'Невалиден email!',
            'password.required' => 'Въведете парола!',
            'password.alpha_num' => 'Паролата може да бъде само от букви и цифри!',
            'password.between' => 'Паролата трябва да бъде между 6 и 18 символа!',
            'confirm_password.required' => 'Въведете потвърждение на паролата!',
            'confirm_password.same' => 'Двете пароли трябва да са еднакви!'
        );

        /*
         * Validation
         */       
        public static function validate($data) {
            return Validator::make($data, static::$rules, static::$errors_message);        
        }
        
        /*
         * Create New User
         */
        public static function newUser($data) {
            $user = new User;
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
        }
}
