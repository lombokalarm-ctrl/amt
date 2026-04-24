<?php

$dir = __DIR__ . '/database/migrations/';
$files = scandir($dir);

foreach($files as $file) {
    if (strpos($file, 'create_pakets_table') !== false) {
        file_put_contents($dir . $file, '<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("pakets", function (Blueprint $table) {
            $table->id();
            $table->string("nama_paket");
            $table->decimal("harga", 15, 2);
            $table->integer("durasi_hari");
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists("pakets");
    }
};');
    }
    if (strpos($file, 'create_keberangkatans_table') !== false) {
        file_put_contents($dir . $file, '<?php
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
};');
    }
    if (strpos($file, 'create_jamaahs_table') !== false) {
        file_put_contents($dir . $file, '<?php
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
};');
    }
    if (strpos($file, 'create_pembayarans_table') !== false) {
        file_put_contents($dir . $file, '<?php
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
};');
    }
    if (strpos($file, 'create_surat_templates_table') !== false) {
        file_put_contents($dir . $file, '<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("surat_templates", function (Blueprint $table) {
            $table->id();
            $table->string("nama_template");
            $table->text("konten_html");
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists("surat_templates");
    }
};');
    }
    if (strpos($file, 'create_surat_keluars_table') !== false) {
        file_put_contents($dir . $file, '<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("surat_keluars", function (Blueprint $table) {
            $table->id();
            $table->foreignId("jamaah_id")->constrained()->cascadeOnDelete();
            $table->foreignId("surat_template_id")->constrained()->cascadeOnDelete();
            $table->string("nomor_surat");
            $table->string("file_pdf_path")->nullable();
            $table->date("tanggal_dibuat");
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists("surat_keluars");
    }
};');
    }
}
echo "Done\n";
