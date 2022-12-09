<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_type_id')
                ->constrained('room_types')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('room_status_id')
                ->constrained('room_statuses')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->string('name', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->integer('sort_order')->default(1);
            $table->tinyInteger('visible')->default(1);
            $table->string('comment')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
