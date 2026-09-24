<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('task_name')->after('id');
            $table->text('description')->nullable()->after('task_name');
            $table->string('status')->default('Pending')->after('description');
            $table->date('due_date')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn([
                'task_name',
                'description',
                'status',
                'due_date'
            ]);
        });
    }
};
