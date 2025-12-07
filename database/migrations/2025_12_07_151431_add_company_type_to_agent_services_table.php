<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyTypeToAgentServicesTable extends Migration
{
    public function up()
    {
        Schema::table('agent_services', function (Blueprint $table) {
            $table->string('company_type')->nullable()->after('company_name');
        });
    }

    public function down()
    {
        Schema::table('agent_services', function (Blueprint $table) {
            $table->dropColumn('company_type');
        });
    }
}