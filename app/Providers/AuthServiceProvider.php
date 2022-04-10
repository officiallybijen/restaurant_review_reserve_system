<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Review;
use App\Models\Reserve;
use App\Models\Menu;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('is_admin',function(User $user){
            if($user->role!=0){
            return 1;
        }});
        Gate::define('can_reserve',function(User $user){
            //do correct(remove 1 and 2)
            if($user->role==0){
            return 1;
        }});

        // Gate::define('already_reserve',function(User $user){
        //     //do correct(remove 1 and 2)
        //     $res = Reserve::where('user_id',$user->id)->first();
        //     if($res==null){
        //     return 1;
        // }});

        Gate::define('menu_delete',function(User $user){
            if($user->role!=0){
                return 1;
            }
        });
        Gate::define('comment_manage',function(User $user,Review $review){
            if($user->id==$review->user_id){
                return 1;
            }
            });
        Gate::define('menu_add',function(User $user){
            if($user->role!=0){
                return 1;
            }
        });
        
        
        Gate::define('review',function(User $user){
            //check if already reviewed
            if($user->role==0){
                return 1;
            }
        });
    }
}
