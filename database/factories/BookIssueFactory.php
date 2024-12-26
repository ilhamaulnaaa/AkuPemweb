<?php

namespace Database\Factories;

use App\Models\book_issue;
use App\Models\Student;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookIssueFactory extends Factory
{
    protected $model = book_issue::class;

    public function definition()
    {
        // Fetch a random existing student
        $student = Student::inRandomOrder()->first();

        // Fetch a random existing book
        $book = Book::inRandomOrder()->first();

        return [
            'student_id' => $student ? $student->id : null, // Handle null if no students exist
            'book_id' => $book ? $book->id : null,         // Handle null if no books exist
            'issue_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'return_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'issue_status' => 'N',
            'return_day' => null,
        ];
    }
}

