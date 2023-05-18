<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailJobsTable extends Migration
{
    public function up()
    {
        Schema::create('email_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->text('body');
            $table->string('recipient_email');
            $table->enum('status', ['queued', 'processing', 'sent', 'failed'])->default('queued');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_jobs');
    }
}
