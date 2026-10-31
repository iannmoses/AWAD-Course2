<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $this->makeCourse('BUC 3131', 'Advanced Web Application Development', 4, 'mosh.gyagenda@mubs.ac.ug');
        $this->makeCourse('BUC 3102', 'Mobile Application Development', 4, 'mosh.gyagenda@mubs.ac.ug');
        $this->makeCourse('BAM 3105', 'Information Security Auditing', 3, 'tiko.joy@mubs.ac.ug');
        $this->makeCourse('BAM 3110', 'Accounting and Information Systems', 3, 'bashir.mutebi@mubs.ac.ug');
    }

    private function makeCourse(string $code, string $name, int $units, string $lecturerEmail): void
    {
        Course::firstOrCreate(
            ['course_code' => $code],
            ['course_name' => $name, 'credit_units' => $units, 'lecturer_id' => User::where('email', $lecturerEmail)->value('id')]
        );
    }
}
