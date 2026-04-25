<?php
$dir = __DIR__ . '/database/migrations/';
$files = scandir($dir);
foreach($files as $file) {
    if (strpos($file, 'create_agens_table') !== false) {
        file_put_contents($dir . $file, '<?php
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
};');
    }
    if (strpos($file, 'create_transaksi_keuangans_table') !== false) {
        file_put_contents($dir . $file, '<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("transaksi_keuangans", function (Blueprint $table) {
            $table->id();
            $table->date("tanggal");
            $table->enum("jenis", ["pemasukan", "pengeluaran"]);
            $table->string("kategori");
            $table->decimal("nominal", 15, 2);
            $table->text("keterangan")->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists("transaksi_keuangans"); }
};');
    }
}
echo "Done\n";
