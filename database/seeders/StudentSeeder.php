<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $this->makeStudent('ian.gatete@mubs.ac.ug', '24/U/05478/PS', 'Business Computing', 'Year III');
        $this->makeStudent('naluwooza.janat@mubs.ac.ug', '24/U/04456/PS', 'Business Computing', 'Year III');
        $this->makeStudent('ssenkaayi.martin@mubs.ac.ug', '24/U/20216/PS', 'Business Administration', 'Year II');
        $this->makeStudent('ntemu.robertson@mubs.ac.ug', '24/U/12345/EVE', 'Business Computing', 'Year III');
        $this->makeStudent('shivan.komugisha@mubs.ac.ug', '24/U/0586', 'Business Computing', 'Year III');
    }

    private function makeStudent(string $email, string $number, string $programme, string $year): void
    {
        Student::firstOrCreate(
            ['student_number' => $number],
            ['user_id' => User::where('email', $email)->value('id'), 'programme' => $programme, 'year' => $year]
        );
    }
}
