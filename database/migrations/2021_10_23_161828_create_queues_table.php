<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('service_id')->nullable()
                ->constrained('services')->nullOnDelete();

            $table->string('number');

            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->enum('status',['waiting','end']);
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
        Schema::dropIfExists('queues');
    }
}
