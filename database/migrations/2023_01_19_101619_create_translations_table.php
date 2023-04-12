<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('translatable_id')->index();
            $table->string('translatable_type');
            $table->string('language');
            $table->string('field')->comment('Column name');
            $table->text('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // $table->unique(['translatable_type', 'translatable_id', 'language', 'field']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translations');
    }
}
