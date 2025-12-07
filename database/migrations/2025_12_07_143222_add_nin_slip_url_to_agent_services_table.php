<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNinSlipUrlToAgentServicesTable extends Migration
{
    public function up()
    {
        Schema::table('agent_services', function (Blueprint $table) {
            $table->string('nin_slip_url')->nullable()->after('description');
        });
    }

    public function down()
    {
        Schema::table('agent_services', function (Blueprint $table) {
            $table->dropColumn('nin_slip_url');
        });
    }
}