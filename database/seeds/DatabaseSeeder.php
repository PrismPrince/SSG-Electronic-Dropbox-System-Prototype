<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(SurveysTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(SuggestionsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(OptionStudentTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->insert([
	        'id' => 1000000000, // init
	        'fname' => 'Dave Dane',
	        'mname' => 'Agravante', // optional
	        'lname' => 'Pacilan',
	        'username' => 'PrismPrince', // unique | min:6
	        'email' => 'davedanepacilan3p@gmail.com', // unique
	        'password' => Hash::make('12345678'), // min:8
	        'role' => 'admin',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Chiarra',
	        'lname' => 'Sebial',
	        'username' => 'Chiarra',
	        'email' => 'chiarra97@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Maria Divina',
	        'mname' => 'Altarejos',
	        'lname' => 'Alegre',
	        'username' => 'MaDivina',
	        'email' => 'iyatot@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Rachel Anne',
	        'mname' => 'Agravante',
	        'lname' => 'Quiamco',
	        'username' => 'Shelan',
	        'email' => 'rachelannequiamco3t@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'John Dominique',
	        'mname' => 'Alforque',
	        'lname' => 'Lawas',
	        'username' => 'nique123',
	        'email' => 'nique@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Ronnel',
	        'mname' => 'Motesa',
	        'lname' => 'Heredia',
	        'username' => 'rh1234',
	        'email' => 'rh1234@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Sealtiel Kent',
	        'mname' => 'Obial',
	        'lname' => 'Generale',
	        'username' => 'CaptainLevi',
	        'email' => 'captainlevi@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Jesscel',
	        'mname' => 'Pepito',
	        'lname' => 'Zapanta',
	        'username' => 'Jesscel',
	        'email' => 'jesscelzapanta@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Jullianne Kae',
	        'mname' => 'Tajanlangit',
	        'lname' => 'Pongasi',
	        'username' => 'JKpongasi',
	        'email' => 'julliannepongasi@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'April Grace',
	        'mname' => 'Amit',
	        'lname' => 'Mongaya',
	        'username' => 'AGmongaya',
	        'email' => 'aprilgracemongaya@gmail.com',
	        'password' => Hash::make('12345678'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
	}
}

class PostsTableSeeder extends Seeder
{
	public function run()
    {
    	DB::table('posts')->insert([
	        'id' => 1000000000, // init
	        'user_id' => 1000000000, // on:users
	        'title' => 'Some title that attracts the students:',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla id nisi perspiciatis, magnam expedita cum porro aut molestias accusantium praesentium optio magni explicabo. Laboriosam impedit rerum est, voluptatibus explicabo optio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis veritatis voluptas voluptates libero corporis quasi eligendi aliquid minus tempora, itaque! Consequuntur veniam, sequi, voluptatem deleniti at reiciendis quis ex expedita!',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000006,
	        'title' => 'Facundo Lamu',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae voluptatem sequi culpa nisi ullam facilis, incidunt maxime asperiores libero ex minima perferendis tempore, voluptates, minus unde sed aperiam? Qui.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000002,
	        'title' => 'Another Title',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius suscipit cumque doloribus beatae modi sint voluptates, dicta debitis? Similique ratione commodi in, ipsam deserunt cupiditate error hic rerum. Cupiditate, eligendi. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000001,
	        'title' => 'Some Title',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit recusandae hic fugiat laudantium obcaecati deleniti. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima sapiente fugiat, corporis facere amet. Voluptates repellendus, accusantium inventore pariatur eos tenetur hic vel nostrum ullam eveniet, in repudiandae impedit nihil. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000004,
	        'title' => 'SSG - Tomorrow\'s Council',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000009,
	        'title' => 'Simple Plan',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, iusto blanditiis fugit minima reiciendis nemo, dicta corporis magnam, recusandae, delectus vero facilis deserunt eos neque porro voluptas eligendi odit. Accusamus! Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000003,
	        'title' => 'Another Title',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, facilis et. Aliquid consequuntur sit aut nam cum doloremque laudantium? Deleniti magnam ea odit voluptas eaque ratione ullam dolorum, quod cumque! Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000005,
	        'title' => 'Goshness',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi id nemo rem, repellat illo necessitatibus tempore eos, quam unde doloremque aperiam et fugit sint nisi earum. Voluptatibus omnis, laudantium assumenda. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000007,
	        'title' => 'The F!',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo nostrum nobis voluptas amet vel iure obcaecati animi odit molestias reprehenderit facilis earum impedit nam laboriosam dolores, enim laborum iusto eveniet! Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000008,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor quasi nobis fugiat sequi, obcaecati provident eligendi voluptates cum autem, saepe quisquam et ad quod natus sunt repudiandae. Ex, unde numquam. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000009,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, facilis et, ipsam at consectetur, eos beatae optio magni harum voluptates vitae corrupti itaque? Dicta, necessitatibus a excepturi voluptas fugiat incidunt. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000005,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae aspernatur perferendis laborum omnis repellat, id. Quo quidem, vitae fugit? Pariatur hic, placeat, perferendis unde voluptas praesentium vero illum ipsa error. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000001,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa reiciendis, maiores exercitationem non corrupti id debitis, et dolorem numquam at, harum ab commodi. Provident voluptas, ex officiis nesciunt atque aperiam? Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000007,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla iste repudiandae nesciunt ea nihil a vitae totam cum nostrum, repellendus, quidem accusantium, dolorum reiciendis quisquam facere adipisci. Labore eligendi, maxime. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000003,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque optio consequuntur vero, voluptatem omnis corporis facere ex dolorem ratione tempora ipsum impedit, quo consectetur, ut beatae ipsa laboriosam iusto. Nostrum! Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000004,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni consequuntur suscipit mollitia quis distinctio nulla velit cupiditate quas corporis iusto impedit consequatur architecto quos aliquam beatae similique porro, maxime molestiae. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000006,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat voluptate sit autem sapiente omnis repudiandae natus veritatis. Beatae illo, earum architecto laudantium, culpa nemo et provident, illum esse, maiores assumenda. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000004,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat voluptate sit autem sapiente omnis repudiandae natus veritatis. Beatae illo, earum architecto laudantium, culpa nemo et provident, illum esse, maiores assumenda. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000002,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat voluptate sit autem sapiente omnis repudiandae natus veritatis. Beatae illo, earum architecto laudantium, culpa nemo et provident, illum esse, maiores assumenda. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000008,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat voluptate sit autem sapiente omnis repudiandae natus veritatis. Beatae illo, earum architecto laudantium, culpa nemo et provident, illum esse, maiores assumenda. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('posts')->insert([
	        'user_id' => 1000000000,
	        'title' => 'OMG, Oh My Girl',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat voluptate sit autem sapiente omnis repudiandae natus veritatis. Beatae illo, earum architecto laudantium, culpa nemo et provident, illum esse, maiores assumenda. Velit recusandae hic fugiat laudantium obcaecati deleniti. Sint doloremque facere aspernatur id, quae libero vel, eos in suscipit corporis ducimus asperiores mollitia.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}

class SurveysTableSeeder extends Seeder
{
	public function run()
    {
    	DB::table('surveys')->insert([
	        'id' => 1000000000, // init
	        'user_id' => 1000000000, // on:users
	        'title' => 'Apple, Orange, Banana',
	        'desc' => 'Love them? Which is healthy for you? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium voluptates esse excepturi veritatis officia non at voluptas, illo ducimus voluptatum libero ea perferendis itaque accusantium expedita. Commodi rerum ad labore.',
	        'start' => date('Y-m-d H:i:s', time() + 604800),
	        'end' => date('Y-m-d H:i:s', time() + 1209600),
	        'status' => 'active', // value:active,,inactive,expired
	        'type' => 'checkbox', // value:checkbox,radio
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('surveys')->insert([
	        'user_id' => 1000000003,
	        'title' => 'Pak o Ganern',
	        'desc' => "Pak! Kung mo togut kang ipa tang-tang ang imong lipstick na pula kaayo\r\r\rGanern! Kung gusto nimo di ka pasudlon sa school! HAGBUNGON BE!!!",
	        'start' => date('Y-m-d H:i:s', time() - 604800),
	        'end' => date('Y-m-d H:i:s', time() + 604800),
	        'status' => 'active',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('surveys')->insert([
	        'user_id' => 1000000009,
	        'title' => 'Yes! No!',
	        'desc' => "Gwapa si CHIARRA??? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure explicabo id aliquam ab facilis eveniet dolores, odit odio, aliquid repellat ipsa nisi, numquam voluptate harum soluta deleniti ut reprehenderit deserunt!",
	        'start' => date('Y-m-d H:i:s', time() - 1209600),
	        'end' => date('Y-m-d H:i:s', time() - 604800),
	        'status' => 'active',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('surveys')->insert([
	        'user_id' => 1000000002,
	        'title' => 'Pili sa maay0: Lenovo, Asus, HP, Secondhand?',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure explicabo id aliquam ab facilis eveniet dolores, odit odio, aliquid repellat ipsa nisi, numquam voluptate harum soluta deleniti ut reprehenderit deserunt!',
	        'start' => date('Y-m-d H:i:s', time() - 604799),
	        'end' => date('Y-m-d H:i:s', time() + 604800),
	        'status' => 'active',
	        'type' => 'checkbox',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}

class OptionsTableSeeder extends Seeder
{
	public function run()
    {
    	DB::table('options')->insert([
	        'survey_id' => 1000000000,
	        'answer' => 'Orange',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000000,
	        'answer' => 'Banana',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000000,
	        'answer' => 'Apple',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000001,
	        'answer' => 'Pak',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000001,
	        'answer' => 'Ganern',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000002,
	        'answer' => 'Yes!',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000002,
	        'answer' => 'No!',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000003,
	        'answer' => 'Lenovo',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000003,
	        'answer' => 'Asus',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000003,
	        'answer' => 'HP',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000003,
	        'answer' => 'Secondhand',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}

class StudentsTableSeeder extends Seeder
{
	public function run()
    {
    	DB::table('students')->insert([
	        'id' => 1132352,
	        'fname' => 'Dave Dane',
	        'mname' => 'Agravante',
	        'lname' => 'Pacilan',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('students')->insert([
	        'id' => 1142793,
	        'fname' => 'John Dominique',
	        'mname' => 'Alforque',
	        'lname' => 'Lawas',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('students')->insert([
	        'id' => 1141274,
	        'fname' => 'Maria Divina',
	        'mname' => 'Altarejos',
	        'lname' => 'Alegre',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('students')->insert([
	        'id' => 1141480,
	        'fname' => 'Chiarra',
	        'lname' => 'Sebial',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('students')->insert([
	        'id' => 1135000,
	        'fname' => 'Rachel Anne',
	        'mname' => 'Agravante',
	        'lname' => 'Quiamco',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('students')->insert([
	        'id' => 1142326,
	        'fname' => 'Sealtiel Kent',
	        'mname' => 'Obial',
	        'lname' => 'Generale',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('students')->insert([
	        'id' => 1144924,
	        'fname' => 'Ronnel',
	        'mname' => 'Motesa',
	        'lname' => 'Heredia',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}

class SuggestionsTableSeeder extends Seeder
{
	public function run()
    {
    	DB::table('suggestions')->insert([
	        'student_id' => 1132352, // on:students
	        'title' => 'Some title that attracts the officers?',
	        'addressed_to' => 'PTA',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla id nisi perspiciatis, magnam expedita cum porro aut molestias accusantium praesentium optio magni explicabo. Laboriosam impedit rerum est, voluptatibus explicabo optio.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('suggestions')->insert([
	        'student_id' => 1142793, // on:students
	        'title' => 'Pangutana pa ni?',
	        'addressed_to' => 'SSG Pres',
	        'desc' => 'Nulla id nisi perspiciatis, magnam expedita cum porro aut molestias accusantium praesentium optio magni explicabo. Laboriosam impedit rerum est, voluptatibus explicabo optio.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('suggestions')->insert([
	        'student_id' => 1142793, // on:students
	        'title' => 'Pangutana pa ni?',
	        'addressed_to' => 'SSG Pres',
	        'desc' => 'Naa pay sling? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla id nisi perspiciatis, magnam expedita cum porro aut molestias accusantium praesentium optio magni explicabo. Laboriosam impedit rerum est, voluptatibus explicabo optio.',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}

class OptionStudentTableSeeder extends Seeder
{
	public function run()
    {
    	DB::table('option_student')->insert([
	        'student_id' => 1141274,
	        'option_id' => 1,
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('option_student')->insert([
	        'student_id' => 1141480,
	        'option_id' => 2,
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('option_student')->insert([
	        'student_id' => 1132352,
	        'option_id' => 2,
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('option_student')->insert([
	        'student_id' => 1142793,
	        'option_id' => 2,
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('option_student')->insert([
	        'student_id' => 1135000,
	        'option_id' => 3,
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('option_student')->insert([
	        'student_id' => 1135000,
	        'option_id' => 4,
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}