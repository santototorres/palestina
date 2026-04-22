<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('type')->default('default');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('body')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            
            $table->unique(['page_id', 'locale']);
        });

        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->index();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('faq_item_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_item_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('question');
            $table->text('answer');
            $table->timestamps();

            $table->unique(['faq_item_id', 'locale']);
        });

        Schema::create('resource_items', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index(); // video, document
            $table->string('url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('resource_item_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_item_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['resource_item_id', 'locale']);
        });

        Schema::create('media_assets', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();
            $table->string('path');
            $table->string('url')->nullable();
            $table->string('alt_text')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_assets');
        Schema::dropIfExists('resource_item_translations');
        Schema::dropIfExists('resource_items');
        Schema::dropIfExists('faq_item_translations');
        Schema::dropIfExists('faq_items');
        Schema::dropIfExists('page_translations');
        Schema::dropIfExists('pages');
    }
};
