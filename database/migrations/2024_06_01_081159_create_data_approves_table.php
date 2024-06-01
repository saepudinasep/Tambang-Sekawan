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
        Schema::create('data_approves', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->char('id_pegawai');
            $table->char('id_driver');
            $table->char('id_kendaraan');
            $table->uuid('tujuan_tambang');
            $table->boolean('approve_1')->default(false);
            $table->datetime('approve_1_at')->nullable();
            $table->boolean('approve_2')->default(false);
            $table->datetime('approve_2_at')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('id_pegawai')->references('id')->on('pegawais')->onDelete('cascade');
            // $table->foreign('id_driver')->references('id')->on('drivers')->onDelete('cascade');
            // $table->foreign('id_kendaraan')->references('id')->on('vehicles')->onDelete('cascade');
            // $table->foreign('tujuan_tambang')->references('id')->on('tambangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('data_approves', function (Blueprint $table) {
        //     $table->dropForeign(['id_pegawai']);
        //     $table->dropForeign(['id_driver']);
        //     $table->dropForeign(['id_kendaraan']);
        //     $table->dropForeign(['tujuan_tambang']);
        // });

        Schema::dropIfExists('data_approves');
    }
};
