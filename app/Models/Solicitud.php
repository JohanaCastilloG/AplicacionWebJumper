<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    const Aprovado = 1;
    const Pendiente = 2;
    const Pago = 3;
    const Enviado = 4;
    const Anulado = 5;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function pago()
    {
        return $this->hasOne(Pago::class);
    }

    public function getRouteKeyName()
    {
        return 'matricula';
    }
}
