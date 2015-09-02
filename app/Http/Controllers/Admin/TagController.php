<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default)
        {
            $data[$field] = old($field, $default);
        }
        return view('admin.tag.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\TagCreateRequest $request)
    {
        $tag = new Tag();
        foreach (array_keys($this->fields) as $field)
        {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect ('admin/tag')
            ->withSuccess("The tag ".$tag->tag." was created.");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = ['id'=>$id];
        try
        {
            $tag = Tag::findOrFail($id);
            foreach (array_keys($this->fields) as $field)
            {
                $data[$field] = old($field,$tag->$field);
            }
            return view('admin.tag.edit',$data);
        }
        catch (\Exception $e)
        {
            App::abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        foreach (array_keys(array_except($this->fields,['tag'])) as $field)
        {
            $tag->$field = $request->get($field);
        }

        $tag->save();

        return redirect("/admin/tag/$id/edit")
            ->withSuccess("Changes saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect('/admin/tag')
            ->withSuccess("The '$tag->tag' tag has been deleted.");
    }
}
