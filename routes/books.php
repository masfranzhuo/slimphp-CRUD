<?php

$app->group('/api', function () use ($app){
    $app->get('/books', function ($request, $response) {
        // put log message
        $this->logger->info("getting all books");

        $data = Book::all();
        return $this->response->withJson($data, 200);
    });
    $app->get('/books/[{id}]', function($request, $response, $args){
        // put log message
        $this->logger->info("getting book by id");

        $data = Book::find($args['id']);
        return $this->response->withJson($data, 200);
    });
    $app->post('/book', function ($request, $response) {
        // put log message
        $this->logger->info("saving book");

        $book = $request->getParsedBody();
        //$data = Book::create($book);
        $data = Book::create([
            'title' => $book['title'],
            'author' => $book['author'],
            'category' => $book['category']
        ]);
        return $this->response->withJson($data, 200);
    });
    $app->put('/book/[{id}]', function ($request, $response, $args) {
        // put log message
        $this->logger->info("updating book");

        $book = $request->getParsedBody();
        $data = Book::where('id', $args['id'])->update([
            'title' => $book['title'],
            'author' => $book['author'],
            'category' => $book['category']
        ]);
        return $this->response->withJson($data, 200);
    });
    $app->delete('/book/[{id}]', function ($request, $response, $args) {
        // put log message
        $this->logger->info("deleting book");

        $data = Book::destroy($args['id']);
        return $this->response->withJson($data, 200);
    });
});