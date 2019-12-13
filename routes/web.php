<?php

Route::resource('/clientes', 'ClientController')
->names([
    'index'=> 'client.index',
    'create'=> 'client.create',
    'store'=>  'client.store',
    'edit'=>  'client.edit',
    'update'=>  'client.update',
    'destroy'=>  'client.destroy',
    'show'=>  'client.show',
]);

Route::resource('/dispositivos', 'DeviceController')
->names([
    'index'=> 'device.index',
    'create'=> 'device.create',
    'store'=>  'device.store',
    'edit'=>  'device.edit',
    'update'=>  'device.update',
    'destroy'=>  'device.destroy',
    'show'=>  'device.show',
]);