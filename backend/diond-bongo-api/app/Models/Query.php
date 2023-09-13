<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Query
 * 
 * @property string $date
 * @property int $id
 * @property string $application_code
 * @property int $bank_id
 * @property int $user_id
 * @property string $request_for
 * @property string $reply_to
 * @property string $document1
 * @property string $sec_request
 * @property string $sec_reply
 * @property string $document2
 * @property int $query_status
 * @property int $permanet_delete
 * @property Carbon $query_end
 *
 * @package App\Models
 */
class Query extends Model
{
	protected $table = 'query';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'bank_id' => 'int',
		'user_id' => 'int',
		'query_status' => 'int',
		'permanet_delete' => 'int',
		'query_end' => 'datetime'
	];

	protected $fillable = [
		'date',
		'id',
		'application_code',
		'bank_id',
		'user_id',
		'request_for',
		'reply_to',
		'document1',
		'sec_request',
		'sec_reply',
		'document2',
		'query_status',
		'permanet_delete',
		'query_end'
	];
}
