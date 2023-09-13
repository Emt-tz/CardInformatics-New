<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscription
 * 
 * @property string $bank_id
 * @property string $loan
 * @property string $l_payment_date
 * @property string $l_end_date
 * @property string $l_admin_email
 * @property string $credit
 * @property string $c_payment_date
 * @property string $c_admin_email
 * @property string $c_end_date
 * @property string $tour
 * @property string $t_payment_date
 * @property string $t_admin_email
 * @property string $t_end_date
 *
 * @package App\Models
 */
class Subscription extends Model
{
	protected $table = 'subscription';
	protected $primaryKey = 'bank_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'loan',
		'l_payment_date',
		'l_end_date',
		'l_admin_email',
		'credit',
		'c_payment_date',
		'c_admin_email',
		'c_end_date',
		'tour',
		't_payment_date',
		't_admin_email',
		't_end_date'
	];
}
