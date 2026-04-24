<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("jamaahs", function (Blueprint $table) {
            $table->id();
            $table->foreignId("paket_id")->constrained()->cascadeOnDelete();
            $table->foreignId("keberangkatan_id")->nullable()->constrained()->nullOnDelete();
            $table->string("nama_lengkap");
            $table->string("no_paspor")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("ktp_path")->nullable();
            $table->string("paspor_path")->nullable();
            $table->enum("status", ["prospek", "dp", "lunas", "berangkat", "selesai"])->default("prospek");
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists("jamaahs");
    }
};