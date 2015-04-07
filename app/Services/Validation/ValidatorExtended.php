<?php namespace App\Services\Validation;

use Illuminate\Validation\Validator as IlluminateValidator;

class ValidatorExtended extends IlluminateValidator {

    private $_custom_messages = array(
        "checkURL" => "The :attribute must be video from Youtube, Video host",
    );

    public function __construct( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
        parent::__construct( $translator, $data, $rules, $messages, $customAttributes );

        $this->_set_custom_stuff();
    }

    /**
     * Setup any customizations etc
     *
     * @return void
     */
    protected function _set_custom_stuff() {
        //setup our custom error messages
        $this->setCustomMessages( $this->_custom_messages );
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    protected function validateCheckUrl( $attribute, $value ) {
        return (bool) preg_match( '/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/', $value );
    }


}