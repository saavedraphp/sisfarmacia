<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        factory(Task::class,5)->create();
         
        /*
        $date = \Carbon\Carbon::now()->toDateString();
        $types = array(
            array('keep' =>'detalle'
            ),
            array('keep' =>'detalle 2' 
            ),
            array('keep' =>'detalle')
        );

        foreach($types as $type)
        {
            $task = new \App\Task();
            $task->keep  = $type['keep'];
            $task->save();

        }
        */
    }   
}
