<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ApplicantInterest
 * 
 * @property int $id
 * @property string $date_created
 * @property string $application_code
 * @property string $loan_id
 * @property string $user_id
 * @property string $bank_id
 * @property string $currency
 * @property string $p_loan_amount
 * @property string $interest_charge
 * @property string $annual_fee
 * @property string $late_payment_fee
 * @property string $other_fee
 * @property string $special_feature
 * @property string $payback_periods
 * @property string $bankAdm_email
 * @property int $accepted
 *
 * @package App\Models
 */
class ApplicantInterest extends Model
{
	protected $table = 'applicant_interest';
	public $timestamps = false;

	protected $casts = [
		'accepted' => 'int'
	];

	protected $fillable = [
		'date_created',
		'application_code',
		'loan_id',
		'user_id',
		'bank_id',
		'currency',
		'p_loan_amount',
		'interest_charge',
		'annual_fee',
		'late_payment_fee',
		'other_fee',
		'special_feature',
		'payback_periods',
		'bankAdm_email',
		'accepted'
	];
}
