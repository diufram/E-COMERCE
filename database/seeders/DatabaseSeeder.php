<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Categoria::create([
           'id'=>'1', 
           'nombre'=>'POLERAS', 
           'descripcion'=>'...', 
        ]);
        \App\Models\Categoria::create([
            'id'=>'2', 
            'nombre'=>'CAMISAS', 
            'descripcion'=>'...', 
         ]);
         \App\Models\Categoria::create([
            'id'=>'3', 
            'nombre'=>'POLOS', 
            'descripcion'=>'...', 
         ]);


         \App\Models\Sucursal::create([
            'id'=>'1', 
            'nombre'=>'SUCURSAL 1', 
            'ubicacion'=>'...', 
         ]);

         \App\Models\Sucursal::create([
            'id'=>'2', 
            'nombre'=>'SUCURSAL 2', 
            'ubicacion'=>'...', 
         ]);


         \App\Models\Talla::create([
            'id'=>'1', 
            'size'=>'XXL',
         ]);
         \App\Models\Talla::create([
            'id'=>'2', 
            'size'=>'XS',
         ]);
    }
}
