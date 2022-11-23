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
        Schema::create('repairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('trk_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->text('comment');
            $table->tinyInteger('visible')->default(1);
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
    {Schema::table('repair', function (Blueprint $table) {
        $table->dropForeign(['trk_id']);
    });
        Schema::dropIfExists('repair');
    }
};
