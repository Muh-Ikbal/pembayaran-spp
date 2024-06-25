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
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {

            header('Location:' . BASEURL . '/dashboard');
            exit;
        }
    }
    public static function checkGuru(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'teacher') {

            header('Location:' . BASEURL . '/dashboard');
            exit;
        }
    }
    public static function checkParents(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'parents') {
            header('Location:' . BASEURL . '/dashboard');
            exit;
        }
    }
    public static function checkSiswa(){
        if (isset($_SESSION['role'])) {
            header('Location:' . BASEURL . '/dashboard');
            exit;
        }
    }
}