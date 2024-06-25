<?php

class Notif
{
    public static function setNotif($msg, $user, $aksi, $tipe, $data)
    {
        $_SESSION['flash'] = [
            'data' => $data,
            'pesan' => $msg,
            'aksi' => $aksi,
            'tipe' => $tipe,
            'user' => $user,
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    ' . $_SESSION['flash']['user'] . $_SESSION['flash']['data'] . ' ' . $_SESSION['flash']['pesan'] . ' ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['flash']);
        }
    }
}
