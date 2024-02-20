<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Permission;
use App\Models\Route;
use App\Console\Commands\AddPermission;
class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $permission =  new AddPermission();
        $permission->handle();
        $publics = Permission::where('role_id',3)->with('route')->get();
        $publicRoutes =[];
        foreach($publics as $publicRoute){
            $publicRoutes[]= $publicRoute->route->name;
        }
        $uri = $request->route()->uri;
        $role_id = session('user_role') ?? '';
        if ($role_id) {
            $allowedRoutes = Permission::where('role_id', $role_id)->get();
            foreach ($allowedRoutes as $route) {
                $allowedUri = $route->route->name;
                if (count(explode('/', $uri)) > 2) {
                    if (strstr($uri, $allowedUri))  return $next($request);
                } else {
                    if ($uri === $allowedUri) return $next($request);
                }
            }
            return abort(401);
        } else {
            if (in_array($uri, $publicRoutes)) return $next($request);
            else return abort(401);
        }
    }
}
