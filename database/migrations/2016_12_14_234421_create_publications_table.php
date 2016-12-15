<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug')->index();
            $table->text('short_description');
            $table->text('description');
            $table->integer('author_id')->index();
            $table->boolean('is_active')->default(0)->index();
            $table->boolean('is_top')->default(0);

            $table->index(['slug', 'is_active']);
            $table->index(['author_id', 'is_active']);
            $table->index(['is_top', 'is_active']);

            $table->softDeletes();
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
        Schema::dropIfExists('publications');
    }
}
