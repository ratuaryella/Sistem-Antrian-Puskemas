<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Antrians
 *
 * @property int $id_antrian
 * @property int|null $id_user
 * @property int $no_antrian
 * @property string $id_poli
 * @property string $tanggal
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians query()
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians whereIdAntrian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians whereIdPoli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians whereNoAntrian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Antrians whereTanggal($value)
 * @mixin \Eloquent
 */
class Antrians extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'no_antrian',
        'id_poli',
        'tanggal',
        'status',
    ];
}
