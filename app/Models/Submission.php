<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'name',
        'data',
        'attachments',
        'ip',
        'user_agent',
        'spam',
        'archived',
    ];

    protected $casts = [
        'data' => 'array',
        'attachments' => 'array',
    ];


    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * |--------------------------------------------------------------------------
     * | METHODS
     * |--------------------------------------------------------------------------
     */
    public function email(): ?string
    {
        $filtered = collect($this->data)->filter(function ($item) {
            return in_array($item['name'], config('constants.reply_to_form_field'));
            // return $item['name'] === 'email' || $item['name'] === 'Email';
        });

        if ($filtered->count() < 1) {
            return null;
        }

        return $filtered->first()['value'];
    }

    /**
     * |--------------------------------------------------------------------------
     * | SCOPES
     * |--------------------------------------------------------------------------
     */

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeInbox(Builder $builder): Builder
    {
        return $builder->nonArchived()->nonSpammed();
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeNonArchived(Builder $builder): Builder
    {
        return $builder->where('archived', '=', 0);
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeNonSpammed(Builder $builder): Builder
    {
        return $builder->where('spam', '=', 0);
    }

}
