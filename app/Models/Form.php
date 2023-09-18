<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'slug',
        'title',
        'forward_to',
        's3',
        'default_email_theme',
        'submission_succeeded',
        'success_redirect_url',
        'success_message_title',
        'branding_option_1',
        'branding_option_2',
        'branding_option_3',
        'branding_option_4',
        'submission_failed',
        'failed_redirect_url',
        'email_logo',
        'allowed_domains',
        'allowed_domains_count',
        'honey_pot',
        'recaptcha',
        'recaptcha_secret',
        'file_upload',
        'access_key_id',
        'access_secret',
        'region',
        'bucket',
        'directory',
        'allowed_mimes',
        'max_upload_size',
        'blocked_emails',
        'local_file',
        's3_file_upload',
    ];

    protected $guarded = [];

    protected $casts = [
        'forward_to' => 'array',
        's3' => 'array',
        'local_file' => 'array',
    ];


    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }
}
