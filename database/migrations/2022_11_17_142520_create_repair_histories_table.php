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
        Schema::create('repair_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repair_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('service_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('repair_status_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->integer('responsible_user_id')->nullable()->default(null);
            $table->dateTime('plan_date');
            $table->text('comment')->nullable()->default(null);
            $table->integer('sort_order')->default(1);
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
    {
        Schema::table('repair', function (Blueprint $table) {
            $table->dropForeign(['repair_status_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['responsible_user_id']);
            $table->dropForeign(['repair_id']);
            $table->dropForeign(['service_id']);
        });
        Schema::dropIfExists('repair_histories');
    }
};
