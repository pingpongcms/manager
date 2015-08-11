<?php

Menu::modify('sidebar', function ($menu) {

    $menu->whereTitle('Settings', function ($sub) {
        if ($sub) {
            $sub->url('administrator/modules', 'Modules', 3, ['icon' => 'fa fa-circle-o']);
        }
    });
});