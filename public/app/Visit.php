<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model {

    // Relationships

    public function user() {
        return $this->hasOne("App\User",  "id" ,"user_id");
    }

    public function city() {
        return $this->hasOne("App\City", "id", "city_id");
    }

}