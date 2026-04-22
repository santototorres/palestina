<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mail_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('street');
            $table->string('street_number');
            $table->string('postal_code');
            $table->string('city');
            $table->string('canton')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->integer('form_quantity')->default(1);
            $table->text('comment')->nullable();
            $table->string('status')->default('new');
            $table->boolean('consent_accepted')->default(false);
            $table->boolean('physical_process_acknowledged')->default(false);
            $table->string('source_url')->nullable();
            $table->string('ip_hash')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('submitted_at')->useCurrent();
            $table->foreignId('processed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('mail_request_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_request_id')->constrained()->cascadeOnDelete();
            $table->string('old_status')->nullable();
            $table->string('new_status');
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('change_reason')->nullable();
            $table->timestamps();
        });

        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('type')->default('administrative');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('canton')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->string('tracking_reference')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->boolean('consent_accepted')->default(false);
            $table->boolean('physical_process_acknowledged')->default(false);
            $table->timestamp('submitted_at')->useCurrent();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('submission_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained()->cascadeOnDelete();
            $table->string('disk')->default('local');
            $table->string('path');
            $table->string('stored_name');
            $table->string('original_name');
            $table->string('extension');
            $table->string('mime_type');
            $table->unsignedBigInteger('size_bytes');
            $table->string('sha256');
            $table->string('document_type');
            $table->string('scan_status')->default('pending');
            $table->timestamps();
        });

        Schema::create('submission_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained()->cascadeOnDelete();
            $table->string('old_status')->nullable();
            $table->string('new_status');
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('change_reason')->nullable();
            $table->timestamps();
        });

        Schema::create('volunteer_leads', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('canton')->nullable();
            $table->string('language')->nullable();
            $table->text('availability')->nullable();
            $table->text('skills')->nullable();
            $table->string('interest_type')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('category')->default('general');
            $table->string('organization')->nullable();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('language')->nullable();
            $table->string('status')->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('donation_leads', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('amount_interest', 10, 2)->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });

        Schema::create('shop_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('canton')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->text('message')->nullable();
            $table->string('payment_method_info')->nullable();
            $table->string('status')->default('new');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('shop_request_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_request_id')->constrained()->cascadeOnDelete();
            $table->string('product_reference');
            $table->string('product_name');
            $table->string('size')->nullable();
            $table->string('language_variant')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('shop_request_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_request_id')->constrained()->cascadeOnDelete();
            $table->string('old_status')->nullable();
            $table->string('new_status');
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('change_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shop_request_status_history');
        Schema::dropIfExists('shop_request_items');
        Schema::dropIfExists('shop_requests');
        Schema::dropIfExists('donation_leads');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('volunteer_leads');
        Schema::dropIfExists('submission_status_history');
        Schema::dropIfExists('submission_files');
        Schema::dropIfExists('submissions');
        Schema::dropIfExists('mail_request_status_history');
        Schema::dropIfExists('mail_requests');
    }
};
