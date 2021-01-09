<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKycsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kycs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('type');

            $table->text('nationality')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('marital_status')->nullable();
            $table->text('dob')->nullable();
            $table->text('n_o_c')->nullable();
            $table->text('spouse')->nullable();
            $table->text('occupation')->nullable();
            $table->text('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->text('servant')->nullable();
            $table->text('present_address')->nullable();
            $table->text('present_landlord')->nullable();
            $table->text('reason_for_vac')->nullable();
            $table->text('property_id')->nullable();
            $table->text('nok_name')->nullable();
            $table->text('nok_address')->nullable();
            $table->text('nok_phone')->nullable();
            $table->text('nok_relationship')->nullable();
            $table->text('rp_name')->nullable();
            $table->text('rp_relationship')->nullable();
            $table->text('refree_name')->nullable();
            $table->text('refree_email')->nullable();
            $table->text('refree_address')->nullable();
            $table->text('refree_phone')->nullable();
            $table->text('refree_occupation')->nullable();
            $table->text('gua_name')->nullable();
            $table->text('gua_email')->nullable();
            $table->text('gua_address')->nullable();
            $table->text('gua_phone')->nullable();
            $table->text('gua_occupation')->nullable();



            $table->text('company_website')->nullable();
            $table->text('company_business')->nullable();
            $table->text('ceo_name')->nullable();
            $table->text('ceo_phone')->nullable();
            $table->text('ceo_email')->nullable();
            $table->text('bill_name')->nullable();
            $table->text('bill_phone')->nullable();
            $table->text('bill_email')->nullable();
            $table->text('admin_name')->nullable();
            $table->text('admin_phone')->nullable();
            $table->text('admin_email')->nullable();
            $table->text('occu_name')->nullable();
            $table->text('occu_phone')->nullable();
            $table->text('occu_email')->nullable();
            $table->text('occu_position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kycs');
    }
}
