<?php namespace App\Components\Posts\Presenters;

use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter {

    public function selected_categories($field = 'id'){
        $rs = [];
        foreach($this->categories as $category) {
            $rs[] = $category[$field];
        }
        return $rs;
    }

}