<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear existing data
        DB::table('course_student')->delete();
        DB::table('courses')->delete();
        DB::table('users')->delete();

        // 1. Create Instructors
        $instructor1 = User::create([
            'name' => 'Dr. John Smith',
            'email' => 'instructor@email.com',
            'password' => Hash::make('password'),
            'role' => 'instructor',
            'email_verified_at' => now(),
        ]);

        $instructor2 = User::create([
            'name' => 'Prof. Sarah Johnson',
            'email' => 'instructor2@email.com',
            'password' => Hash::make('password'),
            'role' => 'instructor',
            'email_verified_at' => now(),
        ]);

        // 2. Create Students
        $student1 = User::create([
            'name' => 'Alice Brown',
            'email' => 'student@email.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        $student2 = User::create([
            'name' => 'Bob Wilson',
            'email' => 'student2@email.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        $student3 = User::create([
            'name' => 'Charlie Davis',
            'email' => 'student3@email.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        // 3. Create Courses for Instructor 1
        $course1 = Course::create([
            'instructor_id' => $instructor1->id,
            'title' => 'Introduction to Web Development',
            'short_description' => 'Learn HTML, CSS, and JavaScript fundamentals',
            'content' => 'This comprehensive course covers the basics of web development including HTML5, CSS3, and JavaScript ES6. Students will build real-world projects and learn modern web development practices.',
            'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400',
            'status' => 'published',
        ]);

        $course2 = Course::create([
            'instructor_id' => $instructor1->id,
            'title' => 'Advanced PHP & Laravel',
            'short_description' => 'Master Laravel framework and modern PHP',
            'content' => 'Deep dive into Laravel framework, covering routing, controllers, models, migrations, authentication, and building full-stack applications with best practices.',
            'thumbnail' => 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=400',
            'status' => 'published',
        ]);

        $course3 = Course::create([
            'instructor_id' => $instructor1->id,
            'title' => 'Database Design & SQL',
            'short_description' => 'Learn database design and SQL queries',
            'content' => 'Master database design principles, normalization, SQL queries, and learn to work with MySQL and PostgreSQL databases effectively.',
            'thumbnail' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=400',
            'status' => 'draft',
        ]);

        // 4. Create Courses for Instructor 2
        $course4 = Course::create([
            'instructor_id' => $instructor2->id,
            'title' => 'React & Modern JavaScript',
            'short_description' => 'Build interactive UIs with React',
            'content' => 'Learn React fundamentals, hooks, state management, and build modern single-page applications. Includes Redux, Context API, and best practices.',
            'thumbnail' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?w=400',
            'status' => 'published',
        ]);

        $course5 = Course::create([
            'instructor_id' => $instructor2->id,
            'title' => 'UI/UX Design Fundamentals',
            'short_description' => 'Design beautiful and functional interfaces',
            'content' => 'Learn design principles, color theory, typography, user research, wireframing, and prototyping. Use Figma to create professional designs.',
            'thumbnail' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400',
            'status' => 'published',
        ]);

        // 5. Create Course Enrollments
        
        // Student 1 enrollments
        DB::table('course_student')->insert([
            'course_id' => $course1->id,
            'student_id' => $student1->id,
            'status' => 'accepted',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('course_student')->insert([
            'course_id' => $course2->id,
            'student_id' => $student1->id,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('course_student')->insert([
            'course_id' => $course4->id,
            'student_id' => $student1->id,
            'status' => 'accepted',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Student 2 enrollments
        DB::table('course_student')->insert([
            'course_id' => $course1->id,
            'student_id' => $student2->id,
            'status' => 'accepted',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('course_student')->insert([
            'course_id' => $course4->id,
            'student_id' => $student2->id,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('course_student')->insert([
            'course_id' => $course5->id,
            'student_id' => $student2->id,
            'status' => 'rejected',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Student 3 enrollments
        DB::table('course_student')->insert([
            'course_id' => $course2->id,
            'student_id' => $student3->id,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('course_student')->insert([
            'course_id' => $course5->id,
            'student_id' => $student3->id,
            'status' => 'accepted',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('');
        $this->command->info('📧 Login Credentials:');
        $this->command->info('Instructor 1: instructor@email.com / password');
        $this->command->info('Instructor 2: instructor2@email.com / password');
        $this->command->info('Student 1: student@email.com / password');
        $this->command->info('Student 2: student2@email.com / password');
        $this->command->info('Student 3: student3@email.com / password');
    }
}