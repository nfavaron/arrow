<?php

namespace Arrow\Routing\Strategy;

use Arrow\Routing\RouteInterface;
use Arrow\Http\Request\RequestInterface;

/**
 * Class Http
 *
 * @package Arrow\Routing\Strategy
 */
class Http implements RoutingStrategyInterface
{

    /**
     * Returns true if the $request matches the routing strategy
     *
     * @param RouteInterface   $route
     * @param RequestInterface $request
     * @return bool
     */
    public function match(RouteInterface $route, RequestInterface $request)
    {

        // Method does not match
        if ($route->getMethod() !== $request->getMethod()) {

            return false;

        }

        /**
         * @var string $requestUri
         * @var string $routeUri
         * @var array  $routeParams
         * @var array  $routeValues
         * @var array  $matches
         */
        $requestUri    = $request->getURI();
        $routeUri      = $route->getUri();
        $routeParams   = $route->getParams();
        $routeValues   = [];
        $matches       = [];

        // Remove query string from request URI
        $requestUri = str_replace(
            sprintf('?%s', $request->getQuery()),
            '',
            $requestUri
        );

        // Make sure the route URI will match completely
        $routeUriRegExp = sprintf(
            '/^%s$/',
            str_replace('/', '\/', $routeUri)
        );

        // Replace route params placeholders from route URI
        foreach ($routeParams as $paramName => $regExp) {

            // Variable name
            $variable = sprintf('{%s}', $paramName);

            // Keep variable position within the route URI
            $routeValues[strpos($routeUri, $variable)] = $paramName;

            // Add variable to reg exp
            $routeUriRegExp = str_replace(
                $variable,
                sprintf('(%s)', $regExp),
                $routeUriRegExp
            );

        }

        // Matching URI
        $match = preg_match($routeUriRegExp, $requestUri, $matches) === 1;

        // Match found
        if ($match === true) {

            /**
             * Sort route param values by key
             * This allows us to link a $routeValues to a $matches
             */
            ksort($routeValues);

            $i = 1;

            // For each route param value
            foreach ($routeValues as $paramName) {

                // Set the route param value based on the reg exp matches
                $route->setParam($paramName, $matches[$i]);

                $i++;

            }

        }

        return $match;

    }

}