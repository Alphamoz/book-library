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
        Schema::table('books', function (Blueprint $table){
            $table->string('isbn',13);
            $table->string('title',250);
            $table->integer('author_id');
            $table->string("image_path",100);
            $table->string('publisher',50);
            $table->string('category',50);
            $table->bigInteger('pages');
            $table->string('language',20);
            $table->timestamp('publish_date');
            $table->string('subjects',50);
            $table->text("desc");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table){
            $table->dropColumn('isbn');
            $table->dropColumn('title');
            $table->dropColumn('author_id');
            $table->dropColumn('image_path');
            $table->dropColumn('publisher');
            $table->dropColumn('category');
            $table->dropColumn('pages');
            $table->dropColumn('language');
            $table->dropColumn('publish_date');
            $table->dropColumn('subjects');
            $table->dropColumn('desc');
        });
        //
    }
};
