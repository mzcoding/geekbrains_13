<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;

class News extends Model
{
    use HasFactory;

	public static $availableFields = [
		'id', 'title', 'author', 'status', 'description', 'created_at'
	];

	protected $table = 'news';

	protected $fillable = [
		'category_id',
		'title',
		'slug',
		'author',
		'status',
		'description'
	];

	/*protected $guarded = [
		'id'
	];*/

	/*public function getTitleAttribute($value)
	{
		return mb_strtoupper($value);
	}*/

	protected $casts = [
		'display' => 'boolean'
	];

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
