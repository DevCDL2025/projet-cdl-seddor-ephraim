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
        Schema::table('users', function (Blueprint $table) {
            $table ->uuid("_id") ->after("id");
            $table ->renameColumn("name", "last_name");
            $table ->string('last_name')->nullable()->change();
            $table ->string("first_name")->after("last_name");
            $table ->string("gender") ->nullable() ->after('first_name');
            $table ->string("birthday") ->nullable() ->after('gender');
            $table ->string('username') ->unique() ->nullable() ->after('email');
            $table ->string('phone_number') ->nullable() ->after('username');
            $table ->timestamp("has_agreed_with_policy_and_terms_at") ->nullable() ->after('remember_token');
            $table->timestamp('last_login_at')->nullable();
            $table ->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(columns: '_id');
            $table->dropColumn(columns: 'last_name');
            $table->dropColumn(columns: 'first_name');
            $table->dropColumn(columns: 'gender');
            $table->dropColumn(columns: 'username');
            $table->dropColumn(columns: 'phone_number');
            $table->dropColumn(columns: 'has_agreed_with_policy_and_terms_at');
            $table->dropColumn(columns: 'last_login_at');
        });
    }
};
