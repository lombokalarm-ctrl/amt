<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("keberangkatans", function (Blueprint $table) {
            $table->id();
            $table->foreignId("paket_id")->constrained()->cascadeOnDelete();
            $table->string("nama_grup");
            $table->date("tanggal_berangkat");
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists("keberangkatans");
    }
};