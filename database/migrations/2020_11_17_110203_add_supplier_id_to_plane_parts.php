<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupplierIdToPlaneParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plane_parts', function (Blueprint $table) {
            if (!Schema::hasColumn('plane_parts', 'is_orderable')) {
                $table->boolean('is_orderable')
                    ->after('part_type')
                    ->default(true);
            }

            if (!Schema::hasColumn('plane_parts', 'supplier_id')) {
                $table->unsignedBigInteger('supplier_id')->after('is_orderable')->nullable();
                $table->foreign('supplier_id')
                    ->references('id')
                    ->on('suppliers')
                    ->onDelete('set null');
            };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plane_parts', function (Blueprint $table) {
            $table->dropColumn(['is_orderable']);
            $table->dropColumn(['supplier_id']);
        });
    }
}
