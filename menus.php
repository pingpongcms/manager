<?php

Menu::modify('sidebar', function ($menu) {
    if ($settings = $menu->findBy('title', 'Settings')) {
        $settings->url('administrator/modules', 'Modules', 3, ['icon' => 'fa fa-circle-o']);
    } else {
        $menu->url('/modules', 'Modules', 10, ['icon' => 'fa fa-dropbox']);
    }
});
