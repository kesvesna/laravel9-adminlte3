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
        Schema::create('repair', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('trk_id')
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
            $table->text('comment');
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->foreignId('responsible_user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->integer('application_id')->nullable()->default(null)->unsigned();
            $table->dateTime('plan_date');
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
        $table->dropForeign(['repair_status_id']);
        $table->dropForeign(['user_id']);
        $table->dropForeign(['service_id']);
        $table->dropForeign(['responsible_user_id']);
    });
        Schema::dropIfExists('repair');
    }
};
