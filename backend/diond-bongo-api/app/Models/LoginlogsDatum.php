<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LoginlogsDatum
 * 
 * @property int $id
 * @property string $user_id
 * @property string $email
 * @property string $date_time_in
 * @property string $date_time_out
 *
 * @package App\Models
 */
class LoginlogsDatum extends Model
{
	protected $table = 'loginlogs_data';
	public $timestamps = false;

	protected $fillable = [
		'user_id',
		'email',
		'date_time_in',
		'date_time_out'
	];
}
