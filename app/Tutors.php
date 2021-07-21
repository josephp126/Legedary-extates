<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Tutors extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'id','name','country','also','major','tuition','character','option','des',
    ];
    
    protected $hidden = [
        'created_at', 'updated_at',
        ];
    protected $table =  'Tutors';

    public function read_country() 
    {
        return DB::table('nationality')->get();
    }
    public function read_lang()
    {
        return DB::table('also_speaks')->get();    
    }
    public function read_subject(){
        return DB::table('teaching_subjects')->get();
    }

    public function read_language() {
        return DB::table('languages')->get();
    }
    public function read_data() {
        return DB::table('tutors')->get();
    }

    public function read_tutors() {
        return Tutors::paginate(6);
        //return DB::table('tutors')->get();  
    }
        
}
