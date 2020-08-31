<?php


/**
 * If the class OAuthException has not been declared, extend the Exception class.
 * This is to allow OAuth without the PECL OAuth library
 *
 * @ignore
 */
if ( ! class_exists( 'OAuthException')) {
    class OAuthException extends Exception {
        // pass
    }
}