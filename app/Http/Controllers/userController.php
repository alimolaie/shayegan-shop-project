<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Response;
use App\Newsletter;
use App\Settings;
use App\User;
use App\CustomersAddress;

//email
use App\Mail\SendGrid;
use Mail;

//rules
use App\Rules\Name;
use App\Rules\Mobile;

class userController extends Controller
{
   
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';	
	
	public function __construct()
    {
	   $this->middleware('guest:webs')->except('logout');
	}

	////////user section
	//show login form
	public function loginForm(){
	  return view('website.login');
	}
	
	//show register form
	public function registerform(){
	 return view('website.register');
	}
	//create new account
	public function createAccount(Request $request)
    {
	    
		$settingInfo = Settings::where("keyname","setting")->first();
		//field validation
	    $this->validate($request, [
		    'name'         => ['required','string','min:4','max:190',new Name],
            'email'        => 'required|email|min:3|max:150|string|unique:gwc_customers,email',
			'mobile'       => 'required|min:3|max:10|unique:gwc_customers,mobile',
			'username'     => 'required|min:3|max:20|string|unique:gwc_customers,username',
			'password'     => 'required|min:3|max:150|string',
        ],[
		    'name.required'=>trans('webMessage.name_required'),
			'name.min'=>trans('webMessage.min_name_chars_required'),
			'name.max'=>trans('webMessage.max_name_chars_required'),
			'name.string'=>trans('webMessage.string_chars_required'),
			'email.required'=>trans('webMessage.email_required'),
			'email.min'=>trans('webMessage.min_name_chars_required'),
			'email.max'=>trans('webMessage.max_name_chars_required'),
			'email.string'=>trans('webMessage.string_chars_required'),
			'email.unique'=>trans('webMessage.email_unique_required'),
			'mobile.required'=>trans('webMessage.mobile_required'),
			'mobile.min'=>trans('webMessage.min_name_chars_required'),
			'mobile.max'=>trans('webMessage.mobile_max_name_chars_required'),
			'mobile.string'=>trans('webMessage.string_chars_required'),
			'mobile.unique'=>trans('webMessage.mobile_unique_required'),
			'username.required'=>trans('webMessage.username_required'),
			'username.min'=>trans('webMessage.min_name_chars_required'),
			'username.max'=>trans('webMessage.mobile_max_name_chars_required'),
			'username.string'=>trans('webMessage.string_chars_required'),
			'username.unique'=>trans('webMessage.username_unique_required'),
			'password.required'=>trans('webMessage.password_required'),
			'password.min'=>trans('webMessage.min_name_chars_required'),
			'password.max'=>trans('webMessage.max_name_chars_required'),
			'password.string'=>trans('webMessage.string_chars_required'),
		]);
		
		
		
		try{
		
		
		
		$customers = new User;
		$customers->name=$request->input('name');
		$customers->email=$request->input('email');
		$customers->mobile=$request->input('mobile');
		$customers->username=$request->input('username');
		$customers->password=bcrypt($request->input('password'));
		$customers->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'1';
		
		if(!empty($request->is_newsletter_active)){
	    $this->NewsLettersSubscription($request->email);
		$customers->is_newsletter_active=!empty($request->input('is_newsletter_active'))?$request->input('is_newsletter_active'):'0';
	    }
	    
	    $customers->register_from = "web";
	    $customers->register_ip   = $_SERVER['REMOTE_ADDR'];
		
		$customers->save();
		
		//send email notification
		 $appendMessage = "<b>".trans('webMessage.username')." : </b>".$request->input('username');
		 $appendMessage .= "<br><b>".trans('webMessage.password')." : </b>".$request->input('password');
		 $data = [
		 'dear' => trans('webMessage.dear').' '.$request->input('name'),
		 'footer' => trans('webMessage.email_footer'),
		 'message' => trans('webMessage.your_account_created_success_txt')."<br><br>".$appendMessage,
		 'subject' =>'Account is created successfully',
		 'email_from' =>$settingInfo->from_email,
		 'email_from_name' =>$settingInfo->from_name
		 ];
		 Mail::to($request->email)->send(new SendGrid($data));	 
		
        return redirect('/login')->with('session_msg',trans('webMessage.accountcreatedsuccess'));
		
		}catch (\Exception $e) {
	    return redirect()->back()->with('session_msg_error',$e->getMessage());	
	    }
	}
	//process login 
	public function loginAuthenticate(Request $request)
    {
	 $this->validate($request, [
            'login_username' => 'required|min:4',
            'login_password' => 'required|min:6'
            ],[
			'login_username.required' => trans('webMessage.username_required'),
			'login_password.required' => trans('webMessage.password_required'),
			]
		);
		
		
	
	   try{
	   
	
	   
		
        $remember = $request->remember_me ? true : false;
		
        if (filter_var($request->login_username, FILTER_VALIDATE_EMAIL) && Auth::guard('webs')->attempt(['email' => $request->login_username, 'password' => $request->login_password,'is_active'=>1],$remember)) {
		    //store values in cookies 
			if($remember==true){
			$minutes=3600;
			Cookie::queue('xlogin_username', $request->login_username, $minutes);
			Cookie::queue('xlogin_password', $request->login_password, $minutes);
			Cookie::queue('xremember_me', 1, $minutes);
			}else{
			$minutes=0;
			Cookie::queue('xlogin_username', '', $minutes);
			Cookie::queue('xlogin_password', '', $minutes);
			Cookie::queue('xremember_me', 0, $minutes);
			}
			//store country/area/state in cookie
			if(!empty(Auth::guard('webs')->user()->id)){
				$userid = Auth::guard('webs')->user()->id;
				$userAddress = CustomersAddress::where('customer_id',$userid)->where('is_default','1')->first();
				if(!empty($userAddress->country_id)){
				Cookie::queue('country_id', $userAddress->country_id, 3600);
				}
				if(!empty($userAddress->state_id)){
				Cookie::queue('state_id', $userAddress->state_id, 3600);
				}
				if(!empty($userAddress->area_id)){
				Cookie::queue('area_id', $userAddress->area_id, 3600);
				Cookie::queue('area', $userAddress->area_id, 3600);
				}
			}
			//end
            return redirect()->intended('/account');
        }else if(Auth::guard('webs')->attempt(['username' => $request->login_username, 'password' => $request->login_password,'is_active'=>1],$remember)){
		    //store values in cookies 
			if($remember==true){
			$minutes=3600;
			Cookie::queue('xlogin_username', $request->login_username, $minutes);
			Cookie::queue('xlogin_password', $request->login_password, $minutes);
			Cookie::queue('xremember_me', 1, $minutes);
			}else{
			$minutes=0;
			Cookie::queue('xlogin_username', '', $minutes);
			Cookie::queue('xlogin_password', '', $minutes);
			Cookie::queue('xremember_me', 0, $minutes);
			}
			
			//store country/area/state in cookie
			if(!empty(Auth::guard('webs')->user()->id)){
				$userid = Auth::guard('webs')->user()->id;
				$userAddress = CustomersAddress::where('customer_id',$userid)->where('is_default','1')->first();
				if(!empty($userAddress->country_id)){
				Cookie::queue('country_id', $userAddress->country_id, 3600);
				}
				if(!empty($userAddress->state_id)){
				Cookie::queue('state_id', $userAddress->state_id, 3600);
				}
				if(!empty($userAddress->area_id)){
				Cookie::queue('area_id', $userAddress->area_id, 3600);
				Cookie::queue('area', $userAddress->area_id, 3600);
				}
			}
			//end
			
			
            return redirect()->intended('/account');
		
		}
		
        return back()->withInput()->withErrors(['login_username'=>'Invalid login credentials']);
		
		}catch (\Exception $e) {
	    return redirect()->back()->with('session_msg_error',$e->getMessage());	
	    }

	}	
	
	//newsletter start
	public function NewsLettersSubscription($email){
	if(!empty($email)){
	$newsletter = Newsletter::where("newsletter_email",$email)->first();
	 if(empty($newsletter->id)){
	$newsletter = new Newsletter;
	$newsletter->newsletter_email=$email;
	$newsletter->save();
	                           }
	                  }
	}
	//end news letter
}
