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
        Schema::create('repair_medias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repair_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unique(['repair_id', 'name']);
            $table->string('name');
            $table->integer('sort_order')->default(1);
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
    {Schema::table('repair_medias', function (Blueprint $table) {
        $table->dropForeign(['repair_id']);
    });
        Schema::dropIfExists('repair_medias');
    }
};
