<?php

class CollegesController extends BaseController {

    /**
     * College Repository
     *
     * @var College
     */
    protected $college;

    public function __construct(College $college)
    {
        $this->college = $college;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $colleges = $this->college->all();

        return View::make('colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, College::$rules);

        if ($validation->passes())
        {
            $this->college->create($input);

            return Redirect::route('colleges.index');
        }

        return Redirect::route('colleges.create')
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
        $college = $this->college->findOrFail($id);

        return View::make('colleges.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $college = $this->college->find($id);

        if (is_null($college))
        {
            return Redirect::route('colleges.index');
        }

        return View::make('colleges.edit', compact('college'));
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
        $validation = Validator::make($input, College::$rules);

        if ($validation->passes())
        {
            $college = $this->college->find($id);
            $college->update($input);

            return Redirect::route('colleges.show', $id);
        }

        return Redirect::route('colleges.edit', $id)
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
        $this->college->find($id)->delete();

        return Redirect::route('colleges.index');
    }

}