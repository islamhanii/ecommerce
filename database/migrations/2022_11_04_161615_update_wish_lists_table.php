<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWishListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_id');
            $table->unsignedBigInteger('product_details_id')->after('user_id');
            $table->foreign('product_details_id')->references('id')->on('product_details')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            //
        });
    }
}
