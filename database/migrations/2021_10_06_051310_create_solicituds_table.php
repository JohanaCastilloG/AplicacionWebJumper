<?php

use App\Models\Solicitud;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('documento');
            $table->string('matricula');
            $table->string('ubicacion_predio');
            $table->enum('estado', [Solicitud::Aprovado, Solicitud::Pendiente, Solicitud::Pago, Solicitud::Enviado, Solicitud::Anulado])->default(Solicitud::Pendiente);
            $table->float('valor')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
