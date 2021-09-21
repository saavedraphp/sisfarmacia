<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $date = \Carbon\Carbon::now()->toDateString();

        //#1 
        DB::table('empresas')->insert([

            'empr_nombre' => 'Data Solution',
            'empr_ruc' =>'20402218370',
            'empr_direccion' =>'Av Dionisio Derteño 102 - San Isidro Lima',
            'empr_telefono' =>'5612938',
            'empr_celular' =>'960203783',
            'empr_correo' =>'informes@datasoluion.com',
            'empr_estado' =>'ACTI',

            'created_at' =>$date,
            'updated_at' =>$date
        ]); 

        //#2 
        DB::table('empresas')->insert([

            'empr_nombre' => 'Botica Los Precursores',
            'empr_ruc' =>'20369871245',
            'empr_direccion' =>'Av Los Precursores 269 - Maranga San Miguel',
            'empr_telefono' =>'4872063',
            'empr_celular' =>'980560812',
            'empr_correo' =>'informes@boticalosprecursores.com',
            'empr_estado' =>'ACTI',

            'created_at' =>$date,
            'updated_at' =>$date
 
        ]);  


        //#3 
        DB::table('empresas')->insert([

            'empr_nombre' => 'Forever21',
            'empr_ruc' =>'20560203783',
            'empr_direccion' =>'Av Javier Prado 785 int 105 - Maranga San Miguel',
            'empr_telefono' =>'3785412',
            'empr_celular' =>'970204987',
            'empr_correo' =>'informes@forever21boticalosprecursores.com',
            'empr_estado' =>'ACTI',

            'created_at' =>$date,
            'updated_at' =>$date
 
        ]);


    }
}
