<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 * 
 * @property string $date
 * @property string $bank_id
 * @property string $bank_name
 * @property string $institution_type
 * @property string $regulator
 *
 * @package App\Models
 */
class Bank extends Model
{
	protected $table = 'bank';
	protected $primaryKey = 'bank_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'date',
		'bank_name',
		'institution_type',
		'regulator'
	];
}
