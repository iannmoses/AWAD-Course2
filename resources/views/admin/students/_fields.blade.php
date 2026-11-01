<x-input label="Full name" name="name" :value="$student?->user?->name" placeholder="Full name" />
<x-input label="Student number" name="student_number" :value="$student?->student_number" placeholder="2023/BCC/027" />
<x-input label="Email" name="email" type="email" :value="$student?->user?->email" placeholder="name@mubs.ac.ug" />
<x-select label="Programme" name="programme" :options="\App\Models\Student::PROGRAMMES" :selected="$student?->programme" placeholder="Choose a programme" />
<x-select label="Year of study" name="year" :options="\App\Models\Student::YEARS" :selected="$student?->year" placeholder="Choose a year" />
<x-input :label="$student ? 'New password' : 'Temporary password'" name="password" type="password" :required="! $student" :hint="$student ? 'Leave blank to keep the current password.' : 'At least 8 characters. The student can change it later.'" />
