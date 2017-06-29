<?php namespace Lovata\Shopaholic\Updates;

use October\Rain\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * Class CreateTableCategories
 * @package Lovata\Shopaholic\Updates
 */
class CreateTableCategories extends Migration
{
    public function up()
    {
        if(Schema::hasTable('lovata_shopaholic_categories')) {
            return;
        }

        Schema::create('lovata_shopaholic_categories', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->boolean('active')->default(0);
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->string('external_id')->nullable();
            $table->text('preview_text')->nullable();
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('nest_left')->nullable()->unsigned();
            $table->integer('nest_right')->nullable()->unsigned();
            $table->integer('nest_depth')->nullable()->unsigned();
            $table->timestamps();

            $table->index('name');
            $table->index('slug');
            $table->index('code');
            $table->index('external_id');

            $table->unique('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lovata_shopaholic_categories');
    }
}