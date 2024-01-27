<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuariosVPN', function (Blueprint $table) {
            $table->id();
            $table->string('empleado');
            $table->string('user_login');
            $table->string('bu');
            $table->string('area');
            $table->string('puesto');
            $table->string('email')->unique();
            $table->string('serv_puer_form');
            $table->string('grupo_mega_vpv');
            $table->string('autentucacion');
            $table->string('comentarios');
            $table->string('formato');
            $table->string('estado');
            $table->string('expiracion');
            $table->string('jefe');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuariosVPN');
    }
};
