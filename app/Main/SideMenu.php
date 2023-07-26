<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'admin/dashboard',
                'params' => [

                            ],
                // 'sub_menu' => [
                //     'dashboard-overview-1' => [
                //         'icon' => '',
                //         'route_name' => 'admin/dashboard',
                //         'params' => [
                //             'layout' => 'side-menu',
                //         ],
                //         'title' => 'Overview 1'
                //     ],
                    // 'dashboard-overview-2' => [
                    //     'icon' => '',
                    //     'route_name' => 'dashboard-overview-2',
                    //     'params' => [
                    //         'layout' => 'side-menu',
                    //     ],
                    //     'title' => 'Overview 2'
                    // ],
                    // 'dashboard-overview-3' => [
                    //     'icon' => '',
                    //     'route_name' => 'dashboard-overview-3',
                    //     'params' => [
                    //         'layout' => 'side-menu',
                    //     ],
                    //     'title' => 'Overview 3'
                    // ]
                // ]
            ],


             //category
             'category' => [
                'icon' => 'edit',
                'route_name' => 'category.index',
                'params' => [

                ],
                'title' => 'Categories'
            ],


            //subcategory
            'subcategory' => [
                'icon' => 'list',
                'route_name' => 'subcategory.index',
                'params' => [

                ],
                'title' => 'SubCategories'
            ],

        ];
    }
}
