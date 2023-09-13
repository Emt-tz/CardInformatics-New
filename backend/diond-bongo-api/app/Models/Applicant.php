<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Applicant
 * 
 * @property int $id
 * @property string $application_code
 * @property int $user_id
 * @property string $type_of_loan
 * @property string $currency
 * @property string $loan_amount
 * @property string $purpose_of_loan
 * @property string $existing_loan
 * @property string $lender
 * @property string $total_existing_loan
 * @property string $employer
 * @property string $designation
 * @property string $employed_from
 * @property string $employed_to
 * @property string $business_name
 * @property string $business_location
 * @property string $previous_employer
 * @property string $previous_designation
 * @property string $previous_employed_from
 * @property string $previous_employed_to
 * @property string $R_nida_no
 * @property string $R_f_name
 * @property string $R_birth_date
 * @property string $R_martial_status
 * @property string $R_professional
 * @property string $R_email
 * @property string $R_p_number
 * @property string $R_response
 * @property string $R_comment
 * @property string $annual_salary
 * @property string $supplimentary_income
 * @property string $s_employed_income
 * @property string $other_income
 * @property string $income_source
 * @property string $total_annual_income
 * @property string $collateral_name
 * @property string $collateral_value
 * @property string $salary_statement
 * @property string $bank_statement
 * @property string $money_statement
 * @property string $start_credit_date
 * @property string $loan_status
 * @property string $locked_status
 * @property string $bank_id
 * @property string $bankAdm_email
 * @property string $bankAdm_no
 * @property string $bankAdm_message
 * @property string $approve_code
 * @property string $approval_date
 * @property string $approval_date1
 * @property int $delete_status
 * @property string $deleted_coz
 * @property string $deleted_Date
 * @property string $expiry_date
 * @property int $accepted_status
 * @property string $accepted_by
 * @property string $accepted_date
 *
 * @package App\Models
 */
class Applicant extends Model
{
	protected $table = 'applicant';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'delete_status' => 'int',
		'accepted_status' => 'int'
	];

	protected $fillable = [
		'application_code',
		'user_id',
		'type_of_loan',
		'currency',
		'loan_amount',
		'purpose_of_loan',
		'existing_loan',
		'lender',
		'total_existing_loan',
		'employer',
		'designation',
		'employed_from',
		'employed_to',
		'business_name',
		'business_location',
		'previous_employer',
		'previous_designation',
		'previous_employed_from',
		'previous_employed_to',
		'R_nida_no',
		'R_f_name',
		'R_birth_date',
		'R_martial_status',
		'R_professional',
		'R_email',
		'R_p_number',
		'R_response',
		'R_comment',
		'annual_salary',
		'supplimentary_income',
		's_employed_income',
		'other_income',
		'income_source',
		'total_annual_income',
		'collateral_name',
		'collateral_value',
		'salary_statement',
		'bank_statement',
		'money_statement',
		'start_credit_date',
		'loan_status',
		'locked_status',
		'bank_id',
		'bankAdm_email',
		'bankAdm_no',
		'bankAdm_message',
		'approve_code',
		'approval_date',
		'approval_date1',
		'delete_status',
		'deleted_coz',
		'deleted_Date',
		'expiry_date',
		'accepted_status',
		'accepted_by',
		'accepted_date'
	];
}
