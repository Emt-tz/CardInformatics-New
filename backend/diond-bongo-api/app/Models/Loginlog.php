<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Loginlog
 * 
 * @property int $id
 * @property varbinary $IpAddress
 * @property int $TryTime
 *
 * @package App\Models
 */
class Loginlog extends Model
{
	protected $table = 'loginlogs';
	public $timestamps = false;

	protected $casts = [
		'IpAddress' => 'varbinary',
		'TryTime' => 'int'
	];

	protected $fillable = [
		'IpAddress',
		'TryTime'
	];
}
