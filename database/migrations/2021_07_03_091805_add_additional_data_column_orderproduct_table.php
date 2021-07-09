<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalDataColumnOrderproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->integer('qty')->after('name');
            $table->integer('size')->after('qty');
            $table->string('color')->after('size');
            $table->integer('sale_price')->after('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('qty');
            $table->dropColumn('size');
            $table->dropColumn('color');
            $table->dropColumn('sale_price');
        });
    }
}
