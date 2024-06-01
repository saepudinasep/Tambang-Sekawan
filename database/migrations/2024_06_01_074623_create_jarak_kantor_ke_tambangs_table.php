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
        Schema::create('jarak_kantor_ke_tambangs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->double('jarak');
            $table->integer('id_kantor');
            $table->integer('id_tambang');
            $table->timestamps();

            // $table->foreign('id_kantor')->references('id')->on('kantors')->onDelete('cascade');
            // $table->foreign('id_tambang')->references('id')->on('tambangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('jarak_kantor_ke_tambangs', function (Blueprint $table) {
        //     $table->dropForeign(['id_kantor']);
        //     $table->dropForeign(['id_tambang']);
        // });

        Schema::dropIfExists('jarak_kantor_ke_tambangs');
    }
};
