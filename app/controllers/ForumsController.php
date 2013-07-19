<?php

class ForumsController extends BaseController {

    /**
     * Forum Repository
     *
     * @var Forum
     */
    // protected $layout = 'layouts.booklayout';

    protected $forum;

    public function __construct(Forum $forum)
    {
        $this->forum = $forum;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $forums = $this->forum->all();

        return View::make('forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Forum::$rules);

        if ($validation->passes())
        {
            $this->forum->create($input);

            return Redirect::route('forums.index');
        }

        return Redirect::route('forums.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $forum = $this->forum->findOrFail($id);

        return View::make('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $forum = $this->forum->find($id);

        if (is_null($forum))
        {
            return Redirect::route('forums.index');
        }

        return View::make('forums.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Forum::$rules);

        if ($validation->passes())
        {
            $forum = $this->forum->find($id);
            $forum->update($input);

            return Redirect::route('forums.show', $id);
        }

        return Redirect::route('forums.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->forum->find($id)->delete();

        return Redirect::route('forums.index');
    }

}