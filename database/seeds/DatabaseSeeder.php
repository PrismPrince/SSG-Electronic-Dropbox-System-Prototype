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
        //$this->call(UserStatusTableSeeder::class);
        //$this->call(SurveyStatusTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->insert([
	        'id' => 1000000000,
	        'fname' => 'Dave Dane',
	        'mname' => 'Agravante',
	        'lname' => 'Pacilan',
	        'username' => 'PrismPrince',
	        'email' => 'davedanepacilan3p@gmail.com',
	        'password' => Hash::make('sugarcane'),
	        'role' => 'admin',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Chiarra',
	        'lname' => 'Sebial',
	        'username' => 'Chiarra',
	        'email' => 'chiarra97@gmail.com',
	        'password' => Hash::make('chiarra'),
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('users')->insert([
	        'fname' => 'Maria Divina',
	        'mname' => 'Altarejos',
	        'lname' => 'Alegre',
	        'username' => 'MaDivina',
	        'email' => 'iyatot@gmail.com',
	        'password' => Hash::make('iyatot'),
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
	        'id' => 1000000000,
	        'user_id' => 1000000000,
	        'title' => 'Some title that attracts the students:',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla id nisi perspiciatis, magnam expedita cum porro aut molestias accusantium praesentium optio magni explicabo. Laboriosam impedit rerum est, voluptatibus explicabo optio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis veritatis voluptas voluptates libero corporis quasi eligendi aliquid minus tempora, itaque! Consequuntur veniam, sequi, voluptatem deleniti at reiciendis quis ex expedita!',
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
	        'id' => 1000000000,
	        'user_id' => 1000000000,
	        'title' => 'Some title that attracts the students:',
	        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla id nisi perspiciatis, magnam expedita cum porro aut molestias accusantium praesentium optio magni explicabo. Laboriosam impedit rerum est, voluptatibus explicabo optio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis veritatis voluptas voluptates libero corporis quasi eligendi aliquid minus tempora, itaque! Consequuntur veniam, sequi, voluptatem deleniti at reiciendis quis ex expedita!',
	        'start' => time(),
	        'end' => time(),
	        'status' => 'avtive',
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
	        'answer' => 'Option 1',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000000,
	        'answer' => 'Option 2',
	        'created_at' => date('Y-m-d H:i:s', time()),
	        'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        DB::table('options')->insert([
	        'survey_id' => 1000000000,
	        'answer' => 'Option 3',
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
	        'student_id' => 1132352,
	        'title' => 'Some title that attracts the officers?',
	        'addressed_to' => 'PTA',
	        'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla id nisi perspiciatis, magnam expedita cum porro aut molestias accusantium praesentium optio magni explicabo. Laboriosam impedit rerum est, voluptatibus explicabo optio. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis veritatis voluptas voluptates libero corporis quasi eligendi aliquid minus tempora, itaque! Consequuntur veniam, sequi, voluptatem deleniti at reiciendis quis ex expedita!',
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
    }
}