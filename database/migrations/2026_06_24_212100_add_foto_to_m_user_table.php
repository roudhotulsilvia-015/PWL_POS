<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoToMUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('m_user')) {
            Schema::table('m_user', function (Blueprint $table) {
                if (!Schema::hasColumn('m_user', 'foto')) {
                    $table->string('foto')->nullable()->after('password');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('m_user')) {
            Schema::table('m_user', function (Blueprint $table) {
                if (Schema::hasColumn('m_user', 'foto')) {
                    $table->dropColumn('foto');
                }
            });
        }
    }
}
