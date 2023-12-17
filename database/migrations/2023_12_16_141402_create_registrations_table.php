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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('fullname');
            $table->text('ktp_address');
            $table->text('now_address');
            $table->foreignId('province_id')->references('id')->on('provinces');
            $table->foreignId('regency_id')->references('id')->on('regencies');
            $table->foreignId('district_id')->references('id')->on('districts');
            $table->string('tel_no');
            $table->string('phone_no');
            $table->string('email');
            $table->string('citizenship');
            $table->date('birth_date');
            $table->char('birth_country_code', 2)->nullable();
            $table->foreign('birth_country_code')->references('code')->on('countries');
            $table->foreignId('birth_province_id')->nullable()->references('id')->on('provinces');
            $table->foreignId('birth_regency_id')->nullable()->references('id')->on('regencies');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->enum('married_status', ['Belum menikah', 'Menikah', 'Lain-lain (janda/duda)']);
            $table->enum('religion', ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Budha', 'Lain-lain']);
            $table->enum('registration_status', ['Waiting', 'Approved', 'Rejected']);
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
