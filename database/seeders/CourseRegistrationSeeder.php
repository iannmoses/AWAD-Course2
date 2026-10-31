<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Database\Seeder;

class CourseRegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $this->register('24/U/05478/PS', 'BUC 3131', '2026-09-14');
        $this->register('24/U/05478/PS', 'BUC 3102', '2026-09-15');
        $this->register('24/U/04456/PS', 'BAM 3105', '2026-09-15');
        $this->register('24/U/04456/PS', 'BAM 3110', '2026-09-16');
        $this->register('24/U/20216/PS', 'BUC 3131', '2026-09-14');
        $this->register('24/U/20216/PS', 'BUC 3102', '2026-09-17');
        $this->register('24/U/12345/EVE', 'BAM 3105', '2026-09-16');
        $this->register('24/U/12345/EVE', 'BAM 3110', '2026-09-18');
        $this->register('24/U/12345/EVE', 'BUC 3131', '2026-09-19');
        $this->register('24/U/05478/PS', 'BUC 3102', '2026-09-20');
        $this->register('24/U/20216/PS', 'BAM 3110', '2026-09-21');
    }

    private function register(string $studentNumber, string $courseCode, string $date): void
    {
        CourseRegistration::firstOrCreate(
            [
                'student_id' => Student::where('student_number', $studentNumber)->value('id'),
                'course_id' => Course::where('course_code', $courseCode)->value('id'),
            ],
            ['registration_date' => $date, 'status' => 'registered']
        );
    }
}
