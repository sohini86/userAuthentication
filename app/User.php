<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	public static function userSave($requestdata)
	{ 
	  $name = $requestdata['name'];
	  
	  $email = $requestdata['email'];
	  
	  $password = bcrypt($requestdata['password']);
	  
	  $User = new User;
        
	  $User->name = $name;
      $User->email = $email;
	  $User->password = $password;
	
	  $User->save();
	  
	  
	}
	public static function usergoogleSave($name,$email,$password)
	{ 
	  
	  $User = new User;
        
	  $User->name = $name;
      $User->email = $email;
	  $User->password = $password;
	
	  $User->save();
	  $insertedId = $User->id;
	  return $insertedId;
	  
	}

}
