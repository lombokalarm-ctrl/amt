<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("pembayarans", function (Blueprint $table) {
            $table->id();
            $table->foreignId("jamaah_id")->constrained()->cascadeOnDelete();
            $table->decimal("nominal", 15, 2);
            $table->enum("jenis_pembayaran", ["dp", "pelunasan"]);
            $table->date("tanggal");
            $table->enum("status", ["cicil", "lunas"])->default("lunas");
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists("pembayarans");
    }
};