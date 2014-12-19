<?php

class Category extends Eloquent {
	protected $fillable = [];
        
        /*
         * Reletionship: Many to Many
         */
        public function news() {
            return $this->belongsToMany('News');
        }
}