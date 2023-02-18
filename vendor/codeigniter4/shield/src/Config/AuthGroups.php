<?php

declare(strict_types=1);

namespace CodeIgniter\Shield\Config;

use CodeIgniter\Config\BaseConfig;

class AuthGroups extends BaseConfig
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * The available authentication systems, listed
     * with alias and class name. These can be referenced
     * by alias in the auth helper:
     *      auth('api')->attempt($credentials);
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'storyteller' => [
            'title'       => 'Storyteller',
            'description' => 'Day to day administrators of the site.',
        ],        
        'developer' => [
            'title'       => 'Developer',
            'description' => 'Site programmers.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Often customers.',
        ],
        'beta' => [
            'title'       => 'Beta User',
            'description' => 'Has access to beta-level features.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system. Each system is defined
     * where the key is the
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Can access the admin area',
        'site.access'         => 'Can access the main site settings',
        'users.manage-admins' => 'Can manage other admins',
        'users.access'        => 'Can access the user admin area',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',
        'users.manage-staff'  => 'Can manage other roles',        
        'chat.access'         => 'Can access chat level features',
        'beta.access'         => 'Can access beta-level features',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'site.*',
            'users.*',
            'chat.*',
            'beta.*',
        ],
        'admin' => [
            'admin.access',
            'site.*',
            'users.access',
            'users.edit',
            'users.delete',
            'users.manage-staff',  
            'chat.*',          
            'beta.access',
        ],
        'storyteller' => [
            'admin.access',
            'users.access',
            'chat.access',          
            'beta.access',
        ],        
        'developer' => [
            'admin.access',
            'admin.settings',
            'users.edit',
            'beta.access',
        ],
        'user' => [],
        'beta' => [
            'beta.access',
        ],
    ];
}
