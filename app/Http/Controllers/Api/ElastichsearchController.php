<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class ElastichsearchController extends Controller
{
    public function index()
    {
        Movie::createIndex($shards = null, $replicas = null);
        Movie::putMapping($ignoreConflicts = true);
        Movie::addAllToIndex();
        return 'true';
    }
 
    public function reindex($id)
    {
        Movie::reindex();
        return 'true';
    }
 
    public function search($title)
    {
        $movies = Movie::searchByQuery(['match_phrase_prefix' => 
        ['title' => $title]],null,null,12,0,['id'=>'asc']);
        
        return $movies;
    }
 
 }
