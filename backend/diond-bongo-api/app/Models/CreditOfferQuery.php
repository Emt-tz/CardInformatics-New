<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CreditOfferQuery
 * 
 * @property string $date
 * @property int $id
 * @property int $credit_apply_id
 * @property int $credit_offer_id
 * @property int $bank_id
 * @property string $bankAdm_email
 * @property string $bankAdm_no
 * @property int $user_id
 * @property string $query
 * @property string $reply
 * @property int $status
 *
 * @package App\Models
 */
class CreditOfferQuery extends Model
{
	protected $table = 'credit_offer_query';
	public $timestamps = false;

	protected $casts = [
		'credit_apply_id' => 'int',
		'credit_offer_id' => 'int',
		'bank_id' => 'int',
		'user_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'date',
		'credit_apply_id',
		'credit_offer_id',
		'bank_id',
		'bankAdm_email',
		'bankAdm_no',
		'user_id',
		'query',
		'reply',
		'status'
	];
}
