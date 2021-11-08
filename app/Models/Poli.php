<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Poli
 *
 * @property string $id_poli
 * @property string $nama
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Poli newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poli newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poli query()
 * @method static \Illuminate\Database\Eloquent\Builder|Poli whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poli whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poli whereIdPoli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poli whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poli whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Poli extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'nama',
        'id_poli',
    ];
}
