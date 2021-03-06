<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInternalShiftColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('Doctor', function (Blueprint $table) {
            //
            $table->renameColumn('mustOnDutyInternalShifts', 'mustOnDutyMedicalShifts');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('Doctor', function (Blueprint $table) {
            //
            $table->renameColumn('mustOnDutyMedicalShifts', 'mustOnDutyInternalShifts');
        });
    }
}
