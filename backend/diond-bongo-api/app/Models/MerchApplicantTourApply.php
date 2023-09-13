<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchApplicantTourApply
 * 
 * @property int $id
 * @property string $date_created
 * @property string $tour_id
 * @property string $applicant_tour_code
 * @property string $merch_id
 * @property string $user_id
 * @property string $start_date
 * @property string $end_date
 * @property string $no_adult_p
 * @property string $no_teenager_p
 * @property string $no_child_p
 * @property string $no_infant_p
 * @property string $total_payment
 * @property string $payment_loan
 * @property string|null $existing_loan
 * @property string $lender
 * @property string $total_existing_loan
 * @property string $c_employer
 * @property string $c_designation
 * @property string $c_employed_from
 * @property string $c_employed_to
 * @property string $business_name
 * @property string $business_location
 * @property string $business_type
 * @property string $R_nida_no
 * @property string $R_f_name
 * @property string $R_birth_date
 * @property string $R_martial_status
 * @property string $R_professional
 * @property string $R_email
 * @property string $R_p_number
 * @property string $R_response
 * @property string $R_comment
 * @property string $currency
 * @property string $annual_salary
 * @property string $s_employed_income
 * @property string $other_income
 * @property string $supplimentary_income
 * @property string $total_annual_income
 * @property string $collateral_name
 * @property string $collateral_value
 * @property string $salary_statement
 * @property string $bank_statement
 * @property string $money_statement
 * @property string $bank_id
 * @property string $bankAdm_email
 * @property string $bankAdm_no
 * @property string $tour_approval_code
 * @property string $approval_date
 * @property string $tour_status
 *
 * @package App\Models
 */
class MerchApplicantTourApply extends Model
{
	protected $table = 'merch_applicant_tour_apply';
	public $timestamps = false;

	protected $fillable = [
		'date_created',
		'tour_id',
		'applicant_tour_code',
		'merch_id',
		'user_id',
		'start_date',
		'end_date',
		'no_adult_p',
		'no_teenager_p',
		'no_child_p',
		'no_infant_p',
		'total_payment',
		'payment_loan',
		'existing_loan',
		'lender',
		'total_existing_loan',
		'c_employer',
		'c_designation',
		'c_employed_from',
		'c_employed_to',
		'business_name',
		'business_location',
		'business_type',
		'R_nida_no',
		'R_f_name',
		'R_birth_date',
		'R_martial_status',
		'R_professional',
		'R_email',
		'R_p_number',
		'R_response',
		'R_comment',
		'currency',
		'annual_salary',
		's_employed_income',
		'other_income',
		'supplimentary_income',
		'total_annual_income',
		'collateral_name',
		'collateral_value',
		'salary_statement',
		'bank_statement',
		'money_statement',
		'bank_id',
		'bankAdm_email',
		'bankAdm_no',
		'tour_approval_code',
		'approval_date',
		'tour_status'
	];
}
