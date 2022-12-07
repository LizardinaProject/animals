<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Animal extends Model
{
    protected $fillable = ['name', 'age', 'size', 'kind'];

    /**
     * The "booted" method of the model.
     * При создание нового животного имя, начальный возраст и размер устанавливается автоматически
     * @return void
    */
    protected static function booted()
    {
        static::creating(function ($animal) {
            $animal->age = 1;
            $animal->size = 20;
            $animal->name = Str::random(3);
        });
    }

    public function kind_info(){
        return $this->HasOne(AnimalKinds::class, 'id', 'kind');
    }
}
