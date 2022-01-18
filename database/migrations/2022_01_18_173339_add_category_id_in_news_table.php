<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdInNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->foreignId('category_id')
				->after('id')
				->constrained('categories')
			    ->onDelete('cascade');

			$table->index(['slug', 'status', 'display']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex(['slug', 'status', 'display']);
			$table->dropForeign('category_id');
			$table->dropColumn('category_id');
        });
    }
}
