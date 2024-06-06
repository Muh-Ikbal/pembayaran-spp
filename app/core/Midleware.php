<?php

class Midleware{
    public static function checkLogin(){
        if (!isset($_SESSION['username'])) {
            Flasher::setFlasher('sesi', ' Anda harus login terlebih dahulu','', 'danger','');
            header('Location:' . BASEURL . '/auth');
            exit;
        }
    }
    public static function checkAdmin(){
        if (!isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
            session_unset();
            session_destroy();
            header('Location:' . BASEURL . '/auth');
            exit;
        }
    }
    public static function checkSiswa(){
        if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin' && $_SESSION['role'] == 'teacher') {
            session_unset();
            session_destroy();
            header('Location:' . BASEURL . '/auth');
            exit;
        }
    }
}