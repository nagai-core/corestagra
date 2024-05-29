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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // 自動的に unsigned big integer の primary key として 'id' を作成します
            $table->longText('comment'); // 長いテキストを格納する 'comment' カラムを作成します
            $table->unsignedBigInteger('user_id'); // 外部キー 'user_id' を作成します
            $table->unsignedBigInteger('images_id'); // 外部キー 'images_id' を作成します
            $table->timestamps(); // 'created_at' と 'updated_at' タイムスタンプカラムを作成します

            // 外部キー制約を追加します
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('images_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
