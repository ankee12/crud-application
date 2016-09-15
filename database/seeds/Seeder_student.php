<?php

use Illuminate\Database\Seeder;
use App\models\Student;
class Seeder_student extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $student = new Student();
	   $student -> firstname='Ankit';
	   $student -> lastname='Singhal';
	   $student -> dob='2016-12-16';
	   $student -> pob='Ankee';
	   $student -> save();
    }
}
