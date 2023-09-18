<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Billable, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'is_admin',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    public function forms(): HasMany
    {
        return $this->hasMany(Form::class, 'owner_id');
    }

    public function plan(): ?Plan
    {
        $subscription=false;
        if($this->subscriptions()->exists()) {
            $subscription = $this->subscriptions()->first();
        }
        if (!$subscription) {
            return null;
        }
        return Plan::firstWhere('paddle_id', $subscription->paddle_plan);
    }

    public function max_forms(): int
    {
        // Admins have unlimited forms
        if ($this->is_admin) {
            return PHP_INT_MAX;
        }


        $plan = $this->plan();

        // No active plan
        if (!$plan) {
            // Still on trial
            if ($this->onGenericTrial()) {
                return 1;
            } else {
                // No active plan, no trial
                return 0;
            }
        }

        // Plan forms
        return $plan->max_forms;
    }
}
