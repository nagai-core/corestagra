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
            $table->foreignId('user_id')
            ->constrained('users'); // 外部キー 'user_id' を作成します
            $table->foreignId('images_id')
            ->constrained('images')
            ->onDelete('cascade'); // 外部キー 'images_id' を作成します
            $table->integer('delete_flg')
            ->default(0);
            $table->timestamps(); // 'created_at' と 'updated_at' タイムスタンプカラムを作成します
        });}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
