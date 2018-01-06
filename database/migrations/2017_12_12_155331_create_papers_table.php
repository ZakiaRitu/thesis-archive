<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paper_title')->nullable();
            $table->text('paper_abstract')->nullable();
            $table->text('paper_published_url')->nullable();
            $table->string('paper_published_at')->nullable(); //conference Name //IEEE
            $table->string('paper_type')->nullable(); // CONFERENCE / JOURNAL
            $table->dateTime('paper_publish_date')->nullable();
            $table->string('paper_pdf')->nullable();
            $table->text('paper_cite')->nullable();
            $table->string('paper_meta_data')->unique();
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
        Schema::dropIfExists('papers');
    }
}
