<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegistrationDeleted
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $p_number
 * @property string $Adm_email
 * @property string $deleted_coz
 * @property string $deleted_date
 *
 * @package App\Models
 */
class RegistrationDeleted extends Model
{
	protected $table = 'registration_deleted';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name',
		'email',
		'p_number',
		'Adm_email',
		'deleted_coz',
		'deleted_date'
	];
}
