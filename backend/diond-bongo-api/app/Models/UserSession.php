<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserSession
 * 
 * @property int $id
 * @property int $user_id
 * @property string $session_id
 * @property Carbon $last_login_time
 * 
 * @property Registration $registration
 *
 * @package App\Models
 */
class UserSession extends Model
{
	protected $table = 'user_session';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'last_login_time' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'session_id',
		'last_login_time'
	];

	public function registration()
	{
		return $this->belongsTo(Registration::class, 'user_id');
	}
}
