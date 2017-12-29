<?php

class CjwNewsletterRecaptcha
{
    private $handler;

    public function __construct()
    {
        $cjwNewsletterINI = eZINI::instance( 'cjw_newsletter.ini' );
        $handlerClass = $cjwNewsletterINI->variable( 'NewsletterSettings', 'RecaptchaHandler' );
        if (class_exists($handlerClass)){
            $this->handler = new $handlerClass;
        }
    }

    public function hasHandler()
    {
        return is_object($this->handler);
    }

    public function validate()
    {
        if ($this->handler && method_exists($this->handler, 'validate')){
            return $this->handler->validate();
        }

        return false;
    }

    public function getPrivateKey()
    {
        if ($this->handler && method_exists($this->handler, 'getPrivateKey')){
            return $this->handler->getPrivateKey();
        }

        return false;
    }

    public function getPublicKey()
    {
        if ($this->handler && method_exists($this->handler, 'getPublicKey')){
            return $this->handler->getPublicKey();
        }

        return false;
    }
}
