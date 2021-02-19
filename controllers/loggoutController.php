<?php
class loggoutController extends controller {
    public function index () {
        session_destroy();
        header("location:".BASE_URL."home");
        
    }
}