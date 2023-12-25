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
        Schema::table('posts', function (Blueprint $table) {
            // 添加新字段
            $table->boolean('status'); // 狀態

            // 修改现有字段
//            $table->string('title')->nullable()->change();
//            $table->text('content')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // 恢复修改
//            $table->string('title')->change();
//            $table->text('content')->change();

            // 移除新字段
            $table->dropColumn('status');
        });
    }
};
