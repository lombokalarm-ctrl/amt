<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("agens", function (Blueprint $table) {
            $table->id();
            $table->string("nama_agen");
            $table->string("no_telepon");
            $table->decimal("total_komisi", 15, 2)->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists("agens"); }
};