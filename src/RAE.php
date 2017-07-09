<?php

namespace RAE;

class RAE
{
    /**
     * HTTP interface.
     */
    protected $http;

    /**
     * Constructor.
     *
     * @param bool  $debug          Show API queries and responses.
     * @param bool  $truncatedDebug Truncate long responses in debug.
     */
    public function __construct(
        $debug = false,
        $truncatedDebug = false)
    {
        $this->http = new \RAE\HttpInterface();
        $this->http->setDebug($debug);
        $this->http->setTruncatedDebug($truncatedDebug);
    }


    /**
     * Obtiene la palabra del día.
     *
     * @throws \RAE\Exception\RAEException
     *
     * @return \RAE\Response\WordOfTheDayResponse
     */
    public function getWordOfTheDay()
    {
        $data =
        [
            'callback' => 'json'
        ];
        return $this->http->sendRequest('wotd?'.http_build_query($data), new Response\WordOfTheDayResponse());
    }

    /**
     * Muestra palabra/s con similitud a $query
     *
     * @param string    $query  Palabra a consultar.
     *
     * @throws \RAE\Exception\RAEException
     *
     * @return \RAE\Response\KeyQueryResponse
     */
    public function keyQuery($query)
    {
        $data =
        [
            'q' => $query,
            'callback' => 'jsonp123'
        ];
        return $this->http->sendRequest('keys?'.http_build_query($data) , new Response\KeyQueryResponse());
    }

    /**
     * Busca una palabra.
     *
     * @param string    $word   Palabra a buscar.
     *
     * @throws \RAE\Exception\RAEException
     *
     * @return \RAE\Response\SearchWordResponse
     */
    public function searchWord($word)
    {
        $data =
        [
            'w' => $word,
        ];

        return $this->http->sendRequest('search?'.http_build_query($data), new Response\SearchWordResponse());
    }

    /**
     * Obtiene las definiciones de una palabra por su ID. Para obtener el ID,
     * use searchWord().
     *
     * @see searchWord().
     *
     * @param string    $word   Palabra a buscar.
     *
     * @throws \RAE\Exception\RAEException
     *
     * @return \RAE\Response\FetchWordResponse
     */
    public function fetchWord($id)
    {
        $data =
        [
            'id' => $id,
        ];

        return $this->http->sendRequest('fetch?'.http_build_query($data), new Response\FetchWordResponse());
    }
}
