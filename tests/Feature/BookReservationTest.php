<?php

namespace Tests\Feature;
use App\book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{

    use RefreshDataBase;
   
    /** @test */
    public function a_book_can_be_added_to_the_library()
    {

        $this->withoutExceptionHandling();
        $response= $this->post('/books',[
            'title' => 'cool book',
            'author' => 'Lotif',
        ]);
            $book= Book::first();
        $response->assertRedirect($book->path());
        $this->assertCount(1,Book::all());
    }

   /** @test */
    public function a_title_is_required()
    {
        $response = $this->post('/books',[
            'title'=> '',
            'author' =>'lotfi',
        ]);
        $response->assertSessionHasErrors('title');
    }
   /** @test */
    public function a_author_is_required()
    {
        $response = $this->post('/books',[
            'title'=> 'rrrr',
            'author' =>'',
        ]);
        $response->assertSessionHasErrors('author');
    }
    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->post('/books',[
            'title' => 'cool book',
            'author' => 'Lotif',
        ]);
            $book=Book::first();
             $response = $this->put('/books/'.$book->id,[
            'title' => 'New title',
            'author' => 'Molotov',
        ]);
       
        $response->assertRedirect($book->path());
            $this->assertEquals('New title',Book::first()->title);
            
            $this->assertEquals('Molotov',Book::first()->author);
    }
    /** @test */
    public function a_book_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $this->post('/books',[
            'title' => 'cool book',
            'author' => 'Lotif',
        ]);
        $this->assertCount(1,Book::all());
        $book=Book::first();
        
        $response = $this->delete('books/'.$book->id);
        $response->assertRedirect('/books');
        $this->assertCount(0,Book::all());
        
    }
}
