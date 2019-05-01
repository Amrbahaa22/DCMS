<?php

return [
    'role_structure' => [
        'Owner' => [
            'users' => 'c,r,u,d',
            'patients' => 'c,r,s,udoc,d,vdoc,vs,us,rs,cs,ds',
        ],
        'Doctor' => [
            'patients' => 'c,r,s,udoc,d,vdoc,vs,us,rs,cs,ds',

        ],
        'Employee' => [
            'patients' => 'c,r,d,usec,vsec',

        ],


    ],


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'd' => 'delete',
        'u'=>'update',
        // 's'=>'session',
        //secretary special permission
        'usec' => 'updatesec',
        'vsec'=>'viewsec',
        //doctor special permission
        'udoc' => 'updatedoc',
        'vdoc'=>'viewdoc',
        //session roles
        'vs'=>'viewsession',
        'us'=>'updatesession',
        'rs'=>'readsession',
        'cs'=>'createsession',
        'ds'=>'deletesession',

    ],

];
