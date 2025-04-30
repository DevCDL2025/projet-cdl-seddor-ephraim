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
        Schema::table('permissions', function (Blueprint $table) {
            $table ->uuid("_id") ->after("id");
            $table->string('label') ->nullable() ->after("guard_name");
            $table->text('description') ->nullable() ->after("label");
            $table ->softDeletes();
        });

        Schema::table('roles', function (Blueprint $table) {
            $table ->uuid("_id") ->after("id");
            $table->string('label') ->nullable() ->after("guard_name");
            $table->text('description') ->nullable() ->after("label");
            $table ->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn(columns: '_id');
            $table->dropColumn(columns: 'label');
            $table->dropColumn(columns: 'description');
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn(columns: '_id');
            $table->dropColumn(columns: 'label');
            $table->dropColumn(columns: 'description');
        });
    }
};
