<?php

namespace App\Http\Middleware;

use App\Models\ShortCode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShortCodeMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!$response instanceof Response) {
            return $response;
        }

        // Only process HTML responses
        $contentType = $response->headers->get('Content-Type');
        if (!$contentType || !str_contains($contentType, 'text/html')) {
            return $response;
        }

        $content = $response->getContent();
        if (!$content) {
            return $response;
        }

        // Get all shortcodes from the database
        $shortcodes = ShortCode::all();

        // Replace each shortcode in the content
        foreach ($shortcodes as $shortcode) {
            $pattern = '/\[\[' . preg_quote($shortcode->shortcode, '/') . '\]\]/';
            $content = preg_replace($pattern, $shortcode->replace, $content);
        }

        $response->setContent($content);

        return $response;
    }
}
