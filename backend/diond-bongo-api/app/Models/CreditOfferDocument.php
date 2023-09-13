<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CreditOfferDocument
 * 
 * @property int $id
 * @property int $user_id
 * @property string $promotion_code
 * @property string $name
 * @property int $credit
 * @property int $query
 * @property string $date_time
 *
 * @package App\Models
 */
class CreditOfferDocument extends Model
{
	protected $table = 'credit_offer_documents';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'credit' => 'int',
		'query' => 'int'
	];

	protected $fillable = [
		'user_id',
		'promotion_code',
		'name',
		'credit',
		'query',
		'date_time'
	];
}
