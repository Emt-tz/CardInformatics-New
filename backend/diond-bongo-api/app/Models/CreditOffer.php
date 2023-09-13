<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CreditOffer
 * 
 * @property string $date
 * @property int $id
 * @property string $promotion_code
 * @property int $bank_id
 * @property string $bankAdm_email
 * @property string $bankAdm_no
 * @property string $institution_type
 * @property string $number_of_employees
 * @property string $loan_history
 * @property string $credit_type
 * @property string $credit_product
 * @property string $currency
 * @property string $credit_limit
 * @property string $interest_charge
 * @property string $annual_fee
 * @property string $late_payment_fee
 * @property string $other_fee
 * @property string $additional_info
 * @property string $payback_periods
 * @property string $app_deadline
 * @property int $expiry
 * @property Carbon $app_expire
 * @property string $del_bankAdm_email
 * @property string $del_date
 *
 * @package App\Models
 */
class CreditOffer extends Model
{
	protected $table = 'credit_offer';
	public $timestamps = false;

	protected $casts = [
		'bank_id' => 'int',
		'expiry' => 'int',
		'app_expire' => 'datetime'
	];

	protected $fillable = [
		'date',
		'promotion_code',
		'bank_id',
		'bankAdm_email',
		'bankAdm_no',
		'institution_type',
		'number_of_employees',
		'loan_history',
		'credit_type',
		'credit_product',
		'currency',
		'credit_limit',
		'interest_charge',
		'annual_fee',
		'late_payment_fee',
		'other_fee',
		'additional_info',
		'payback_periods',
		'app_deadline',
		'expiry',
		'app_expire',
		'del_bankAdm_email',
		'del_date'
	];
}
