<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Trello\Client;

class TrelloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::getUser();
        $client = new Client();
        $client->authenticate($user->trello_id,$user->trello_token,Client::AUTH_HTTP_TOKEN);
        $params['key'] = env('TRELLO_KEY');
        $params['token'] = $user->trello_token;
        $boards = $client->api('member')->boards()->all($user->trello_id,$params);

        $viewData = array('trelloBoards'=>$boards);

        return view('admin.trello.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBoard($boardId)
    {
        $user = \Auth::getUser();
        $client = new Client();
        $client->authenticate($user->trello_id,$user->trello_token,Client::AUTH_HTTP_TOKEN);
        $params['key'] = env('TRELLO_KEY');
        $params['token'] = $user->trello_token;
        $cards=$client->api('boards')->cards()->all($boardId,$params);
        $lists=$client->api('boards')->lists()->all($boardId,$params);

        $viewData['boardCards'] = $cards;
        $listsNames = array();
        foreach ($lists as $list)
        {
            $listNames[$list['id']]=$list['name'];
        }
        $viewData['boardLists'] = $listNames;

        return view('admin.trello.board',$viewData);
    }
}
