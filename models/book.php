<?php
use Illuminate\Database\Eloquent\Model;
 
class Book extends Model{
    public $timestamps = false;
    protected $table = 'books';
    protected $fillable = ['title','author','category'];
}