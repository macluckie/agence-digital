<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author WCS <contact@wildcodeschool.fr>
 *
 * @link https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [


    'Portfolio' => [ // Controller
    ['index', '/portfolio', 'GET'],
    ['adminCreate', '/portfolio/create', ['GET','POST']], // action, url, method
    ['adminChange', '/portfolio/change', ['GET','POST']],
    ['chantier', '/porfolio/chantier/{id:\d+}', 'GET'], // action, url, method
    ],

'Blog' => [ // Controller
    ['index', '/blog', 'GET'],
    ['details', '/blog/article/{id:\d+}', 'GET'],
    ['edit', '/redact/blog/article/{id:\d+}', ['GET', 'POST']],
],

    'TetraDigital' => [ // Controller
    ['tetraDigital', '/', 'GET'],
    ['login', '/login', ['GET','POST']],
    ['storyTelling', '/storytelling','GET'],
    ['contact', '/contact', ['POST', 'GET']],
    ['adminStoryTelling', '/adminstorytelling',['GET','POST']]


    ],

];
