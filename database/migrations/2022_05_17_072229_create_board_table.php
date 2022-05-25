<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('writer'); // 이름
            $table->string('subject'); // 제목
            $table->binary('contents'); // 내용
            $table->integer('hit'); // 조회수
            $table->string('ip'); // IP
            $table->string('filename'); // 첨부파일 이름
            $table->integer('filesize'); // 첨부파일 크기
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
        Schema::dropIfExists('board');
    }
}
