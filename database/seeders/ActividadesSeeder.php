<?php

namespace Database\Seeders;

use App\Models\Actividad;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Actividad::insert([
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/38/7b/24/the-colours-of-the-cosmovitral.jpg?w=500&h=-1&s=1',
            'titulo' => 'Cosmovitral',
            'descripcion' => 'Jardín botánico con hermosos vitrales y más de 400 distintas especies de plantas.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[]'
        ]);

        Actividad::insert([
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/4b/62/4d/photo4jpg.jpg?w=500&h=-1&s=1',
            'titulo' => 'Nevado de Toluca',
            'descripcion' => 'Parque nacional en un volcán dormido con hermosos lagos para visitar.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[10, 9, 8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/37/e3/fe/zoologico-de-zacango.jpg?w=500&h=400&s=1',
            'titulo' => 'Parque ecológico de Zacango',
            'descripcion' => 'Zoológico de animales, restaurantes, juegos de diversiones y un lago hermoso para estar en un bote.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 200,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/20/94/fe/estadio-nemesio-diez.jpg?w=500&h=400&s=1',
            'titulo' => 'Estadio Nemesio Díez',
            'descripcion' => 'Estadio de futbol perteneciente al equipo local del Toluca.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 400,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[]'
        ]);

        Actividad::insert([
            'imagen' => 'https://blog.uber-cdn.com/cdn-cgi/image/width=901,quality=80,onerror=redirect,format=auto/wp-content/uploads/2018/09/MX_Date-una-vuelta-por-estos-8-lugares-para-visitar-en-Toluca-la-Bella_Torres.jpg',
            'titulo' => 'Museo Torres Bicentenario',
            'descripcion' => 'Increíble museo conmemorativo de los festejos del bicentenario de la independencia.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 50,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[6]'
        ]);

        Actividad::insert([
            'imagen' => 'https://lh5.googleusercontent.com/p/AF1QipNBgvijgkokSvwHdvYHawd7DhHu4-oanVQryvVE=w408-h306-k-no',
            'titulo' => 'Centro cultural Mexiquense',
            'descripcion' => 'Centro cultural con hermosos museos y actividades en días festivos, así como también cuentan con cursos diversos de cultura para la población aledaña.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[5]'
        ]);

        Actividad::insert([
            'imagen' => 'https://www.elsoldetoluca.com.mx/incoming/poeom4-parque-alameda-2000/ALTERNATES/LANDSCAPE_1140/parque%20alameda%202000',
            'titulo' => 'Parque Alameda 2000',
            'descripcion' => 'Hermoso parque para disfrutar con la familia, cuenta con un auditorio, lagunas, canchas de deportes y juegos para divertirse.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8]'
        ]);

        Actividad::insert([
            'imagen' => 'https://i0.wp.com/seunonoticias.net/wp-content/uploads/2022/02/que-hacer-en-parque-metropolitano-bicentenario-toluca.jpg?fit=1200%2C740&ssl=1',
            'titulo' => 'Parque Metropolitano Bicentenario',
            'descripcion' => 'Parque urbano con árboles altos que bordean un largo lago artificial, pista de atletismo y area de skateboard.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://pbs.twimg.com/media/DRL4QQ5U8AEc7TW.jpg',
            'titulo' => 'Parque Ambiental Bicentenario',
            'descripcion' => 'Parque que cuenta con instalaciones de fútbol, ​​béisbol y monopatín, además de zonas de juego y senderos alrededor de un estanque tranquilo.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://universes.art/fileadmin/_migrated/gridelement_uploads',
            'titulo' => 'Pirámides de Teotihuacán',
            'descripcion' => 'Teotihuacán es un amplio complejo arqueológico mexicano al noreste de la Ciudad de México donde se encuentran la Pirámide de la Luna y la Pirámide del Sol.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(random_int(1,10)),
            'precio_unitario' => 200,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);

    }
}
