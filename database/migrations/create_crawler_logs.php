<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('crawler_logs', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->text('message');
            $table->string('source')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down()
    {
        Schema::dropIfExists('crawler_logs');
    }
};
