<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // CATEGORIES

  			DB::table('categories')->insert([
	  			[	'name' => 'Oficial',
	  				'description' => 'Comunicados y temas de gran importancia para la comunidad de TuForo.Net.',
	  				'url' => '/oficial'
	  			],
	  			[	'name' => 'General',
	  				'description' => 'Charlas, esparcimiento y temas que no tienen cabida en los otros subforos.',
	  				'url' => '/general'
	  			],
	  			[	'name' => 'Motor',
	  				'description' => 'Todo sobre el motor: Coches, Noticias, Curiosidades ...',
	  				'url' => '/motor'
	  			],
	  			[	'name' => 'Noticias',
	  				'description' => 'Temas de actualidad y noticias de prensa.',
	  				'url' => '/noticias'
	  			],
	  			[	'name' => 'Informática',
	  				'description' => 'Temas relacionados con la Tecnología, Informática, Smartphones ...',
	  				'url' => '/informatica'
	  			],
	  			[	'name' => 'Juegos',
	  				'description' => 'Temas sobre Videojuegos, independientemente de su plataforma.',
	  				'url' => '/juegos'
	  			],
	  			[	'name' => 'Música',
	  				'description' => 'Conciertos, festivales, lanzamientos y todo lo relacionado con el mundo de la música.',
	  				'url' => '/musica'
	  			],
	  			[	'name' => 'Política',
	  				'description' => 'Ideologías, partidos políticos, debates ...',
	  				'url' => '/politica'
	  			],
	  			[	'name' => 'Fitness',
	  				'description' => 'Temas relacionados con el mundo del Fitness, el gimnasio y las pesas.',
	  				'url' => '/fitness'
	  			],
	  			[	'name' => 'Deportes',
	  				'description' => 'Todo lo relacionado con temas deportivos como fútbol, baloncesto, tennis ...',
	  				'url' => '/deportes'
	  			],
	  			[	'name' => 'Criptomonedas',
	  				'description' => 'Todo lo relacionado con Bitcoin, Ethereum, Blockchain ...',
	  				'url' => '/criptomonedas'
	  			]
	  		]);  

	  	// THREADS

  			DB::table('threads')->insert([
  				[	'category' => 1,
  					'thread' => 'Bienvenidos a TuForo.Net',
  					'created_at' => Carbon::now(),
  					'creator' => 'ViBoXx'
  				]
  			]);

  		// MESSAGES

  			DB::table('messages')->insert([
  				[	'thread_id' => 1,
  					'on_thread_id' => 1,
  					'creator' => 1,
  					'content' => '<b>Bienvenidos a TuForo.Net!</b> :D'
  				]
  			]);
    }
}
