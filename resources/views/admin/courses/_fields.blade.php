<x-input label="Course code" name="course_code" :value="$course?->course_code" placeholder="BUC 3131" />
<x-input label="Course title" name="course_name" :value="$course?->course_name" placeholder="Course title" />
<x-input label="Credit units" name="credit_units" type="number" :value="$course?->credit_units" placeholder="4" />
<x-select label="Lecturer" name="lecturer_id" :options="$lecturers->pluck('name', 'id')->all()" :selected="$course?->lecturer_id" placeholder="Choose a lecturer" />
