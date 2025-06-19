<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('crawled_opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->string('type');
            $table->string('source_url');
            $table->string('language', 8)->default('en');
            $table->string('status')->default('draft');
            $table->json('meta')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }
    public function down()
    {
        Schema::dropIfExists('crawled_opportunities');
    }
};
