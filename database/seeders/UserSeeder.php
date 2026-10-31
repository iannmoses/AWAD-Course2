<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->makeUser('Kato Hussein', 'admin@mubs.ac.ug', 'Admin@2026', 'admin');

        $this->makeUser('Mr. Mosh Gyagenda', 'mosh.gyagenda@mubs.ac.ug', 'Lecturer@2026', 'lecturer');
        $this->makeUser('Mrs. Tiko Joy', 'tiko.joy@mubs.ac.ug', 'Lecturer@2026', 'lecturer');
        $this->makeUser('Mr. Mutebi Bashir', 'bashir.mutebi@mubs.ac.ug', 'Lecturer@2026', 'lecturer');

        $this->makeUser('Gatete Iann', 'ian.gatete@mubs.ac.ug', 'Student@2026', 'student');
        $this->makeUser('Naluwooza Janat', 'naluwooza.janat@mubs.ac.ug', 'Student@2026', 'student');
        $this->makeUser('Ssenkaayi Martin', 'ssenkaayi.martin@mubs.ac.ug', 'Student@2026', 'student');
        $this->makeUser('Ntemu Robertson', 'ntemu.robertson@mubs.ac.ug', 'Student@2026', 'student');
        $this->makeUser('Komugisha Shivan', 'shivan.komugisha@mubs.ac.ug', 'Student@2026', 'student');
    }

    private function makeUser(string $name, string $email, string $password, string $role): void
    {
        User::firstOrCreate(['email' => $email], ['name' => $name, 'password' => Hash::make($password)])
            ->assignRole($role);
    }
}
