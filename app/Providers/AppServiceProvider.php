<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('admin.layouts.sidebar', function($view){
            $logedinUser = Auth::user();
            $menu = [];
            // if (isset($logedinUser->role_id) && $logedinUser->role_id == 2){
            //     $menu = [
            //         [
            //             'name' => "Sản phẩm",
            //             'icon' => '<i class="fas fa-users"></i>',
            //             'child'=> [
            //                 [
            //                     'name' => 'Danh sách',
            //                     'url' => 'admin/san-pham'
            //                 ],
            //                 [
            //                     'name' => 'Tạo mới',
            //                     'url' => 'demo-tao-moi'
            //                 ]
            //             ]
            //         ],
            //         [
            //             'name' => 'Hóa đơn',
            //             'icon' => '<i class="fas fa-file-invoice"></i>',
            //             'child'=> [
            //                 [
            //                     'name' => 'Danh sách',
            //                     'url' => 'demo-danh-sach-hoa-don'
            //                 ],
            //                 [
            //                     'name' => 'Tạo mới',
            //                     'url' => 'demo-tao-moi-hoa-don'
            //                 ]
            //             ]
            //         ]
                            
            //     ];
            // } else {
            //     $menu = [
            //         [
            //             'name' => "Sản phẩm",
            //             'child'=> [
            //                 [
            //                     'name' => 'Danh sách',
            //                     'url' => 'admin/san-pham'
            //                 ],
            //                 [
            //                     'name' => 'Tạo mới',
            //                     'url' => 'demo-tao-moi'
            //                 ]
            //             ]
            //         ]
            //     ];
            // }

            if (isset($logedinUser->role_id) && $logedinUser->role_id == 1){
                $menu = [
                    [
                        'name' => "User",
                        'icon' => '<i class="fas fa-users"></i>',
                        'child'=> [
                            [
                                'name' => 'List',
                                'url' => 'admin/user'
                            ],
                            [
                                'name' => 'Add new',
                                'url' => 'admin/user/add'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Car',
                        'icon' => '<i class="fas fa-file-invoice"></i>',
                        'child'=> [
                            [
                                'name' => 'List',
                                'url' => 'admin/car'
                            ],
                            [
                                'name' => 'Add new',
                                'url' => 'admin/car/add'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Passenger',
                        'icon' => '<i class="fas fa-file-invoice"></i>',
                        'child'=> [
                            [
                                'name' => 'List',
                                'url' => 'admin/passenger'
                            ],
                            [
                                'name' => 'Add new',
                                'url' => 'admin/passenger/add'
                            ]
                        ]
                    ]            
                ];
            } elseif (isset($logedinUser->role_id) && $logedinUser->role_id == 2){
                $menu = [
                    [
                        'name' => 'Car',
                        'icon' => '<i class="fas fa-file-invoice"></i>',
                        'child'=> [
                            [
                                'name' => 'List',
                                'url' => 'admin/car'
                            ],
                            [
                                'name' => 'Add new',
                                'url' => 'admin/car/add'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Passenger',
                        'icon' => '<i class="fas fa-file-invoice"></i>',
                        'child'=> [
                            [
                                'name' => 'List',
                                'url' => 'admin/passenger'
                            ],
                            [
                                'name' => 'Add new',
                                'url' => 'admin/passenger/add'
                            ]
                        ]
                    ]            
                ];
            }
            else {
                $menu = [
                    [
                        'name' => 'Car',
                        'icon' => '<i class="fas fa-file-invoice"></i>',
                        'child'=> [
                            [
                                'name' => 'List',
                                'url' => 'admin/car'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Passenger',
                        'icon' => '<i class="fas fa-file-invoice"></i>',
                        'child'=> [
                            [
                                'name' => 'List',
                                'url' => 'admin/passenger'
                            ]
                        ]
                    ]    
                ];
            }

            $view->with('custom_menu', $menu);
        });
    }
}