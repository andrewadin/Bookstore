<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\APIControllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Book;
use Validator;
use App\Http\Resources\BookResource;

class BookController extends BaseController
{
    public function index(){
        $books = Book::all();
        return $this->sendData(BookResource::collection($books));
    }

    public function show($id){
        $book = Book::find($id);
        if(is_null($book)){
            $message = 'Book does not exist';
            return $this->sendMessage(false, $message, 404);
        }
        return $this->sendData(new BookResource($book));
    }

    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'title' => 'required',
            'author' => 'required',
            'stocks' => 'required',
            'price' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return $this->sendMessage(false, $message, 400);
        }
        $book = Book::create($input);
        $message = 'Book successfully saved';
        return $this->sendMessage(true, $message, 201);
    }

    public function update(Request $request, Book $book){
        $input = $request->all();
        $validator = Validator::make($input,[
            'title' => 'required',
            'author' => 'required',
            'stocks' => 'required',
            'price' => 'required',
        ]);
        if($validator->fails()){
            $message = $validator->errors();
            return $this->sendMessage(false, $message, 400);
        }
        $book->title = $input['title'];
        $book->author = $input['author'];
        $book->stocks = $input['stocks'];
        $book->price = $input['price'];
        $book->save();

        $message = 'Data successfully updated';
        return $this->sendMessage(true, $message, 201);
    }

    public function destroy(Book $book){
        $book->delete();
        $message = 'Data successfully deleted';
        return $this->sendMessage(true, $message, 200);
    }
}
