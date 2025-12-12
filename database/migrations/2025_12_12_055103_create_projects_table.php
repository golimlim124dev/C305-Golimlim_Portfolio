<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description');
            $table->string('category')->nullable()->index();
            $table->string('link')->nullable();
            $table->string('image')->nullable()->index();
            $table->timestamps();

            $table->index(['created_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
