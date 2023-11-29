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
        Schema::create('send_mail', function (Blueprint $table) {
            $table->id();
            $table->string('admin_email');
            $table->foreign('admin_email')
                ->references('email')
                ->on('admins')
                ->constrained()
                ->onDelete('cascade');
            $table->tinyInteger('key_send')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_mail');
    }
};
