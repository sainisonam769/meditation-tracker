<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MeditationSession;
use App\Models\User;
use Illuminate\Database\Seeder;

class MeditationSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $user = User::first(); 

        for ($i = 1; $i <= 20; $i++) {
            MeditationSession::create([
                'user_id' => $user->id,
                'session_date' => now()->subDays($i),
                'duration' => rand(1, 10),
                'notes' => 'Dummy meditation session ' . $i,
            ]);
        }
    }
}
