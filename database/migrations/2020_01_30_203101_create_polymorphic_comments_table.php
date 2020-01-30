<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolymorphicCommentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // I already used comments table when demonstrating the one-to-many relationship
        // so I will demonstrate this polymorphic one to many relationship using a different table name
        Schema::create('polymorphic_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body')->nullable();
            $table->bigInteger('commentable_id')->nullable();
            $table->string('commentable_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('polymorphic_comments');
    }
}
