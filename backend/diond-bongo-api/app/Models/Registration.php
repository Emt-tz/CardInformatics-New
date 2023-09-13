<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Registration
 * 
 * @property string $date
 * @property int $id
 * @property string $nida_no
 * @property string $tin_no
 * @property string $passport_no
 * @property string $f_name
 * @property string $l_name
 * @property string $gender
 * @property string $marital_status
 * @property string $birth_date
 * @property string $citizenship
 * @property int $bank_id
 * @property int $merch_id
 * @property string $email
 * @property int|null $role
 * @property string $security_question
 * @property string $security_answer
 * @property string $password
 * @property int $account_status
 * @property string|null $address
 * @property string $ward
 * @property string $street_no
 * @property string|null $street
 * @property string|null $district
 * @property string|null $region
 * @property string|null $p_number
 * @property string $profile_pic
 * @property string $last_edited
 * @property string $edited_by
 * @property string $edited_coz
 * @property int $status
 * @property string $locking_cz
 * @property string $locked_date
 * @property string $locked_date1
 * @property string $Adm_email
 * 
 * @property Collection|UserSession[] $user_sessions
 *
 * @package App\Models
 */
class Registration extends Model
{
	protected $table = 'registration';
	public $timestamps = false;

	protected $casts = [
		'bank_id' => 'int',
		'merch_id' => 'int',
		'role' => 'int',
		'account_status' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'date',
		'nida_no',
		'tin_no',
		'passport_no',
		'f_name',
		'l_name',
		'gender',
		'marital_status',
		'birth_date',
		'citizenship',
		'bank_id',
		'merch_id',
		'email',
		'role',
		'security_question',
		'security_answer',
		'password',
		'account_status',
		'address',
		'ward',
		'street_no',
		'street',
		'district',
		'region',
		'p_number',
		'profile_pic',
		'last_edited',
		'edited_by',
		'edited_coz',
		'status',
		'locking_cz',
		'locked_date',
		'locked_date1',
		'Adm_email'
	];

	public function user_sessions()
	{
		return $this->hasMany(UserSession::class, 'user_id');
	}
}
