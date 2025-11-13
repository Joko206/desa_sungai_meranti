<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    /**
     * The trusted proxies for this application.
     *
     * Configure this based on your infrastructure. For most Laravel applications
     * running behind a single proxy (like Load Balancer), use '*' to trust all.
     * For production, specify exact proxy IP addresses for better security.
     */
    /**
     * The trusted proxies for this application.
     *
     * Configure this based on your infrastructure. For most Laravel applications
     * running behind a single proxy (like Load Balancer), use '*' to trust all.
     * For production, specify exact proxy IP addresses for better security.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;
    
    /**
     * Initialize trusted proxies from environment
     */
    public function __construct()
    {
        $trustedProxies = env('TRUSTED_PROXIES');
        if ($trustedProxies) {
            $this->proxies = explode(',', $trustedProxies);
        } else {
            $this->proxies = null;
        }
    }

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}