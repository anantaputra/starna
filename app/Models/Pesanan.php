<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public $incrementing = false;

    protected $primaryKey = 'id_pesanan';
    
    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_pesanan');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pesanan');
    }

    public function alamat()
    {
        return $this->belongsTo(AlamatUser::class, 'id_alamat');
    }
}
