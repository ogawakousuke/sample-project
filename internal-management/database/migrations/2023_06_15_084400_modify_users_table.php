<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
 
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', '氏名');
            $table->renameColumn('email', 'メールアドレス');
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('氏名', 'name');
            $table->renameColumn('メールアドレス', 'email');
        });
    }
}
