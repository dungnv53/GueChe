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
	protected $fillable = ['username', 'email', 'role_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	* Get the unique identifier for the user.
	*
	* @return mixed
	*/
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	
	/**
	* Get the password for the user.
	*
	* @return string
	*/
	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRememberToken()
	{
	  return $this->remember_token;
	}
	
	public function setRememberToken($value)
	{
	  $this->remember_token = $value;
	}
	
	public function getRememberTokenName()
	{
	  return "remember_token";
	}
	
	public function getReminderEmail()
	{
	  return $this->email;
	}

	public function setPasswordAttribute($pass){

		$this->attributes['password'] = Hash::make($pass);

	}

	public function order()
    {
        return $this->hasMany('Order');
    }


    // TODO
    // One user has only 1 order per day (or per session order)
    // Return newest order of user
    public function getCurOrder() {
        $cur_order = Order::where('user_id', '=', $this->id)->where('updated_at', '>=', date('Y-m-d'))->first();
        if(count($cur_order)) {
        	return $cur_order;
        } else {
        	return false;
        }
    }
}
