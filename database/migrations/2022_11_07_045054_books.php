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
        Schema::create('languages', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('authors', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('publications', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('genres', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('book_master', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('book_edition', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');
            $table->boolean('is_deleted')->default(false);
            $table->bigInteger('book_master_id')->unsigned();
            $table->foreign('book_master_id')->references('id')->on('book_master');
            $table->bigInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages');
            $table->boolean('for_kids')->default(false);
            $table->boolean('is_restricted')->default(false);
            $table->timestamps();
        });

        Schema::create('book_genre_mapping', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('book_master_id')->unsigned();
            $table->foreign('book_master_id')->references('id')->on('book_master');
            $table->bigInteger('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('book_author_mapping', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('book_edition_id')->unsigned();
            $table->foreign('book_edition_id')->references('id')->on('book_edition');
            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors');
            $table->boolean('is_co_author')->default(false);
            $table->boolean('is_translator')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::create('book_publication_mapping', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('book_edition_id')->unsigned();
            $table->foreign('book_edition_id')->references('id')->on('book_edition');
            $table->bigInteger('publication_id')->unsigned();
            $table->foreign('publication_id')->references('id')->on('publications');
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('languages');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('book_master');
        Schema::dropIfExists('book_edition');
        Schema::dropIfExists('book_genre_mapping');
        Schema::dropIfExists('book_author_mapping');
        Schema::dropIfExists('book_author_mapping');
        Schema::dropIfExists('book_publication_mapping');
    }
};
