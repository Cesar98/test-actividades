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
            'fecha_disponibilidad_fin' => now()->addDays(10),
            'precio_unitario' => 20,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[]'
        ]);

        Actividad::insert([
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/4b/62/4d/photo4jpg.jpg?w=500&h=-1&s=1',
            'titulo' => 'Nevado de Toluca',
            'descripcion' => 'Parque nacional en un volcán dormido con hermosos lagos para visitar.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(10),
            'precio_unitario' => 50,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[10, 9, 8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/37/e3/fe/zoologico-de-zacango.jpg?w=500&h=400&s=1',
            'titulo' => 'Parque ecológico de Zacango',
            'descripcion' => 'Zoológico de animales, restaurantes, juegos de diversiones y un lago hermoso para estar en un bote.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(10),
            'precio_unitario' => 200,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/20/94/fe/estadio-nemesio-diez.jpg?w=500&h=400&s=1',
            'titulo' => 'Estadio Nemesio Díez',
            'descripcion' => 'Estadio de futbol perteneciente al equipo local del Toluca.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(10),
            'precio_unitario' => 400,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[]'
        ]);

        Actividad::insert([
            'imagen' => 'https://blog.uber-cdn.com/cdn-cgi/image/width=901,quality=80,onerror=redirect,format=auto/wp-content/uploads/2018/09/MX_Date-una-vuelta-por-estos-8-lugares-para-visitar-en-Toluca-la-Bella_Torres.jpg',
            'titulo' => 'Museo Torres Bicentenario',
            'descripcion' => 'Increíble museo conmemorativo de los festejos del bicentenario de la independencia.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(10),
            'precio_unitario' => 50,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[6]'
        ]);

        Actividad::insert([
            'imagen' => 'https://lh5.googleusercontent.com/p/AF1QipNBgvijgkokSvwHdvYHawd7DhHu4-oanVQryvVE=w408-h306-k-no',
            'titulo' => 'Centro cultural Mexiquense',
            'descripcion' => 'Centro cultural con hermosos museos y actividades en días festivos, así como también cuentan con cursos diversos de cultura para la población aledaña.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(20),
            'precio_unitario' => 100,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[5]'
        ]);

        Actividad::insert([
            'imagen' => 'https://www.elsoldetoluca.com.mx/incoming/poeom4-parque-alameda-2000/ALTERNATES/LANDSCAPE_1140/parque%20alameda%202000',
            'titulo' => 'Parque Alameda 2000',
            'descripcion' => 'Hermoso parque para disfrutar con la familia, cuenta con un auditorio, lagunas, canchas de deportes y juegos para divertirse.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(20),
            'precio_unitario' => 10,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8]'
        ]);

        Actividad::insert([
            'imagen' => 'https://i0.wp.com/seunonoticias.net/wp-content/uploads/2022/02/que-hacer-en-parque-metropolitano-bicentenario-toluca.jpg?fit=1200%2C740&ssl=1',
            'titulo' => 'Parque Metropolitano Bicentenario',
            'descripcion' => 'Parque urbano con árboles altos que bordean un largo lago artificial, pista de atletismo y area de skateboard.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(20),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://pbs.twimg.com/media/DRL4QQ5U8AEc7TW.jpg',
            'titulo' => 'Parque Ambiental Bicentenario',
            'descripcion' => 'Parque que cuenta con instalaciones de fútbol, ​​béisbol y monopatín, además de zonas de juego y senderos alrededor de un estanque tranquilo.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(20),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://www.eluniversal.com.mx/sites/default/files/2022/06/01/tour-teotihuacan-hacer-actividades.jpg',
            'titulo' => 'Pirámides de Teotihuacán',
            'descripcion' => 'Teotihuacán es un amplio complejo arqueológico mexicano al noreste de la Ciudad de México donde se encuentran la Pirámide de la Luna y la Pirámide del Sol.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(20),
            'precio_unitario' => 200,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://flecharoja.com.mx/images/destino-mes/ixtapan-de-la-sal-detalle-2.jpg',
            'titulo' => 'Ixtapan de la Sal',
            'descripcion' => 'Ixtapan de la Sal es uno de los 125 municipios del estado de México, tiene una superficie de 28,335 km y cuya cabecera municipal es la población homónima de Ixtapan de la Sal.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(30),
            'precio_unitario' => 275.50,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[5, 9, 10]'
        ]);

        Actividad::insert([
            'imagen' => 'https://cepanaf.edomex.gob.mx/sites/cepanaf.edomex.gob.mx/files/images/WhatsApp%20Image%202022-06-02%20at%205_56_48%20PM.jpeg',
            'titulo' => 'Parque Estatal Sierra Morelos',
            'descripcion' => 'Este parque ubicado en el municipio de Toluca y Zinacantepec, fue declarado originalmente por Decreto del Ejecutivo Estatal de fecha 22 de julio de 1976.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(30),
            'precio_unitario' => 10,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://miranda-partners.com/wp-content/uploads/2021/04/Guia-Malinalco.jpg',
            'titulo' => 'Pueblo mágico de Malinalco',
            'descripcion' => 'El municipio de Malinalco se encuentra localizado al sur del Estado de México, a 65 kilómetros de Toluca y 84 de la Ciudad de México.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(30),
            'precio_unitario' => 0,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://sf-static.sixflags.com/wp-content/uploads/Superman-1.jpg',
            'titulo' => 'Six Flags Mexico',
            'descripcion' => 'Six Flags México es un parque de diversiones ubicado en la Ciudad de México. Recibe cada año millones de visitantes, convirtiéndose en el parque temático más visitado de Latinoamérica.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(30),
            'precio_unitario' => 550.50,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Castillo_de_Chapultepec.jpg',
            'titulo' => 'Castillo de Chapultepec',
            'descripcion' => 'El Castillo de Chapultepec es un edificio ubicado en la primera sección del bosque de Chapultepec en la Ciudad de México, a 2325 metros sobre el nivel del mar.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(30),
            'precio_unitario' => 10,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);

        /*  */

        Actividad::insert([
            'imagen' => 'https://www.chapultepec.com.mx/imagenes/contenido/feria03.jpg',
            'titulo' => 'Feria de chapultepec México',
            'descripcion' => 'La Feria de Chapultepec es un parque de diversiones localizado en la Segunda Sección del Bosque de Chapultepec en la Ciudad de México.​',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(100),
            'precio_unitario' => 150.20,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[5, 9, 10]'
        ]);

        Actividad::insert([
            'imagen' => 'https://mxcity.mx/wp-content/uploads/2018/09/la-escondida.jpeg',
            'titulo' => 'La escondida es un restaurant bar con una vista impresionante ',
            'descripcion' => 'Un restaurant bar que segun algunos visitantes un pedazo de cielo en la tierra, vaya un edén. No pueden olvidar en su lista de lugares por conocer este exquisito lugar.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(100),
            'precio_unitario' => 300,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://edomex.gob.mx/sites/edomex.gob.mx/files/vallebravo1.jpg',
            'titulo' => 'Valle de Bravo',
            'descripcion' => 'Valle de Bravo es una ciudad sobre el Lago Avándaro, al oeste de Ciudad de México. El lago, rodeado de montañas arboladas, es un centro de deportes acuáticos.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(100),
            'precio_unitario' => 1000,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://ouroffbeatlife.com/wp-content/uploads/2022/04/20220329_111743-2-1-scaled.jpg',
            'titulo' => 'Grutas de Tolantongo',
            'descripcion' => 'Las Grutas de Tolantongo son un conjunto de cuevas y grutas localizadas en el municipio de Cardonal, en el estado de Hidalgo, México.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(100),
            'precio_unitario' => 200.00,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[8, 7]'
        ]);

        Actividad::insert([
            'imagen' => 'https://www.soynomada.news/__export/1612406806925/sites/debate/img/2021/02/03/grutas_de_cacahuamilpax_parque_nacional_en_guerrero_crop1612406748160.jpeg_1902800913.jpeg',
            'titulo' => 'Parque Nacional Grutas de Cacahuamilpa',
            'descripcion' => 'El parque nacional Grutas de Cacahuamilpa es un Área Natural Protegida, que de acuerdo con la Comisión Nacional de Áreas Naturales Protegidas de la SEMARNAT está dentro de la categoría de parque nacional.',
            'fecha_disponibilidad_inicio' => now(),
            'fecha_disponibilidad_fin' => now()->addDays(30),
            'precio_unitario' => 400,
            'popularidad' => random_int(70, 100),
            'actividades_relacionadas' => '[9, 8, 7]'
        ]);
    }
}
