<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = \Carbon\Carbon::now()->toDateString();
        //'email' => Str::random(10).'@gmail.com',
        //'password' => Hash::make('password'),

        //#1
        DB::table('productos')->insert([
            'empr_id' => 1,
            'pres_id' => 1, //1 unidad, 2 Caja
            'prod_nombre' =>'Workstation Lenovo P320 SFF',
            'prod_codigo' =>'EL-50125',
            'prod_sku' =>'EA-5478445',
            'prod_ean' =>'20020025',
            'prod_cantidad' =>4,
            'prod_ean' =>'21458741',
            'prod_precio' =>'8750',
            'prod_serie' =>'S8745123',
            'prod_lote' =>'00014521',
            'prod_comentario' =>'Workstation Lenovo P320 SFF, Intel Xeon E3-1240 V6 de 3.7 GHz, 16GB DDR4, Disco SSD de 500GB . DVD SuperMulti, video Nvidia Quadro P600 2GB, LAN GbE, teclado y mouse USB. Sistema Operativo Windows 10 Pro 64-bits. - Producto Usado Garantia 12 Meses',
            'prod_stock' =>4,
            'prod_estado' =>'ACTI',
            'prod_fecha_vencimiento' =>NULL,
            'created_at' =>$date,
            'updated_at' =>$date
        ]);
 
        //#2 
        DB::table('productos')->insert([
            'empr_id' => 1,
            'pres_id' => 1, //1 unidad, 2 Caja
            'prod_nombre' =>'Laptops, Ultrabooks',
            'prod_codigo' =>'LAP-501',
            'prod_sku' =>'EA-5212542',
            'prod_ean' =>'1000012',
            'prod_cantidad' =>5,
            'prod_ean' =>'1000012',
            'prod_precio' =>'7500',
            'prod_serie' =>'S4521224',
            'prod_lote' =>'00005422',
            'prod_comentario' =>'Lenovo 100e Chromebook Gen 2 - Black',
            'prod_stock' =>5,
            'prod_estado' =>'ACTI',
            'prod_fecha_vencimiento' =>NULL,
            'created_at' =>$date,
            'updated_at' =>$date
        ]); 
        
        //#3
        DB::table('productos')->insert([
            'empr_id' => 1,
            'pres_id' => 1, //1 unidad, 2 Caja
            'prod_nombre' =>'Notebook Lenovo Thinkpad L15, 15.6"',
            'prod_codigo' =>'NLP-201',
            'prod_sku' =>'EA-21458',
            'prod_ean' =>'00147854',
            'prod_cantidad' =>6,
            'prod_ean' =>'00124578',
            'prod_precio' =>'11350',
            'prod_serie' =>'S00021458',
            'prod_lote' =>'00014521',
            'prod_comentario' =>'Notebook Lenovo Thinkpad L15, 15.6" LED HD, Intel Core i7-10510U 1.8GHz, 8GB DDR4, 1TB HDD Video AMD Radeon 625, 2GB GDDR5, Intel Wi-Fi 6 AX200 2x2 802.11ax, Bluetooth, Cámara Web. Sistema Operativo WIndows 10 Pro 64-Bits en Español',
            'prod_stock' =>6,
            'prod_estado' =>'ACTI',
            'prod_fecha_vencimiento' =>NULL,
            'created_at' =>$date,
            'updated_at' =>$date
        ]);         

    }
}
