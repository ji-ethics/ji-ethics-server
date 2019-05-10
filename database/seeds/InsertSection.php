<?php

use Illuminate\Database\Seeder;

class InsertSection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$array = ['19SU', '19FA', '20SP'];
    	$users = DB::table('users')->get();
    	$student_id  = array();
    	$section_numbers  = array();
    	$semesters  = array();
    	for($i = 1;$i<42;$i++){
    		$student_id[] = random_int(517370910000, 517370919999);
    		$section_numbers[] = random_int(1, 3);
    		$semesters[] = $array[random_int(0, 2)];

    	}
    	// foreach ($users as $user) {
    	// 	$user->studentIDs  = random_int(517370910000, 517370919999);

    	// }
    	for($i = 1;$i<41;$i++){
    		DB::table('users')
    		->where('id', $i)
    		->update([	
        		'studentIDs' => $student_id[$i], 
        		'section_numbers' => $section_numbers[$i] , 
        		'semesters' => $semesters[$i]
        ]);	
    	}
        
    }
}
