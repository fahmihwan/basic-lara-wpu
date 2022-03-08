<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // auth()->guest()    <-- jika belum login return true
        // auth()->check()    <-- jika udah login return true 
        // abort()            <-- untuk memaksa halaman, biasanya agar tidak dapat di akses, dan di kasih respinse 404


        // if (auth()->guest() || auth()->user()->username !== 'fahmihwan') {   <--- fitur untuk usernya 1
        //     abort(404);
        // }

        if (auth()->guest() || auth()->user()->is_admin) {
            abort(404);
        }
        // setelah bikin middleware harus di daftarin ke dalam Kernel.php

        return $next($request);
    }
}
