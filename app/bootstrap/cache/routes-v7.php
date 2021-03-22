<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/api/v1/series' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Bgld9MWzaPyxAL3H',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XDywIG65JLBHaFh4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/turnos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9FO1T7K1GVedENfL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/turmas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uiB2xV7ylBIfYMs5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/professores' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bBPCcY2YGLOEklds',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/atencoes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bg4R4blotIFOADYc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/situacoes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sfLI36W2b9wksv5d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/inscricao/busca' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tA3R2G8pNTTIG2A9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/candidato/busca' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BsYmJHRf3T2fIBbv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/candidato' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aqrr8Q8dSGylv7LJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/aluno/busca' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::paUMdF8EwSnQ9bN2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/aluno' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6HOLTk8wO7NlSqUL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/serievinculo/busca' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9krPui9A5X77SerV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/serievinculo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::W2GuksYuefvI6ZOU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/seriedisciplina/busca' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pmcbNs3sbu7kGLBc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/professorvinculo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JXzs8Rvt994stCYi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/relatorio/atencoes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::W1EunWlw6n5OUjId',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/relatorio/inscricoes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k9lZAQoGQqAiyHNz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NdfrWmUXweFMuCfp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/api/v1/(?|inscricao/([^/]++)(*:36)|candidato/([^/]++)(*:61)|serievinculo/([^/]++)(*:89))|/([^/]++)(?|(*:109)|/([^/]++)(*:126)))/?$}sDu',
    ),
    3 => 
    array (
      36 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jJLYwT4HnhDeRN4Z',
          ),
          1 => 
          array (
            0 => 'cod_insc',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      61 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RSM43p8nJ2r1c0h9',
          ),
          1 => 
          array (
            0 => 'cod_can',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      89 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Bm94594ARRlPhKgA',
          ),
          1 => 
          array (
            0 => 'cod_serie_v',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qljjEJoBAGVOlUWD',
          ),
          1 => 
          array (
            0 => 'any',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      126 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zDGL9SJvsSQBgaPS',
          ),
          1 => 
          array (
            0 => 'any',
            1 => 'sub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::Bgld9MWzaPyxAL3H' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/series',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SerieController@index',
        'controller' => 'App\\Http\\Controllers\\SerieController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/series',
        'where' => 
        array (
        ),
        'as' => 'generated::Bgld9MWzaPyxAL3H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::XDywIG65JLBHaFh4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/series',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SerieController@store',
        'controller' => 'App\\Http\\Controllers\\SerieController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/series',
        'where' => 
        array (
        ),
        'as' => 'generated::XDywIG65JLBHaFh4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9FO1T7K1GVedENfL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/turnos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\TurnoController@index',
        'controller' => 'App\\Http\\Controllers\\TurnoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::9FO1T7K1GVedENfL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uiB2xV7ylBIfYMs5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/turmas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\TurmaController@index',
        'controller' => 'App\\Http\\Controllers\\TurmaController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::uiB2xV7ylBIfYMs5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bBPCcY2YGLOEklds' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/professores',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfessorController@index',
        'controller' => 'App\\Http\\Controllers\\ProfessorController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::bBPCcY2YGLOEklds',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bg4R4blotIFOADYc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/atencoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AtencaoController@index',
        'controller' => 'App\\Http\\Controllers\\AtencaoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/atencoes',
        'where' => 
        array (
        ),
        'as' => 'generated::bg4R4blotIFOADYc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::sfLI36W2b9wksv5d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/situacoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SituacaoController@index',
        'controller' => 'App\\Http\\Controllers\\SituacaoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::sfLI36W2b9wksv5d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::tA3R2G8pNTTIG2A9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/inscricao/busca',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\InscricaoController@index',
        'controller' => 'App\\Http\\Controllers\\InscricaoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/inscricao',
        'where' => 
        array (
        ),
        'as' => 'generated::tA3R2G8pNTTIG2A9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::jJLYwT4HnhDeRN4Z' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/inscricao/{cod_insc}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\InscricaoController@show',
        'controller' => 'App\\Http\\Controllers\\InscricaoController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/inscricao',
        'where' => 
        array (
        ),
        'as' => 'generated::jJLYwT4HnhDeRN4Z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BsYmJHRf3T2fIBbv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/candidato/busca',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CandidatoController@index',
        'controller' => 'App\\Http\\Controllers\\CandidatoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/candidato',
        'where' => 
        array (
        ),
        'as' => 'generated::BsYmJHRf3T2fIBbv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::aqrr8Q8dSGylv7LJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/candidato',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CandidatoController@store',
        'controller' => 'App\\Http\\Controllers\\CandidatoController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/candidato',
        'where' => 
        array (
        ),
        'as' => 'generated::aqrr8Q8dSGylv7LJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RSM43p8nJ2r1c0h9' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/candidato/{cod_can}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CandidatoController@destroy',
        'controller' => 'App\\Http\\Controllers\\CandidatoController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/candidato',
        'where' => 
        array (
        ),
        'as' => 'generated::RSM43p8nJ2r1c0h9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::paUMdF8EwSnQ9bN2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/aluno/busca',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AlunoController@index',
        'controller' => 'App\\Http\\Controllers\\AlunoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/aluno',
        'where' => 
        array (
        ),
        'as' => 'generated::paUMdF8EwSnQ9bN2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6HOLTk8wO7NlSqUL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/aluno',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AlunoController@store',
        'controller' => 'App\\Http\\Controllers\\AlunoController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/aluno',
        'where' => 
        array (
        ),
        'as' => 'generated::6HOLTk8wO7NlSqUL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9krPui9A5X77SerV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/serievinculo/busca',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SerieVinculoController@index',
        'controller' => 'App\\Http\\Controllers\\SerieVinculoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/serievinculo',
        'where' => 
        array (
        ),
        'as' => 'generated::9krPui9A5X77SerV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::W2GuksYuefvI6ZOU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/serievinculo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SerieVinculoController@store',
        'controller' => 'App\\Http\\Controllers\\SerieVinculoController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/serievinculo',
        'where' => 
        array (
        ),
        'as' => 'generated::W2GuksYuefvI6ZOU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Bm94594ARRlPhKgA' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/serievinculo/{cod_serie_v}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SerieVinculoController@update',
        'controller' => 'App\\Http\\Controllers\\SerieVinculoController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/serievinculo',
        'where' => 
        array (
        ),
        'as' => 'generated::Bm94594ARRlPhKgA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::pmcbNs3sbu7kGLBc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/seriedisciplina/busca',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SerieDisciplinaController@index',
        'controller' => 'App\\Http\\Controllers\\SerieDisciplinaController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::pmcbNs3sbu7kGLBc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::JXzs8Rvt994stCYi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/professorvinculo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfessorVinculoController@index',
        'controller' => 'App\\Http\\Controllers\\ProfessorVinculoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/professorvinculo',
        'where' => 
        array (
        ),
        'as' => 'generated::JXzs8Rvt994stCYi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::W1EunWlw6n5OUjId' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/relatorio/atencoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AtencaoController@export',
        'controller' => 'App\\Http\\Controllers\\AtencaoController@export',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/relatorio',
        'where' => 
        array (
        ),
        'as' => 'generated::W1EunWlw6n5OUjId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::k9lZAQoGQqAiyHNz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/relatorio/inscricoes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\InscricaoController@export',
        'controller' => 'App\\Http\\Controllers\\InscricaoController@export',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/relatorio',
        'where' => 
        array (
        ),
        'as' => 'generated::k9lZAQoGQqAiyHNz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::NdfrWmUXweFMuCfp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::NdfrWmUXweFMuCfp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'App',
        'data' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qljjEJoBAGVOlUWD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{any}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::qljjEJoBAGVOlUWD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'App',
        'data' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zDGL9SJvsSQBgaPS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{any}/{sub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::zDGL9SJvsSQBgaPS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'App',
        'data' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
