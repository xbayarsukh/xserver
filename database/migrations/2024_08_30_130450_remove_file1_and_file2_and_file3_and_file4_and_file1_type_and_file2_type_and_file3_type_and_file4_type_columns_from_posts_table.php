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
        Schema::table('posts', function (Blueprint $table) {
                  // Drop the 'image' and 'video' columns if they exist
                  if (Schema::hasColumn('posts', 'file1')) {
                    $table->dropColumn('file1');
                }

                  if (Schema::hasColumn('posts', 'file2')) {
                    $table->dropColumn('file2');
                }

                  if (Schema::hasColumn('posts', 'file3')) {
                    $table->dropColumn('file3');
                }

                  if (Schema::hasColumn('posts', 'file4')) {
                    $table->dropColumn('file4');
                }
                  if (Schema::hasColumn('posts', 'file1_type')) {
                    $table->dropColumn('file1_type');
                }
                  if (Schema::hasColumn('posts', 'file2_type')) {
                    $table->dropColumn('file2_type');
                }
                  if (Schema::hasColumn('posts', 'file3_type')) {
                    $table->dropColumn('file3_type');
                }
                  if (Schema::hasColumn('posts', 'file4_type')) {
                    $table->dropColumn('file4_type');
                }



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
