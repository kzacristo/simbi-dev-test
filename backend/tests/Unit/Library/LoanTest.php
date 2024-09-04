<?php

namespace Tests\Feature;

use App\Core\Domain\Library\Entities\Book;
use App\Core\Domain\Library\Entities\Loan;
use App\Core\Domain\Library\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_loan()
    {
        $user = new User(id: 'user-id', name: "User Test", email: "email@example.com", password: bcrypt('password'));

        $book = new Book(id: 'book-id', title: "Book Title", publisher: "Book Publisher", authorId: 'author-id');

        // Define as datas de empréstimo e retorno
        $loanDate = now()->subMonth()->format('Y-m-d');
        $returnDate = now()->addMonth()->format('Y-m-d');

        // Envia uma requisição para criar um empréstimo
        $response = $this->postJson('/api/loans', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'loan_date' => $loanDate,
            'return_date' => $returnDate,
        ]);

        // Verifica se a resposta está OK e se o empréstimo foi criado corretamente
        $response->assertStatus(201)
            ->assertJson([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'loan_date' => $loanDate,
                'return_date' => $returnDate,
            ]);

        // Verifica se o empréstimo foi salvo no banco de dados
        $this->assertDatabaseHas('loans', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'loan_date' => $loanDate,
            'return_date' => $returnDate,
        ]);
    }

    // public function test_can_create_loan()
    // {
    //     $user = new User(id: 'user-id', name: "User Test", email: "email@example.com", password: bcrypt('password'));

    //     $book = new Book(id: 'book-id', title: "Book Title", publisher: "Book Publisher", authorId: 'author-id');

    //     $loanDate = new \DateTime('-1 month');
    //     $returnDate = new \DateTime('+1 month');

    //     $loan = new Loan(
    //         userId: $user->id,
    //         bookId: $book->id,
    //         loanDate: $loanDate,
    //         returnDate: $returnDate
    //     );

    //     $this->assertIsString($loan->id);
    //     $this->assertEquals($user->id, $loan->userId);
    //     $this->assertEquals($book->id, $loan->bookId);
    //     $this->assertEquals($loanDate->format('Y-m-d'), $loan->loanDate->format('Y-m-d'));
    //     $this->assertEquals($returnDate->format('Y-m-d'), $loan->returnDate->format('Y-m-d'));
    // }


    // public function test_can_list_loans()
    // {
    //     $user = new User(id: 'user-id', name: "User Test", email: "email@example.com", password: bcrypt('password'));

    //     $book = new Book(id: 'book-id', title: "Book Title", publisher: "Book Publisher", authorId: 'author-id');

    //     $loan1 = new Loan(
    //         userId: $user->id,
    //         bookId: $book->id,
    //         loanDate: new \DateTime('-1 month'),
    //         returnDate: new \DateTime('+1 month')
    //     );

    //     $loan2 = new Loan(
    //         userId: $user->id,
    //         bookId: $book->id,
    //         loanDate: new \DateTime('-2 months'),
    //         returnDate: new \DateTime('+2 months')
    //     );

    //     $response = $this->getJson('/api/loans');

    //     $response->assertStatus(200)
    //         ->assertJsonCount(2);
    // }

    // public function test_can_update_loan()
    // {
    //     $user = new User(id: 'user-id', name: "User Test", email: "email@example.com", password: bcrypt('password'));

    //     $book = new Book(id: 'book-id', title: "Book Title", publisher: "Book Publisher", authorId: 'author-id');

    //     $loan = new Loan(
    //         userId: $user->id,
    //         bookId: $book->id,
    //         loanDate: new \DateTime('-1 month'),
    //         returnDate: new \DateTime('+1 month')
    //     );

    //     $updateData = [
    //         'return_date' => now()->addDays(7)->toDateString(),
    //     ];

    //     $response = $this->putJson("/api/loans/{$loan->id}", $updateData);

    //     $response->assertStatus(200)
    //         ->assertJsonFragment($updateData);

    //     $this->assertDatabaseHas('loans', array_merge(['id' => $loan->id], $updateData));
    // }

    // public function test_can_delete_loan()
    // {
    //     $user = new User(id: 'user-id', name: "User Test", email: "email@example.com", password: bcrypt('password'));

    //     $book = new Book(id: 'book-id', title: "Book Title", publisher: "Book Publisher", authorId: 'author-id');

    //     $loan = new Loan(
    //         userId: $user->id,
    //         bookId: $book->id,
    //         loanDate: new \DateTime('-1 month'),
    //         returnDate: new \DateTime('+1 month')
    //     );

    //     $response = $this->deleteJson("/api/loans/{$loan->id}");

    //     $response->assertStatus(204);

    //     $this->assertDatabaseMissing('loans', ['id' => $loan->id]);
    // }

    // public function test_search_loan_by_user()
    // {
    //     $user = new User(id: 'user-id', name: "User Test", email: "email@example.com", password: bcrypt('password'));

    //     $book = new Book(id: 'book-id', title: "Book Title", publisher: "Book Publisher", authorId: 'author-id');

    //     $loan = new Loan(
    //         userId: $user->id,
    //         bookId: $book->id,
    //         loanDate: new \DateTime('-1 month'),
    //         returnDate: new \DateTime('+1 month')
    //     );

    //     $response = $this->getJson("/api/loans/user?user_id={$user->id}");

    //     $response->assertStatus(200)
    //         ->assertJsonFragment(['user_id' => $user->id])
    //         ->assertJsonFragment(['book_id' => $loan->bookId]);
    // }

    // public function test_search_loan_by_book()
    // {
    //     $user = new User(id: 'user-id', name: "User Test", email: "email@example.com", password: bcrypt('password'));

    //     $book = new Book(id: 'book-id', title: "Book Title", publisher: "Book Publisher", authorId: 'author-id');

    //     $loan = new Loan(
    //         userId: $user->id,
    //         bookId: $book->id,
    //         loanDate: new \DateTime('-1 month'),
    //         returnDate: new \DateTime('+1 month')
    //     );

    //     $response = $this->getJson("/api/loans/book?book_id={$book->id}");

    //     $response->assertStatus(200)
    //         ->assertJsonFragment(['book_id' => $book->id])
    //         ->assertJsonFragment(['user_id' => $loan->userId]);
    // }
}
