<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Notify
 *
 * @property int $id
 * @property int $sender_id
 * @property int $recipient_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notify newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notify newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notify query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notify whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notify whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notify whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notify whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notify whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notify whereUpdatedAt($value)
 * @property-read \App\Models\User $sender
 * @mixin \Eloquent
 */
class Notify extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'recipient_id',
        'sender_id',
        'body'
    ];

    public function sender(): BelongsTo {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
