<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService
{
    use ConsumesExternalServices;

    /**
     * The base uri to consume the authors service
     *
     * @var string
     */

    public $baseUri;

    /**
     * The secret to consume the authors service
     *
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.authors.secret');

    }

    public function obtainBooks()
    {
        return $this->PerformRequest('GET', '/books');
    }

    /**
     * createBook for the book service
     *
     * @return string
     */
    public function createBook($data)
    {
        return $this->performRequest("POST", "/books", $data);
    }

    /**
     * showBook for the Book service
     *
     * @return string
     */
    public function obtainBook($bookId)
    {
        return $this->performRequest("GET", "/books/{$bookId}");
    }

    /**
     * editBook for the Book service
     *
     * @return string
     */
    public function editBook($data, $bookId)
    {
        return $this->performRequest("PUT", "/books/{$bookId}", $data);
    }

    /**
     * deleteBook for the Book service
     *
     * @return string
     */
    public function deleteBook($bookId)
    {
        return $this->performRequest("DELETE", "/books/{$bookId}");
    }
}