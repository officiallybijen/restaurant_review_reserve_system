<!-- <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reserve_id');
            $table->foreign('reserve_id')->nullable()->references('reserves')->on('id')->onDelete('set null');

            $table->unsignedInteger('table_number')->unique();
            $table->unsignedInteger('capacity')->default(2);            
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
        Schema::dropIfExists('tables');
    }
} -->
