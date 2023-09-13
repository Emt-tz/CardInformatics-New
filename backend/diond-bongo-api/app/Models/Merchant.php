<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Merchant
 * 
 * @property int $id
 * @property string $date_created
 * @property string $merch_id
 * @property string $merch_name
 * @property string $merchant_type
 * @property string $regulator
 * @property string $business_tin_no
 * @property string $licence_expire
 * @property string $bank_name
 * @property string $bank_branch
 * @property string $account_no
 * @property string $merch_certificate
 * @property string $merch_Adm_email
 * @property string $updated_by
 * @property string $updated_date
 *
 * @package App\Models
 */
class Merchant extends Model
{
	protected $table = 'merchant';
	public $timestamps = false;

	protected $fillable = [
		'date_created',
		'merch_id',
		'merch_name',
		'merchant_type',
		'regulator',
		'business_tin_no',
		'licence_expire',
		'bank_name',
		'bank_branch',
		'account_no',
		'merch_certificate',
		'merch_Adm_email',
		'updated_by',
		'updated_date'
	];
}
