<?php

class UserController extends BaseController {    
        
	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('users.create');
	}
        
        /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $data = Input::all();

            //model/User          
            $validator = User::validate($data);
            
            if ($validator->fails()) {
                return Redirect::to('account/create')->withErrors($validator)->withInput()->with('message', 'Невалидни данни!');
            }
            /**
             * model/User
             */
	    User::newUser($data);
            return Redirect::to('/account/login')->with('message', 'Регистрацията е успешна! Моля влезте в профила си!');
	}
        
        public function getLogin()
	{
	    return View::make('users.login');
	}
        
        public function postLogin()
	{
	    $data = Input::all();
            
            $rules = array(
                'username' => 'required',
                'password' => 'required'
            );
            
            $errors_message = array(
                'username.required' => 'Въведете потребителско име!',
                'password.required' => 'Въведете парола!'
            );
            
            $validator = Validator::make($data, $rules, $errors_message);
            
            if($validator->fails()) {
                return Redirect::to('/account/login')->withErrors($validator)->withInput()->with('message', 'Невалидни данни!');
            }
            else {
                $user = array(
                    'username'=>Input::get('username'),
                    'password'=>Input::get('password'),
                );
                $username = ucwords(Input::get('username'));
                $remember = (Input::has('remember')) ? true : false;
                if(Auth::attempt($user, $remember)){ 
                    return Redirect::to('/')->with('message', "Здравейте, $username!");
                } else {
                    return Redirect::to('/account/login')->withErrors($validator)->withInput()->with('message', 'Невалидни данни!');                
                }
           }
	}
        
        public function logout() {
            $message = 'Вие сте извън системата!';
            if(Auth::check()){
                Auth::logout();
                return Redirect::to('/')->with('message', $message);
            } else {
                return Redirect::to('/account/login')->with('message', $message);
            }
        }	

}
